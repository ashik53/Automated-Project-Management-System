<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use App\Project;
use App\Interview;
use App\AcceptedRequest;
use App\Idea;
use App\Alert;
use Session;

class ApplicationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function applyProject(Request $request, $project_id){
    	
        //only student
        $current_user = User::findOrFail(auth()->id()); 
        if($current_user->role == 1){
            abort(403);
        }

        //check student already applied or not
        $application = Application::where('project_id', $project_id)
                            ->where('user_id', auth()->id())
                            ->first();
        $interview = Interview::where('project_id', $project_id)
                            ->where('user_id', auth()->id())
                            ->first();

        $req = AcceptedRequest::where('user_id', auth()->id())
                            ->first();
        $idea = Idea::where('owner_id',auth()->id()) 
                                 ->first();

        $project = Project::findOrFail($project_id);
        $owner = User::findOrFail($project->owner_id);

        if(is_null($req) == false || is_null($application) == false || is_null($interview) == false || (is_null($idea)== false && $idea->status == 1)){
           
        }

        else {
    	
            $application = new Application(); 
        	$application->project_id = $project_id;
        	$application->user_id = auth()->id();
        	$application->message_body = $request->message_body;

        	$application->save();

            Session::flash('success', 'Successfully applied in this project');

            //create notification
            $alert = new Alert();
            $alert->type = 1;
            $alert->owner_id = $owner->id;
            $alert->project_id = $project_id;

            $alert->save();

       }//

       
       
       return redirect("/view-a-project/$project_id/$owner->id");
       

    }//func

    public function deleteProjectApplication($project_id, $user_id){

    	
        $project = Project::findOrFail($project_id);
        $owner   = User::findOrFail($project->owner_id);
        $application = Application::where('user_id', $user_id)
                                   ->where('project_id', $project_id)
                                   ->first();

        if(is_null($application) == false) $application->delete();

       // $application = Application::
       // dd($application);

        return redirect("/view-a-project/$project_id/$owner->id");

    } //func

    public function seeAllApplicants($project_id){

        $project = Project::findOrFail($project_id);
        $applications = $project->applications;

        if(auth()->id()!= $project->owner_id){
            abort(403);
        }

        $userCollections = collect();

        foreach($applications as $app){
            $userCollections->add(User::findOrFail($app->user_id));
        } //for

        return view('request.project_requests')->withApplications($applications)->withProject($project)->withUsers($userCollections);
    } //func

    public function acceptProjectRequestForInterview($project_id, $user_id){

        //find, project,its owner, and application of given user id
        $project = Project::findOrFail($project_id);
        $owner   = User::findOrFail($project->owner_id);
        $application = Application::where('user_id', $user_id)
                                   ->where('project_id', $project_id)
                                   ->first();

        if(auth()->id() != $project->owner_id){
            abort(403);
        }
        


        //save in interview table
        $interview = new Interview();

        $interview->project_id = $project_id;
        $interview->user_id = $user_id;

        $interview->save();

        //create notification
        $alert = new Alert();
        $alert->type = 2;
        $alert->owner_id = $user_id;
        $alert->project_id = $project_id;

        $alert->save();

        //delete application 
        if(is_null($application) == false) $application->delete();

        return redirect("all-applicants/$project_id");



    } //func

    public function seeAllInterviewers($project_id){

        $interviews = Interview::where('project_id', $project_id)
                                   ->orderBy('id', 'DESC')
                                   ->get();
        
        $project = Project::findOrFail($project_id);                           
        $userCollections = collect();

        foreach($interviews as $interview){
            $userCollections->add(User::findOrFail($interview->user_id));
        } //for



        return view('request.all_interview_calls_for_a_project')->withInterviews($interviews)->withProject($project)->withUsers($userCollections);
    } //class


    //assign a project 

    public function assignProject($project_id, $user_id){

        //authorization
        $current_user = User::findOrFail(auth()->id());
        $project = Project::findOrFail($project_id);

        if($current_user->role == 2 || $current_user->id!= $project->owner_id){
            abort(403);
        }




        //delete interview
        $interviews = Interview::where('project_id', $project_id)
                                  ->get();
        $applications = Application::where('project_id', $project_id)
                                  ->get();
        //delete all applications and interviews for this project
        foreach($interviews as $interview){
            if(is_null($interview) == false) $interview->delete();           
        }

        foreach($applications as $application){
            if(is_null($application) == false) $application->delete();           
        }
        

        //save  

        $assign = new AcceptedRequest();
        $assign->project_id = $project_id;
        $assign->user_id = $user_id;

        $assign->save();
        Session::flash('success', 'Successfully assigned in this project');

        //create notification
        $alert = new Alert();
        $alert->type = 3;
        $alert->owner_id = $user_id;
        $alert->project_id = $project_id;

        $alert->save();

        return redirect("/view-a-project/$project_id/$user_id");


    } //func


    //for students
    public function viewMyApplications(){

        $current_user = User::findOrFail(auth()->id());
            
        if($current_user->role == 1) abort(403);

        $applications = Application::where('user_id', auth()->id())->get();

        $projects = collect();
        $users = collect();

        foreach($applications as $app){
            $project = Project::findOrFail($app->project_id);
            $projects->add($project);
            $users->add(User::findOrFail($project->owner_id));
        }//

        return view("project.my_applied_projects_and_interview_calls")->withProjects($projects)->withUsers($users)->withValue(true);

    } //

    public function viewInterviewCalls(){
        $current_user = User::findOrFail(auth()->id());

        if($current_user->role == 1) abort(403);

        $interviews = Interview::where('user_id', auth()->id())->get();

        $projects = collect();
        $users = collect();

        foreach($interviews as $interview){
            $project = Project::findOrFail($interview->project_id);
            $projects->add($project);
            $users->add(User::findOrFail($project->owner_id));
        }//

        return view("project.my_applied_projects_and_interview_calls")->withProjects($projects)->withUsers($users)->withValue(false);

    }//

    public function gotProject(){

        $idea = Idea::where('owner_id', auth()->id())
                    ->where('status', 1)->first();

        $req = AcceptedRequest::where('user_id', auth()->id())->first();

        $title = ""; $description = ""; $skills = "";

        if(is_null($idea) == true && is_null($req) == false) {

            $project = Project::findOrFail($req->project_id);



            $title = $project->title;
            $description = $project->description;
            $skills = $project->skills;
        }else if(is_null($idea) == false && is_null($req) == true){
            $title = $idea->title;
            $description = $idea->description;
            $skills = $idea->skills;
        }//


        return view('project.got_project')->withTitle($title)->withDescription($description)->withSkills($skills)->withIdea($idea)->withReq($req);

    } //


}//class
