<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //     Teacher/StudentsRepo
        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Repositories\UserRepository'
        );
        //     Admin/TeacherRepo
        $this->app->bind(
            'App\Contracts\Admin\Teacher\TeacherInterface',
            'App\Repositories\Admin\Teacher\TeacherRepository'
        );
        //     Admin/SkillsRepo
        $this->app->bind(
            'App\Contracts\Admin\Skills\SkillsInterface',
            'App\Repositories\Admin\Skills\SkillsRepository'
        );
        //     Teacher/StudentsRepo
        $this->app->bind(
            'App\Contracts\Teacher\Student\StudentInterface',
            'App\Repositories\Teacher\Student\StudentRepository'
        );
        //     Teacher/StudentsRepo
        $this->app->bind(
            'App\Contracts\Teacher\TeacherStudentInterface',
            'App\Repositories\Teacher\TeacherStudentRepository'
        );
    }
}
