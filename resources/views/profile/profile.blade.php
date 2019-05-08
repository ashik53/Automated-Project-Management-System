@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Profile ')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">
          <div class="row">
            <div class ="col offset-4">
              @if (Auth::user()->id == $user['id']) 
                <h2> My Profile</h2>
              @else
                <h2> Profile Of  <span class="text-success"> {{ $user['first_name'] .' '}} {{ $user['last_name']}} </span></h2>
              @endif 
              <hr>
            </div> {{-- col--}}
          </div> {{-- row--}}

          <div class="row">
              
              
              {{-- for info show--}}
              <div class="col-8 offset-4">
                 <p> <span class="font-weight-bold"> Name: </span> {{ $user['first_name']. " "}} {{ $user['last_name'] }} </p>
                 <p> <span class="font-weight-bold"> Email: </span> {{ $user['email'] }} </p>
                 <p> <span class="font-weight-bold"> 

                  {{ $user['role'] == 1 ? 'Teacher ' : 'Student '}}
                    ID: </span> {{ is_null($user['stackholder_id']) ? 'not submitted' : $user['stackholder_id'] }} <p>
                  
                  <p> <span class="font-weight-bold"> Skills: </span>   {{ $user['skills'] }}  
                   
                  </p>

                  

                  <p> <span class="font-weight-bold"> Status: </span>  <span class="text-danger font-weight-bold"> {{ $user['role'] == 1 ? 'Teacher ' : 'Student '}}  
                   </span>
                  </p>

               </div> {{--col --}}

          </div> {{-- row (image show)--}}
          
          {{-- button for update--}}
          @if(Auth::check() == true && Auth::user()->id == $user['id'])

            
            <div class ="row">
              <div class="col-8 offset-4">
                <a href= "/edit-profile/{{Auth::user()->id}}" class= "btn btn-info btn-block text-light"> Update</a>
              </div> {{-- col--}}
            </div> {{--row--}}
          @endif
       </div> {{-- col --}}

     </div> {{-- row --}}     


@endsection
  
