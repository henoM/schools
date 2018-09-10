<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/18
 * Time: 4:34 PM
 */

namespace App\Repositories\Admin\Skills;


use App\Contracts\Admin\Skills\SkillsInterface;
use App\Models\Skills;

class SkillsRepository implements SkillsInterface
{
    protected  $model;

    /**
     * SkillsRepository constructor.
     * @param Skills $model
     */
    public function __construct(Skills $model)
    {
        $this->model = $model;
    }


    /**
     * @return mixed
     */
    public  function getSkills(){
        return $this->model->paginate(10);
    }

    /**
     * @return mixed
     */
    public  function getSkill($id){
      return $this->model->where('id',$id)->first();
    }
}