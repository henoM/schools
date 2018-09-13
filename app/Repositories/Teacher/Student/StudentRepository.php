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

    public function store($data){

        return $this->userRepo->store($data);
    }

}