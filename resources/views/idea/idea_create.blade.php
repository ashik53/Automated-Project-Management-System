@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Project Idea Submission')

@section('content')
     <div class = "row">

       <div class= "col-8 offset-2">

          @if (is_null($idea) == false && is_null($req) == true)
              <h1 class= "text-center text-danger"> You already posted an idea</h1>
          @elseif(is_null($req) == false)
              <h1 class= "text-center text-danger"> You have assigned for a project</h1>
          @else

            <h1 class= "text-center"> Submit your  project idea</h1>

            <hr>

              <form method="POST" action="/idea-save">
                  
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

                  

                  <button class = "btn btn-success mt-3 btn-block" type="submit" >Post project idea</button>

            </form>

          @endif
              

       </div> <!-- col -->

      </div> {{-- row--}}


@endsection
  
