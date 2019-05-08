@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Individual student idea')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

            <h3 class= "text-center" style ="margin-bottom:10px"> {{ $idea->title }}</h3> {{-- job title php --}}
            

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Description</span>
              </div> 
              <div class="col-8">
                <p class="lead "> {{ $idea->description }}</p>

              </div>
            </div> <!-- row-->


            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Skills</span>
              </div> 
              <div class="col-8">
                <p class="lead "> J{{ $idea->skills }} </p>
              </div>
            </div> <!-- row-->

            

             <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Posted By</span>
              </div> 
              <div class="col-8">
                <p class="lead "> 
                  <a href= "profiles/ {{ $owner->id}}" class="text-muted text-info">  {{ $owner->first_name }} </a>
                </p>

              </div>
            </div> <!-- row-->

                <!--teacher portion -->

            @if (Auth::user()->role == 1)

              @if (is_null($req) == false)
                  
                  <p class="text-danger lead font-weight-bold"> This idea owner is assigned to another project</p>

              @elseif ($idea->status == 1)
                  <p class="text-danger lead font-weight-bold"> This idea is assigned to its owner</p>
              @else 

                 <a href ="/accept-idea/{{ $idea->id }} /{{ $owner->id }}" class="btn btn-info text-light btn-block">Accept this project idea </a>
              
              @endif

              {{-- student portion--}}

            @elseif(Auth::user()->role == 2)
      
              @if (is_null($req) == false)
                  
                  <p class="text-danger lead font-weight-bold"> This idea owner is assigned to another project</p>

              @elseif ($idea->status == 1)
                  <p class="text-danger lead font-weight-bold"> This idea is assigned to its owner</p>

              @else
                  <p class="text-warning lead font-weight-bold"> This idea is not assigned yet</p> 
              @endif
           

            @endif
            
            



      </div> <!-- col -->

    </div> <!-- row-->


@endsection
  
