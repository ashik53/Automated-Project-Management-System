<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Application;
use App\Interview;
use App\AcceptedRequest;
use App\Idea;
use Session;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth', ['except' => ['index']]);
    } //func
    //only for teacher
    public function edit($id){
        $project = Project::findOrFail($id);
        return view('project.update_project')->withProject($project);
    }//

    //only for teacher
    public function updateProject(Request $request, $id)
    {
        // dd(request()->all());

        $project= Project::findOrFail($id);

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->skills = $request->input('skills');
        $project->deadline = $request->input('deadline');

        


        $project->save();
        Session::flash('success', 'Your Project information is successfully updated.');

        return redirect("/view-a-project/$project->id/$project->owner_id");

    } //func

    //only for all
    public function index()
    {

        $current_user = User::findOrFail(auth()->id());

        $projects = collect();

        if($current_user->role == 2){
           $projects = Project::orderBy('id')->get();
        } else {
           $projects = Project::where('owner_id', auth()->id())->orderBy('id')->get();
        }


        

        //$userCollections[] = array();
        $userCollections = collect();
        foreach($projects as $project){
            $userCollections->add(User::findOrFail($project->owner_id));
        }

        return view('project.all_projects_list')->withUsers($userCollections)->withProjects($projects);

    }//func

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //only for teacher
    public function create()
    {
        $user = User::findOrFail(auth()->id());
        
        if($user->role == 2) abort(403);

        return view('project.create_project');   
    } //func

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // for all
    public function viewSingleProject($project_id , $owner_id)
    {
        $project = Project::findOrFail($project_id);
        $owner   = User::findOrFail($project->owner_id);

        //for only student

        $application = Application::where('user_id', auth()->id())
                                   ->where('project_id', $project_id)
                                   ->first();
        $interview = Interview::where('user_id', auth()->id())
                                   ->where('project_id', $project_id)
                                   ->first();

        $req = AcceptedRequest::where('user_id', auth()->id())
                                   ->first();

       // dd($req);
        $idea = Idea::where('owner_id',auth()->id()) 
                                   ->first();

        //assigned
        $assigned = AcceptedRequest::where('project_id', $project_id)
                                   ->first();



       // $application = Application::
       // dd($application);
        return view('project.single_project')->withProject($project)->withOwner($owner)->withApplication($application)->withInterview($interview)->withReq($req)->withIdea($idea)->withAssigned($assigned);
    }//func
    //only for teacher
    public function myProjects(){
        
        $currentUser = User::findOrFail(auth()->id());

        if($currentUser->role == 2) abort(403);

        $projects = Project::where('owner_id', auth()->id())->get();
        
        $userCollections = collect();
        foreach($projects as $project){
            $userCollections->add(User::findOrFail($project->owner_id));
        }

        return view('project.all_projects_list')->withUsers($userCollections)->withProjects($projects);        

    } //func
    //only for teacher
    public function assignedProjects(){

        $currentUser = User::findOrFail(auth()->id());

        if($currentUser->role == 2) abort(403);


        $myProjects = Project::where('owner_id', auth()->id())->get();

        $myAssignedProjects = collect();
        $users = collect();

        foreach($myProjects as $project){
            
            $req = AcceptedRequest::where('project_id', $project->id)->first();
            if(is_null($req) == false){
                $myAssignedProjects->add(Project::findOrFail($req->project_id));
                $users->add(User::findOrFail($req->user_id));
            }//

        }//

        return view("project.my_assigned_projects")->withUsers($users)->withProjects($myAssignedProjects);


    }//class

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //only for teacher
    public function update(Request $request, $id)
    {
        $project = new Project();

        $project->title = $request->title;
        $project->description = $request->description;
        $project->skills = $request->skills;
        $project->deadline = $request->deadline;
        
        $project->owner_id = auth()->id();
         
        $project->save();

        Session::flash('success', 'A new Project  is created successfully');

        return redirect("/view-a-project/$project->id/$project->owner_id");
    }//func

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects');
    }//func
    
    //only for students
    public function viewAllProjects(){

        $user = User::finOrFail(auth()->id());
        $projects = collect();
        
        if($user->role ==2){
            $projects = Project::all();
        }else {
            $projects = Project::where('owner_id', $auth()->id());
        }

    }
    //only for teacher
    public function viewMyProjects(){
        
        $projects = auth()->user()->projects;
        $userCollections = collect();
        foreach($projects as $project){
            $userCollections->add(User::findOrFail( auth()->id() ) );
        }//

        return view('project.all_projects_list')->withProjects($projects)->withUsers($userCollections);
    } //func


}//class
