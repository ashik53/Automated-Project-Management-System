@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Create a new Project | Automated Project Management system')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

            <h1 class= "text-center mt-5"> {{ $project->title }}</h1>
            <hr>

              <form method="POST" action="/update-a-project/{{$project->id}}">
                  
                  @csrf
                  

                  <div class = "form-group"> 
                      <label for="title">  Title </label>
                      <input class = "form-control" type="text" name = "title" value= {{ $project->title}} required> 
                  </div>

                  <div class = "form-group">
                    <label for="description"> Description</label>
                    <textarea class = "form-control" name="description" rows="5" required> {{ $project->description }} </textarea> 
                  </div>
                  
                  
                  <div class = "form-group"> 
                      <label for="skills">  Skills</label>
                      <input class = "form-control" type="text" name = "skills"  value= {{ $project->skills }} required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="finished_date"> Deadline </label>
                      <input class = "form-control" type="date" name = "deadline" value= {{ $project->deadline }}> 
                  </div>

                  <button class = "btn btn-success mt-3 btn-block" type="submit" >Update project</button>

            </form>


            

      </div> <!-- col -->

    </div> <!-- row-->


@endsection

@section('scripts')

@endsection