<?php

namespace App;
use App\User;
use App\Application;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function applications(){
        return $this->hasMany(Application::class, 'project_id');
    } //func
}//class
