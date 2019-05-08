<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//----------------------home pages--------
//for teachers and students
Route::get('/', 'WelcomeController@showPage');/*function () {
    return view('project.requested_projects');
}); */
//for students


//---------------Student List------------
Route::get('view-all-students', 'StackholderController@getStudents');

//---------------Profile-----------------

Route::resource('profiles', 'ProfileController');

Route::get('view-a-profile', function () {
    return view('profile.profile');
});
//show profile update page
Route::get('/edit-profile/{user_id} ','ProfileController@editProfile');

//----------------------Project ------------------


//show all projects for teacher
Route::get('/view-projects', 'ProjectController@viewAllProjects');
Route::resource('projects', 'ProjectController');
Route::post('/update-a-project/{id}','ProjectController@updateProject');
//view a single project with project id, owner id, auth()->id
Route::get('/view-a-project/{project_id}/{owner_id}','ProjectController@viewSingleProject');
//view my(teacher) projects 
Route::get('view-my-projects', 'ProjectController@viewMyProjects');
Route::get('/view-my-assigned-projects', 'ProjectController@assignedProjects');
Route::get('/view-my-interview-calls', 'ApplicationController@viewInterviewCalls');
Route::get('/view-my-applications', 'ApplicationController@viewMyApplications');
//Route::get('/view-all-projects','ProjectController@Project');

/*Route::get('view-a-project-request', function () {
    return view('request.request_body');
});*/

//-----------------------Application-----------------

//apply in a project(for student)
Route::post('apply-project/{project_id}', 'ApplicationController@applyProject');
// delete application(for student + project owner ) ---> anyone can delete application
Route::get('/delete-application/{project_id}/{user_id}', 'ApplicationController@deleteProjectApplication');

//see all applicants
Route::get('/all-applicants/{project_id}', 'ApplicationController@seeAllApplicants');



//project reqests accepts/ignore part
//accept for interview
Route::get('accept-req-for-interview/{project_id}/{user_id}', 'ApplicationController@acceptProjectRequestForInterview');
//see all interviewers for a project
Route::get('all-interviewers/{project_id}','ApplicationController@seeAllInterviewers');
//assign
Route::get('assign-project/{project_id}/{user_id}', 'ApplicationController@assignProject');


//----------------------Notification---------------

Route::get('/view-all-notifications', 'AlertController@index');
Route::get('/delete-a-notification/{alert_id}', 'AlertController@remove');
//delete a notification
/*Route::get('view-all-notifications', function () {
    return view('notification.notifications_all');
}); */

//----------------------- Project Idea-------------
//create an idea
Route::get('/create-idea', 'IdeaController@create');/*function () {
    return view('idea.idea_create');
});*/
//post idea
Route::post('/idea-save', 'IdeaController@store');
//show all ideas(student and teacher)
Route::get('/accept-idea/{idea_id}/{owner_id}','IdeaController@acceptIdea' );
Route::get('/view-all-ideas', 'IdeaController@index');
//accept an idea by teacher

//show an idea
Route::get('view-a-student-idea/{idea_id}', 'IdeaController@viewIdea');/* function () {
    return view('idea.indivisual_project_idea');
}); */
//---------------Got project or idea-----------------

Route::get('/got-project', 'ApplicationController@gotProject');






Auth::routes();