@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Latest project ideas from students')


@section('content')

	<div class="row">
		<div class="col-10 offset-1">

			<h2 class= "text-center">
        @if (Auth::user()->role == 1)
			     {{ count($ideas) }} project ideas from students
        @else
           You posted {{ count($ideas) }}   ideas.
        @endif 
      </h2>

      @php
        $inc = 0
      @endphp

      @foreach($ideas as $idea)

        @php
          $user = $users->values()->get($inc)
        @endphp

    			<div class = "card border-success" style ="margin-bottom:3px"> 

                  <div class = "card-body" > 
                      <p> {{ $idea->title }}</p>
                      <p> Submitted by   <span class="text-success">  {{$user->first_name }} </span>   </p>
                      
                          <a href ="view-a-student-idea/{{$idea->id}}" class="btn btn-info text-light"> view</a>
                      
                  </div>
          </div>

          @php
            $inc = $inc + 1
          @endphp

      @endforeach
			
			

		</div> {{-- col--}}
	</div> {{-- row --}}
	
@endsection


