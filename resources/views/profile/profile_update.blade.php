@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Profile Update')

@section('content')
     <div class = "row">

       <div class= "col">

          <h2 class="text-center"> Update Info</h2> <br>

            <div class="row">
               <div class="col-8 offset-3">
		          	<form method="POST" action="/profiles/{{ $user->id }}">

		                  {{ method_field('PATCH') }}
						  {{ csrf_field() }}

		                  <div class = "form-group"> 
		                      <label for="first_name"> First Name </label>
		                      <input class = "form-control" type="text" id="first_name" name = "first_name"  value="{{ $user->first_name}}"> 
		                  </div>

		                  <div class = "form-group"> 
		                      <label for="last_name"> Last Name </label>
		                      <input class = "form-control" type="text" id="last_name" name = "last_name" value="{{ $user->last_name}}"> 
		                  </div>

		                  <div class = "form-group"> 
		                      <label for="skills"> Skills </label>
		                      <input class = "form-control" type="text" id="skills" name = "skills" value="{{ $user->skills}}"> 
		                  </div>

		                  <div class = "form-group"> 
		                      <label for="stackholder_id">   {{ $user->role == 1 ? 'Teacher ' : 'Student '}} ID </label>
		                      <input class = "form-control" type="text" name = "stackholder_id" value="{{ $user->stackholder_id}}"> 
		                  </div>

		                  <button class="btn btn-success btn-block" type="submit"> Update</button>
		            </form>
		       </div> {{-- col--}}
        	</div> {{-- row --}}


       </div> {{-- col --}}

     </div> {{-- row --}}     


@endsection
  
