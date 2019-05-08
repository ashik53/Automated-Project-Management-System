<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use App\Application;

class WelcomeController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    } //func

    public function showPage(){

    	$current_user = User::findOrFail(auth()->id());

    	if($current_user->role == 2){
            return redirect("/projects");
    	}//

        // for teachers only requested projects
        $projects = Project::where('owner_id', auth()->id())->orderBy('id', 'DESC')->get();



        $jobs = collect();
        $applications = collect();
        $users = collect();

        foreach($projects as $project){
            
            $apps = Application::where('project_id', $project->id)->get();

            foreach($apps as $app){
                $applications->add($app);
                $users->add(User::findOrFail($app->user_id));
                $jobs->add(Project::findOrFail($app->project_id));
            }//
        }//




        return view('project.requested_projects')->withApplications($applications)->withUsers($users)->withProjects($jobs);
        


    } //func

} //class
