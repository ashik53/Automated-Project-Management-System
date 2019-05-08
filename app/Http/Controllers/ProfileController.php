<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Application;
use App\Interview;
use App\Teacher;
use App\Student;
use Session;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');

    } //func

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.profile', compact('user'));
    }//func

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($user_id)
    {
       
        if(auth()->id() != $user_id) {
            abort(403);
        }

       $user = User::findOrFail($user_id);
       return view('profile.profile_update', compact('user')); 
    } //edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       // dd(request()->all());

        $user = User::findOrFail($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');

        $user->stackholder_id = $request->input('stackholder_id');
        $user->skills = $request->input('skills');

        $user->save();
        Session::flash('success', 'Your profile information is successfully updated.');


        if($user->role == 1){
            $teacher = Teacher::where('user_id', $user->id)->first();

            if(is_null($teacher) == true){
                $teacher = new Teacher();
                $teacher->user_id = $user->id;
            }

            $teacher->teacher_id = $user->stackholder_id;

            $teacher->save();
        }else {
            $student = Student::where('user_id', $user->id)->first();

            if(is_null($student) == true) {
                $student = new Student();
                $student->user_id = $user->id;
            }

            $student->student_id = $user->stackholder_id;

            $student->save();
        }//class





        return view('profile.profile', compact('user'));
    } //func

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myProjects(){

        


    }//func
}//class
