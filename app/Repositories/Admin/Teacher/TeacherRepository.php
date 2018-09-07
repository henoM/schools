<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/18
 * Time: 12:30 PM
 */

namespace App\Repositories\Admin\Teacher;


use App\Contracts\Admin\Teacher\TeacherInterface;
use App\User;

class TeacherRepository implements TeacherInterface
{

    protected $model;

    /**
     * TeacherRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }


    /**
     * @return mixed
     */
    public function getTeacher(){
        return $this->model->where('role_id',2)->paginate(10);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data){
//        dd($data);
        return $this->model->create($data);
    }
}