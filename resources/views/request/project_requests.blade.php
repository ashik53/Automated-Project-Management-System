@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All single request')

@section('content')

        <div class="row">
           <div class ="col-10 offset-2">
            <h2 class="text-center"> <span class="text-success"> {{ count($applications) }}  </span> requests for this  <a href ="/view-a-project/{{$project->id}}/{{$project->owner_id}}"> project </a> </h2> <br>

            @php
              $inc = 0
            @endphp

            @foreach ($applications as $app)

              @php
                $user = $users->values()->get($inc);
              @endphp

              <div class="row">
                <div class="col-6">
                    <p> {{ $app->message_body }} </p>
                    <p> <span class="font-weight-bold"> Messaged By </span> <span class="text-primary text-muted"> {{ $user->first_name }}</span></p>
                </div> <!-- col-->

                <div class="col-6">
                    <a href="http://127.0.0.1:8000/profiles/{{ $user->id }}" class="btn btn-info  text-light"> View profile</a>
                    <a href="/accept-req-for-interview/{{$project->id}}/{{ $user->id}}" class="btn btn-success text-light"> Call for interview </a>
                    <a href= "/delete-application/{{$project->id}}/{{$user->id}}" class="btn btn-danger text-light"> Ignore</a>

                </div> <!-- col -->
              </div> <!-- row-->
              
              @if (count($applications)-1 !=$inc)
                <hr>
              @endif
            @php
              $inc = $inc +1 
            @endphp

            @endforeach
        </div> {{-- col--}}
      </div> {{-- row --}} 
@endsection
  
