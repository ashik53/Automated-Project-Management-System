@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All interview calls for a project ')

@section('content')
    <div class="row"> 
      <div class="col-10 offset-1">
        <h2 class="text-center"> <span class="text-success"> {{ count($interviews) }}</span> persons are called for interview for   <a class="text-info"> {{ substr($project->title, 0, 30) }} {{ strlen($project->title) > 30 ? "..." : ""}} </a> </h2> <br>
      </div> {{-- col --}}
    </div> {{-- row--}}

    @php
      
      $inc = 0

    @endphp

    @foreach ($interviews as $interview)

      @php
        
        $user = $users->values()->get($inc);
        $inc = $inc + 1
      
      @endphp

      <div class="row">
        <div class ="col-4 offset-4">
          <div class = "card"> 
             <div class="card-header">
                <p class="text-center"><a href ="/profiles/{{$user->id }}" class="font-weight-bold text-dark text-center"> {{ $user->first_name.' ' }} {{ $user->last_name }}</a>  </p>
             </div>
             <div class="card-footer">
                <a href="/assign-project/{{$interview->project_id}}/{{$user->id}}" class="btn btn-success btn-block text-light"> Assign</a>
             </div> 
         
          </div> {{-- card --}}
        </div> {{-- col--}}
      </div> {{-- row--}}
      <br>


    @endforeach 
            




@endsection