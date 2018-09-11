<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/11/18
 * Time: 1:54 PM
 */

namespace App\Repositories;


use App\Contracts\UserInterface;
use App\User;

class UserRepository implements UserInterface
{
 protected  $model;

  public function __construct(User $model)
  {
      $this->model = $model;
  }

    /**
     * @param $id
     * @return mixed
     */
    public function getUsers($id)
    {
        return $this->model->where('role_id', $id)->paginate(10);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
    }

    /**
     * @return mixed|void
     */
    public function active($data,$id)
    {
        return  $this->model->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->model->where('id',$id)->first();
    }


    /**
     * @param $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function delete($id)
    {
        dd($id);
        return $this->model->delete(4);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function edit($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }
    /**
     * @param $id
     * @return mixed
     */
    public function getTeacherForDownload($id)
    {
        return $this->model->where('role_id', $id)->get();
    }
}
