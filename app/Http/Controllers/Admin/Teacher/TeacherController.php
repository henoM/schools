<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Contracts\Admin\Skills\SkillsInterface;
use App\Contracts\Admin\Teacher\TeacherInterface;
use App\Http\Requests\Admin\Teacher\TeacherCreate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Teacher\TeacherUpdate;
use App\Notifications\Teacher\TeacherStore;
use Illuminate\Http\Request;
use DB;
use Excel;

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
        return redirect()->to('admin/teacher/teacher')->with('create', 'New Teacher created');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function filter(Request $request)
    {
        $skillsId = $request->skillsId;
        $skill = $this->skillsRepo->getSkill($skillsId);

        $teachers = $skill->users;
        $view = view("admin/teachers/partials/_teacher",compact('teachers'))->render();
        return response()->json(['html'=>$view]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teacher($id){
        $teacher = $this->teacherRepo->getTeacherById($id);
        return view('admin.teachers.teacher',compact('teacher'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id){

        $skills = $this->skillsRepo->getSkills()->pluck('skills','id');

        $teacher = $this->teacherRepo->getTeacherById($id);

        return view('admin.teachers.update',compact('skills','teacher'));
    }


    public function edit(TeacherUpdate $request,$id)
    {

        $data = $request->inputs();
        $this->teacherRepo->edit($id,$data);
        return  redirect()->to('admin/teacher/teacher')->with('update', 'People update');

    }
    /**
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $this->teacherRepo->delete($id);
        return redirect()->to('admin/teacher/teacher')->with('delete', 'Teacher deleted');
    }


    public function download()
    {
        $users  = $this->teacherRepo->getTeacherForDownload()->toArray();
        $usersArray[] = array('First Name','Last Name','Email');
        foreach($users as $user)
        {
            $usersArray[] = array(
                'First Name'  => $user['first_name'],
                'Last Name'  => $user['last_name'],
                'Email'  => $user['email'],
            );
        }
        Excel::create('Teachers', function($excel) use ($usersArray){
            $excel->setTitle('Teachers');
            $excel->sheet('Teachers', function($sheet) use ($usersArray){
                $sheet->fromArray($usersArray, null, 'A1', false, false);
            });
        })->download('csv');
    }
}
