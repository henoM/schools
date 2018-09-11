<?php

namespace App\Http\Controllers\Teacher\Student;

use App\Contracts\Teacher\Student\StudentInterface;
use App\Http\Requests\Teacher\Student\StudentCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    protected  $studentRepo;

    /**
     * StudentController constructor.
     * @param StudentInterface $studentRepo
     */
    public function __construct(StudentInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $students = $this->studentRepo->getStudent();
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
        $data = $request->inputs();

        $user =  $this->studentRepo->store($data);
        return redirect()->to('teacher/student/student')->with('create', 'New Student created');
    }



}
