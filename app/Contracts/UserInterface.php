<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/11/18
 * Time: 1:54 PM
 */

namespace App\Contracts;


interface UserInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getUsers($id);
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function active($data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id);
    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function edit($id, $data);
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getTeacherForDownload($id);


    public function getByPassport($passport);
}