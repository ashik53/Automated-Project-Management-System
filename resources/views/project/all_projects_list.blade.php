@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All Projects')


@section('content')

	<div class="row">
		<div class="col-10 offset-1">
			
			
			@if(Auth::user()->role == 2)	
				<h1 class="text-center"> <span class="text-success"> {{ count($projects) }}</span> projects are available for apply</h1>
			@else
				<h1 class="text-center"> You posted only <span class="text-success"> {{ count($projects) }}</span> projects.</h1>
			@endif


			<hr>
			
			<!-- all projects-->
            {{-- project1 --}}

            @php
            	$inc = 0;
            @endphp

            @foreach ($projects as $project)
				<div class="row"> {{-- title--}}

					<div class="col-8">
						<h3> {{ $project->title }}</h3>
						<p>  {{ substr($project->description, 0, 50) }} {{ strlen($project->description) > 49 ? "..." : ""}}</p> {{-- only 30 ta char--}}

						@php
							$user = $users->values()->get($inc)
						@endphp

						<p> <span class="font-weight-bold"> Posted By </span> <a href="/profiles/{{ $project->owner_id}}" style="text-decoration:none"> {{ $user->first_name }} </a></p>
					</div>
					<div class="col-4"> {{-- buttons--}}
						<a href="/view-a-project/{{$project->id}}/{{$project->owner_id}}" class="btn btn-primary text-light btn-block"> View </a>
								


					</div> {{-- col buttons--}}
					
				</div> <!-- row -->
				<hr>
				@php
					$inc = $inc + 1
				@endphp
			@endforeach

			

		</div> {{-- col--}}
	</div> {{-- row --}}
	
@endsection


