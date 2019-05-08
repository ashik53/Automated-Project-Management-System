<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Teacher;
use App\Student;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    public $role;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if(array_key_exists('teacher', $data) ==true && array_key_exists('student', $data) == false) {
            $role = 1;
        }else if(array_key_exists('teacher', $data) == false && array_key_exists('student', $data) == true) {
            $role = 2;
        } else {
            //return redirect()->back()->withErrors(['error' => 'Select checkbox once at a time']);
            //abort(500, 'Select checkbox once at a time');
            $role = 0;
           // return back()->withErrors('Select checkbox once at a time');

        }
        
       // dd($role);
        $data['role'] = $role;
        //dd($data);
        
        $validator = Validator::make($data, [
            'role' => 'numeric|between:1,2',
        ]);
        
        return  Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'password_confirmation' => ['required', 'string', 'min:5', 'same:password'],
            'role' => 'numeric|between:1,2',   
           ],
           [

             'role.between' => 'You must select one role only',

           ]
        );
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {



        
        $user =  User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role'  => $data['role'],
                ]);


        if($user->role == 1){
            $teacher = new Teacher();
            $teacher->user_id = $user->id;
            $teacher->save();
        }else if($user->role == 2){
            
            $student = new Student();
            $student->user_id = $user->id;
            $student->save();
        
        }//

        return $user;
    }//func


}//class
