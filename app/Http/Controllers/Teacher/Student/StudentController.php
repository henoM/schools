<?php

namespace App\Http\Controllers\Teacher\Student;

use App\Contracts\Teacher\Student\StudentInterface;
use App\Contracts\Teacher\TeacherStudentInterface;
use App\Contracts\UserInterface;
use App\Http\Requests\Teacher\Student\StudentCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Excel;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $treacherStudentRepo;
    protected $userRepo;

    /**
     * StudentController constructor.
     * @param StudentInterface $studentRepo
     */
    public function __construct(StudentInterface $studentRepo, TeacherStudentInterface $treacherStudentRepo, UserInterface $userRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->treacherStudentRepo = $treacherStudentRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teacher = Auth::user()->teachers;
        $students = $teacher->student()->paginate(10);


        return view('teacher.students.students', compact('students'));
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
        $passport = $request->passport;
        $hasPassport = $this->userRepo->getByPassport($passport);
        if (!$hasPassport) {
            $id = Auth::user()->teachers->id;
            $students = $request->only('birth_day', 'passport');

            $data = $request->inputs();


            $user = $this->studentRepo->store($data);

            $student = $user->students()->create($students);
            $student->teacher()->sync([$id]);

            return redirect()->to('teacher/student/student')->with('create', 'New Student created');
        } else {

            $id = Auth::user()->teachers->id;
            $student = $hasPassport->students;
            $teachers = $student->teacher;
            $skillsId = Auth::user()->teachers->skills_id;
            foreach ($teachers as $teacher) {
                if ($teacher->skills_id === $skillsId) {
                    return redirect()->to('teacher/student/student')->with('delete', 'arden tenc dasatu uni');
                } else {
                    $student->teacher()->sync([$id]);

                }
            }
            return redirect()->to('teacher/student/student')->with('create', 'New Student Added');

        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function multiCreate()
    {
        return view('teacher.students.multiCreate');
    }

    public function multiStore(Request $request)
    {

        $id = Auth::user()->teachers->id;

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();


        if ($data->count()) {
            foreach ($data as $key => $value) {
                $users = [
                    'first_name' => $value->first_name,
                    'last_name' => $value->last_name,
                    'email' => $value->email,
                    'password' => bcrypt(123456),
                    'role_id' => 3
                ];
                $students = [
                    'passport' => $value->passport_series,
                    'birth_day' => $value->birth_day
                ];
                $passport = $students['passport'];

                $hasPassport = $this->userRepo->getByPassport($passport);
                if (!$hasPassport) {
                    $user = $this->studentRepo->store($users);
                    $student = $user->students()->create($students);
                    $student->teacher()->sync([$id]);
                } else {
                    $id = Auth::user()->teachers->id;
                    $student = $hasPassport->students;
                    $teachers = $student->teacher;
                    $skillsId = Auth::user()->teachers->skills_id;
                    foreach ($teachers as $teacher) {
                        if ($teacher->skills_id === $skillsId) {
                            return redirect()->to('teacher/student/student')->with('delete', 'arden tenc dasatu uni');
                        } else {
                            $student->teacher()->sync([$id]);
                        }
                    }
                }
            }
        }
        return redirect()->to('teacher/student/student')->with('create', 'New Student Added');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function update($id)
    {
        $teacher = Auth::user()->teachers;
        $student = $teacher->student()->where('user_id', $id)->first();
        return view('teacher.students.update', compact('student'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        $user = $this->userRepo->getUserById($id);
        $userData = $request->only('first_name', 'last_name');

        $this->userRepo->edit($id, $userData);

        $studentData = $request->only('passport', 'birth_day');
        $user->students()->update($studentData);

        return redirect()->to('teacher/student/student')->with('update', 'Students update');

    }


}
