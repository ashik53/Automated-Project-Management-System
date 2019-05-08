@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Latest project requests from students')


@section('content')

	<div class="row">
		<div class="col-10 offset-1">
			

			<h2 class= "text-center"> <span class= "text-success"> {{ count($applications)}}  </span> requests from students for your projects</h2>

			<hr>
			
			<!-- all projects-->
            {{-- project1 --}}

            @php
            	$inc = 0
            @endphp

            @foreach($applications as $app)

               @php

               	   $user = $users->values()->get($inc)

               @endphp

			  <div class="row"> {{-- title--}}

			  		@php
			  			$project = $projects->values()->get($inc)
			  		@endphp

					<div class="col-8 offset-2">

						<h4> <a href= "/view-a-project/{{ $project->id}}/{{ $project->owner_id }}"> {{ $project->title }} </a> </h4>
						<p class="font-weight-bold">Message: <span class="lead"> {{ $app->message_body }} </span></p>
						

						<p > <span class="font-weight-bold"> Requested By </span> <a href="profiles/{{ $user->id }}" style="text-decoration:none"> {{ $user->first_name}} </a></p>
						
					</div>
					
					
				</div> <!-- row -->

				

				@php

               	   $inc = $inc + 1

               @endphp
				
			<hr>	
			@endforeach	

			

		</div> {{-- col--}}
	</div> {{-- row --}}

	
@endsection


