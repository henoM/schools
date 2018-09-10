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

    /**
     * @param $skillsId
     * @return mixed|void
     */
    public function filter($skillsId){

        return $this->model->where('skills_id',$skillsId)->get();

    }

    /**
     * @param $id
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function delete($id){
        return $this->model->delete($id);
    }

    /**
     * @return mixed|void
     */
    public function active($id){
        $data = [
            'is_active' => 1
        ];
       return  $this->model->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTeacherById($id){
        return $this->model->where('id',$id)->first();
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function edit($id, $data){
        return $this->model->where('id', $id)->update($data);
    }
}