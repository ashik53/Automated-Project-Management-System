@extends('main')

@section('title', 'Login here | Automated Project Management system')

@section('content')


<div class="container">

     <div class = "row">

       <div class= "col-8 offset-2">

            <h1 class= "text-center mt-5"> Login</h1>
            <hr>

              <form method="POST" action= "{{ route('login') }}">

                @csrf

                  <div class = "form-group"> 
                      <label for="email"> Email</label>
                      <input class = "form-control" type="text" name = "email"> 
                  </div>

                  <div class = "form-group">
                      <label for="password">Password</label>
                      <input class = "form-control" type="password" name="password"  > 
                  </div>                  

                  <button class = "btn btn-primary mt-3 btn-block" type="submit" >Log In</button>

            </form>
            
            
            <br>
            <a class="btn btn-success btn-block" href="{{ route('register') }}">  Register?  </a> </span> 

      </div> <!-- col -->

    </div> <!-- row-->


</div> <!--container -->

@endsection