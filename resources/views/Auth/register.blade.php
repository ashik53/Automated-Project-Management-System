@extends('main')

@section('title', 'Register here | Automated Project Management system')

@section('content')

<div class="container">

     <div class = "row">

       <div class= "col-8 offset-2">

            <h1 class= "text-center mt-5"> Register</h1>
            <hr>

              <form method="POST" action="{{ route('register') }}">

                  @csrf

                  <div class = "form-group"> 
                      <label for="first_name"> First Name </label>
                      <input class = "form-control" type="text" id="first_name" name = "first_name"required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="last_name"> Last Name </label>
                      <input class = "form-control" type="text" id="last_name" name = "last_name"required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="email"> Email</label>
                      <input class = "form-control" type="text" id="email" name = "email"required> 
                  </div>

                  <div class = "form-group">
                      <label for="password">Password</label>
                      <input class = "form-control" type="password" name="password"  required> 
                  </div>

                  <div class = "form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input class = "form-control" type="password" name="password_confirmation" required > 
                  </div>

                   <div class= "form-check">
                      <label class = "form-check-label">
                      <input class = "form-check-input" type="checkbox" name="student">
                          Sign up as a student
                      </label>
                  </div>

                  <div class= "form-check">
                      <label class = "form-check-label">
                      <input class = "form-check-input" type="checkbox" name="teacher">
                          Sign up as a teacher
                      </label>
                  </div>

                    {{-- error--}}

                  

                  {{-- submit button--}}

                  <div>
                        <button class = "btn btn-success btn-block mt-3" type="submit" >Register</button>
                        <a href= "{{ route('login') }}" class = "btn btn-warning btn-block mt-3 " >Already have an account</a>
                    </div> <!-- col-->
                  </div> <!-- row -->


            </form>
            

      </div> <!-- col -->

    </div> <!-- row-->


  </div> <!--container -->

@endsection
