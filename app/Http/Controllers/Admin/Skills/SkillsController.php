<?php

namespace App\Http\Controllers\Admin\Skills;

use App\Contracts\Admin\Skills\SkillsInterface;
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

    public function index(){

       $skills =  $this->skillsRepo->getSkills();

        return view('admin.skills.skills',['skills' => $skills]);
    }
}
