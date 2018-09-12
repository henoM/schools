<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/12/18
 * Time: 12:35 PM
 */

namespace App\Repositories\Teacher;


use App\Contracts\Teacher\TeacherStudentInterface;
use App\Models\TeacherStudent;

class TeacherStudentRepository implements TeacherStudentInterface
{
    protected $model;

    public function __construct(TeacherStudent $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {

       return  $this->model->create($data);

    }

}