@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Individual Project Page')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

            <h3 class= "text-center" style ="margin-bottom:10px">  {{ $project->title }}</h3> {{-- job title php --}}
            

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Description</span>
              </div> 
              <div class="col-8">
                <p class="lead ">  {{ $project->description }}</p>

              </div>
            </div> <!-- row-->

           

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Skills</span>
              </div> 
              <div class="col-8">
                <p class="lead "> {{ $project->skills}} </p>
              </div>
            </div> <!-- row-->

            <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Deadline</span>
              </div> 
              <div class="col-8">
                <p class="lead "> {{ $project->deadline }}</p>

              </div>
            </div> <!-- row-->

             <div class="row">
              <div class="col-2">
                <span class="font-weight-bold text-center"> Posted By</span>
              </div> 
              <div class="col-8">
                <p class="lead "> 
                  <a href= "/profiles/{{$owner->id}}" class="text-muted text-info"> {{ $owner->first_name. ' ' }} {{ $owner->last_name}} </a>
                </p>

              </div>
            </div> <!-- row-->

            <!-- check a project is assigned or not-->


           @if(Auth::check() == true && is_null($assigned) == false)

                <h4 class="font-weight-bold text-danger text-center"> This project is alreaday assigned</h4>


           @elseif(Auth::check() == true && Auth::user()->role == 2)
               

              @if(is_null($application) == true && is_null($interview) == true  && is_null($req) == true && (is_null($idea) == true || $idea->status == 0))
                <!-- apply for a project (modal with form) (student)-->
                
                   <button class = "btn btn-success btn-block" data-toggle ="modal" data-target ="#applyModal" type="submit"> Apply in this project</button>
      
                   <div class = "modal" id ="applyModal">
                      <div class = "modal-dialog modal-lg">
                        <div class = "modal-content">
                          <div class = "modal-header">
                            
                            <h5 class = "modal-title">Apply in this project</h5>
                          
                          </div> 
                          
                          <form method="POST" action="/apply-project/{{ $project->id}}">
                            @csrf
                            <div class = "modal-body">
                              

                                <div class = "form-group">
                                  <label for = "message_body">Write your message</label>
                                  <textarea class = "form-control input-lg" name ="message_body" type="text" required > </textarea>
                                </div>
                                
                              
                            </div> <!-- div = modal-body -->
                            <div class = "modal-footer">
                              <button class = "btn btn-secondary input-lg" data-dismiss="modal" > 
                              Close</button>
                              <button class = "btn btn-warning input-lg" type="submit"> Apply
                              </button>
                            </div> <!-- modal-footer -->
                          </form>
                        </div> <!-- modal-content -->
                        </div> <!--modal-dialog -->
                      
                      </div> <!--modal -->

              @elseif(is_null($application) == false && is_null($interview) == true  && is_null($req) == true && (is_null($idea) == true || $idea->status == 0))
                
                  

                  <a  href ="/delete-application/{{$project->id}}/{{ Auth::user()->id}}" class="btn btn-danger text-light btn-block"> Cancel application for this  project</a>

              @elseif( (is_null($interview) == false || is_null($application) == false) && (is_null($idea) == true || $idea->status == 0 ) )

                  <h4 class="font-weight-bold text-danger text-center"> Already got interview call for this project</h4>

              @elseif(is_null($req) == false || is_null($idea) == false)

                  <h4 class="font-weight-bold text-danger text-center"> You are assigned to a project</h4>

              @endif 
          
         {{-- check all application and interview list (for teacher and post owner) --}}          

          @elseif (Auth::check() == true && Auth::user()->role == 1 && Auth::user()->id == $owner->id)

                <a href ="/projects/{{$project->id}}/edit" class = "btn btn-danger btn-block text-light"> Edit this project</a>

                <a style ="margin-top:10px" class="btn btn-info btn-block" href="/all-applicants/{{ $project->id }}"> See all applicants for this project </a>
                
                <a style ="margin-top:10px" class="btn btn-success btn-block" href="/all-interviewers/{{ $project->id }}"> See all interviewers for this project </a>
              
          @endif




      </div> <!-- col -->

    </div> <!-- row-->


@endsection
  
