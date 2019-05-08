@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All Notifications')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

          <h1 class= "text-center"> Notifications</h1>

            {{-- notification 3--}}
          @foreach ($notifications as $alert)
          
            @if ($alert->type == 3) 
               
              <div class = "card border-success"> 

                <div class = "card-body"> 
                    <p> You are assigned for a project </p>
                    <p> Check Your  <a class="text-success"> assigned projects </a> </p>
                    
                    <a  href = "/delete-a-notification/{{$alert->id}}" class="btn btn-danger text-light"> Remove</a>
                    
                </div>
              </div> {{-- card--}}

            @elseif($alert->type == 4)

              <div class = "card border-success"> 

                <div class = "card-body"> 
                    <p> Your idea is accepted </p>
                    <p> Check Your  <a class="text-success"> assigned projects </a> </p>
                    
                    <a  href = "/delete-a-notification/{{$alert->id}}" class="btn btn-danger text-light"> Remove</a>
                    
                </div>
              </div> {{-- card--}}

            @elseif($alert->type == 2)

              <div class = "card border-info"> 

                <div class = "card-body"> 
                    <p> You called for an interview </p>
                    <p> Check Your  <a class="text-success"> interview calls </a> </p>
                    
                    <a  href = "/delete-a-notification/{{$alert->id}}" class="btn btn-danger text-light"> Remove</a>
                    
                </div>
              </div> {{-- card--}}

            @else
  
              {{-- notifications  --}}
              <div class = "card border-warning"> 

                <div class = "card-body"> 
                    <p> Someone applied in your job  </p>
                    <p> Check Your  <a class="text-success"> application list  </a> </p>
                    
                    <a href = "/delete-a-notification/{{$alert->id}}" class="btn btn-danger text-light"> Remove</a>
                    
                </div>
              </div> {{-- card--}}


            @endif
    
          @endforeach

      </div> <!-- col -->

    </div> <!-- row-->


@endsection
  
