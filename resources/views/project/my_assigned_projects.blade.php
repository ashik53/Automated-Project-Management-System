@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'My assigned projects')


@section('content')

	<div class="row">
		<div class="col-10 offset-1">
			

			<h2 class= "text-center">You assigned <span class= "text-success"> {{ count($projects)}}  </span>  projects to students</h2>

			<hr>
			
			<!-- all projects-->
            {{-- project1 --}}

            @php
            	$inc = 0
            @endphp

            @foreach($projects as $project)

               @php

               	   $user = $users->values()->get($inc)

               @endphp

			  <div class="row"> {{-- title--}}

					<div class="col-8 offset-2">

						<h4> <a href= "/view-a-project/{{ $project->id}}/{{ $project->owner_id }}"> {{ $project->title }} </a> </h4>

						<p > <span class="font-weight-bold"> Assigned to:: </span> <a href="/profiles/{{ $user->id}}" style="text-decoration:none"> {{ $user->first_name}} </a></p>
						
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


