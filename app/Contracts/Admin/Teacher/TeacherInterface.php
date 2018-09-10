<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/18
 * Time: 12:25 PM
 */

namespace App\Contracts\Admin\Teacher;


interface TeacherInterface
{
    /**
     * @return mixed
     */
    public function getTeacher();

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $skillsId
     * @return mixed
     */
    public function filter($skillsId);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function active($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getTeacherById($id);
    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function edit($id, $data);

}