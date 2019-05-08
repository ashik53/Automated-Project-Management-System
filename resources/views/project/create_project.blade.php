@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Create a new Project | Automated Project Management system')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

            <h1 class= "text-center mt-5"> Post a project idea</h1>
            <hr>

              <form method="POST" action="/projects">
                  
                  @csrf

                  <div class = "form-group"> 
                      <label for="title">  Title </label>
                      <input class = "form-control" type="text" name = "title" required> 
                  </div>

                  <div class = "form-group">
                    <label for="description"> Description</label>
                    <textarea class = "form-control" name="description" rows="5" required></textarea> 
                  </div>
                  
                  
                  <div class = "form-group"> 
                      <label for="skills">  Skills</label>
                      <input class = "form-control" type="text" name = "skills" required> 
                  </div>

                  <div class = "form-group"> 
                      <label for="finished_date"> Deadline </label>
                      <input class = "form-control" type="date" name = "deadline"> 
                  </div>

                  <button class = "btn btn-success mt-3 btn-block" type="submit" >Confirm project</button>

            </form>


            

      </div> <!-- col -->

    </div> <!-- row-->


@endsection

@section('scripts')

@endsection