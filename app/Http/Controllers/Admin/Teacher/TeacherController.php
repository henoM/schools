<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Contracts\Admin\Skills\SkillsInterface;
use App\Contracts\Admin\Teacher\TeacherInterface;
use App\Http\Requests\Admin\Teacher\TeacherCreate;
use App\Http\Controllers\Controller;
use App\Notifications\Teacher\TeacherStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    protected  $teacherRepo;
    protected  $skillsRepo;

    public function __construct(TeacherInterface $teacherRepo,SkillsInterface  $skillsRepo)
    {

        $this->teacherRepo = $teacherRepo;
        $this-> skillsRepo = $skillsRepo;

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $skills = $this->skillsRepo->getSkills()->pluck('skills','id');
       $teachers = $this->teacherRepo->getTeacher();
       return view('admin.teachers.teachers',compact('skills','teachers'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $skills = $this->skillsRepo->getSkills()->pluck('skills','id');

        return view('admin.teachers.create',compact('skills'));
    }

    public function store(TeacherCreate $request)
    {

            $user = $this->teacherRepo->store($request->all());
            $token = app('auth.password.broker')->createToken($user);
            $user->token =  $token;
            $user->notify(new TeacherStore($user));
            dd(1);
    }
    public function filter(Request $request)
    {
        $skillsId  = $request->skills_id;
        $skills = $this->skillsRepo->getSkills()->pluck('skills','id');
        $teachers = $this->teacherRepo->filter($skillsId);
        return view('admin.teachers.teachers',compact('skills','teachers'));

    }
}
