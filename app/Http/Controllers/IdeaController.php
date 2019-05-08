<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\User;
use App\AcceptedRequest;
use App\Interview;
use App\Application;
use App\Alert;
use Session;

class IdeaController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    } //func



    public function create(){

    	$current_user = User::findOrFail(auth()->id());

        $req = AcceptedRequest::where('user_id', auth()->id())->first();

    	if($current_user->role == 1) abort(403);


    	$idea = Idea::where('owner_id', auth()->id())->first();


    	return view('idea.idea_create')->withIdea($idea)->withReq($req);
    }//func

    public function index(){
    	
    	$current_user = User::findOrFail(auth()->id());

    	$ideas = collect();
    	$users = collect();

    	if($current_user->role == 1){
    		$ideas = Idea::orderBy('id', 'DESC')->get();
    	} else {
    		$ideas = Idea::where('owner_id', auth()->id())->orderBy('id', 'DESC')->get();
    	}


    	foreach($ideas as $idea){
    		$users->add(User::findOrFail($idea->owner_id));
    	} //

    	return view('idea.student_idea_list')->withIdeas($ideas)->withUsers($users);

    }//func

    public function viewIdea($idea_id){

    	$idea = Idea::findOrFail($idea_id);
    	$owner = User::findOrFail($idea->owner_id);

    	$req = AcceptedRequest::where('user_id', $owner->id)->first();



    	return view('idea.indivisual_project_idea')->withReq($req)->withIdea($idea)->withOwner($owner);

    }//func

    public function store(Request $request){

    	$idea = new Idea();

        $idea->title = $request->title;
        $idea->description = $request->description;
        $idea->skills = $request->skills;
        
        $idea->owner_id = auth()->id();
         
        $idea->save();

        Session::flash('success', 'A new Idea  is created successfully');

        return redirect("/view-all-ideas");

    } //func

    public function acceptIdea($idea_id, $owner_id){

    	//dd("hello");



    	$current_user = User::findOrFail(auth()->id());

    	if($current_user->role == 2) abort(403);

        //delete interview
        $interviews = Interview::where('user_id', $owner_id)
                                  ->get();
        $applications = Application::where('user_id', $owner_id)
                                  ->get();
        //delete all applications and interviews for this project
        foreach($interviews as $interview){
            if(is_null($interview) == false) $interview->delete();           
        }

        foreach($applications as $application){
            if(is_null($application) == false) $application->delete();           
        }


    	$idea = Idea::findOrFail($idea_id);
    	$idea->status = 1;

    	$idea->save();

    	Session::flash('success', 'Successfully assigned this idea owner');


        //create notification
        $alert = new Alert();
        $alert->type = 4;
        $alert->owner_id = $owner_id;
        $alert->idea_id = $idea_id;

        $alert->save();


    	return redirect("view-a-student-idea/$idea_id");



    }//func




}//class
