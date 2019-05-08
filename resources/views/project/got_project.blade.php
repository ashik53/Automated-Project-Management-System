@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Create a new Project | Automated Project Management system')

@section('content')
     <div class = "row">

       <div class= "col-10 offset-2">

          @if (is_null($idea) == true && is_null($req) == true) 

              <h2 class="text-danger"> You are not assigned yet</h2>
          @else
                  <h2 class= "text-success"> You got a project , check below for details</h2>

                    <div class="row">
                      <div class="col">

                       <div class = card> 

                          <div class= "card-header bg-info"> 
                            
                              <h3 class= "text-light"> {{ $title }}</h3>

                          </div>

                          <div class="card-body"> 

                              <p class="lead"> {{ $description }} </p>


                          </div>

                          <div class="card-footer bg-danger"> 

                              <p class="text-light"> {{ $skills }} </p>


                          </div>

                       </div> {{-- card --}}
                    </div>
                  </div>
                    

              </div> <!-- col -->

            </div> <!-- row-->

        @endif
@endsection

@section('scripts')

@endsection