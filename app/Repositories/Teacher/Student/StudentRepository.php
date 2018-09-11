<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/11/18
 * Time: 12:55 PM
 */

namespace App\Repositories\Teacher\Student;


use App\Contracts\Teacher\Student\StudentInterface;
use App\Repositories\UserRepository;

class StudentRepository implements  StudentInterface
{
    protected $userRepo;

    public  function __construct(UserRepository $userRepo)
    {
      $this->userRepo = $userRepo;
    }

    /**
     * @return mixed
     */
    public function getStudent()
    {
        $id = 3;
       return  $this->userRepo->getUsers($id);
    }
    public function store($data){
//        dd($data);
        return $this->userRepo->store($data);
    }
}