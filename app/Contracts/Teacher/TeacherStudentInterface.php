<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/12/18
 * Time: 12:36 PM
 */

namespace App\Contracts\Teacher;


interface TeacherStudentInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);
}