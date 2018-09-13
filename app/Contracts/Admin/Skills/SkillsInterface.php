<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/7/18
 * Time: 4:33 PM
 */

namespace App\Contracts\Admin\Skills;


interface SkillsInterface
{
    /**
     * @return mixed
     */
    public function getSkills();

    /**
     * @return mixed
     */
    public function getSkillById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function store($data);


}