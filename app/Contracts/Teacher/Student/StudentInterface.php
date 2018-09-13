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
     * @param $data
     * @return mixed
     */
    public function store($data);
}