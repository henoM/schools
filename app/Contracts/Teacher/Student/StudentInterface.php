<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/11/18
 * Time: 12:54 PM
 */

namespace App\Contracts\Teacher\Student;


interface StudentInterface
{
    /**
     * @return mixed
     */
    public function getStudent();

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);
}