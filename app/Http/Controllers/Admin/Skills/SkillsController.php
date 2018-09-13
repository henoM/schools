<?php

namespace App\Http\Controllers\Admin\Skills;

use App\Contracts\Admin\Skills\SkillsInterface;
use App\Http\Requests\Admin\Teacher\SkillsFilter;
use App\Http\Requests\Skills\SkillsCreate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillsController extends Controller
{
    protected $skillsRepo;

    /**
     * SkillsController constructor.
     * @param SkillsRepository $skillsRepo
     */
    public  function  __construct(SkillsInterface $skillsRepo)
     {
         $this->skillsRepo = $skillsRepo;
     }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

       $skills =  $this->skillsRepo->getSkills();

        return view('admin.skills.skills',['skills' => $skills]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(SkillsCreate $request)
    {
        $data = $request->except('_token');
        $this->skillsRepo->store($data);
        return redirect()->to('admin/teacher/teacher')->with('create', 'New Skills created');
    }
}
