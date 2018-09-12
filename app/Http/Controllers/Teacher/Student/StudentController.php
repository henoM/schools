<?php

namespace App\Http\Controllers\Teacher\Student;

use App\Contracts\Teacher\Student\StudentInterface;
use App\Contracts\Teacher\TeacherStudentInterface;
use App\Http\Requests\Teacher\Student\StudentCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherStudent;

class StudentController extends Controller
{
    protected  $studentRepo;
    protected  $treacherStudentRepo;

    /**
     * StudentController constructor.
     * @param StudentInterface $studentRepo
     */
    public function __construct(StudentInterface $studentRepo,TeacherStudentInterface $treacherStudentRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->treacherStudentRepo = $treacherStudentRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teacher = Auth::user()->teachers;
        $students = $teacher->student()->paginate(10);

        return view('teacher.students.students',compact('students'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('teacher.students.create');
    }

    /**
     * @param StudentCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentCreate $request)
    {

        $id = Auth::user()->teachers->id;
        $students = $request->only('birth_day','passport');

        $data = $request->inputs();
        $user =  $this->studentRepo->store($data);

        $student = $user->students()->create($students);
        $student->teacher()->sync([$id]);

        return redirect()->to('teacher/student/student')->with('create', 'New Student created');
    }
    public function update($id)
    {
        $teacher = Auth::user()->teachers;
        $student = $teacher->student()->where('user_id',$id)->first();
        return view('teacher.students.update',compact('student'));
    }


    /**
     * @param $id
     */
    public function edit($id)
    {
dd($id);
//        return  redirect()->to('admin/teacher/teacher')->with('update', 'People update');

    }


}
