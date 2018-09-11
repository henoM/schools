<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/18
 * Time: 12:30 PM
 */

namespace App\Repositories\Admin\Teacher;


use App\Contracts\Admin\Teacher\TeacherInterface;
use App\Repositories\UserRepository;

class TeacherRepository implements TeacherInterface
{

    protected $userRepo;

    /**
     * TeacherRepository constructor.
     * @param User $model
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return mixed
     */
    public function getTeacher()
    {
        $id = 2;
       return $this->userRepo->getUsers($id);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->userRepo->store($data);

    }

    /**
     * @return mixed|void
     */
    public function active($id)
    {

        $data = [
            'is_active' => 1
        ];

        return  $this->userRepo->active($data,$id);
    }



    /**
     * @param $id
     * @return mixed
     */
    public function getTeacherById($id)
    {
        return $this->userRepo->getUserById($id);
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function edit($id, $data)
    {
        return $this->userRepo->edit($id, $data);
    }

    /**
    * @param $id
    * @return bool|mixed|null
    * @throws \Exception
    */
    public function delete($id)
    {
        return $this->userRepo->delete($id);
    }

    /**
     * @return mixed
     */
    public function getTeacherForDownload()
    {
        $id = 2;
        return $this->userRepo->getTeacherForDownload($id);
    }
}