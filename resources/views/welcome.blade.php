@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'Latest uploaded projects from teachers')


@section('content')

  <div class="row">
    <div class="col-10 offset-2">
      

      <h2> <span class="text-success">  4  </span> project's are available for apply</h2>

      <hr>
      
      <!-- all projects-->
            {{-- project1 --}}

            

        <div class="row"> {{-- title--}}

          <div class="col-8">
            <h3> Latest Data Mining Projects Topics & Ideas</h3>
            <p>  Having work experience with PHP and Laravel is a plus.........</p> {{-- only 30 ta char --}}

            <p> <span class="font-weight-bold"> Created  By </span> <a href="" style="text-decoration:none"> geeks </a></p>
          </div>
          <div class="col-4"> {{-- buttons--}}
            <a href="" class="btn btn-primary text-light btn-block"> View </a>
                


          </div> {{-- col buttons--}}
          
        </div> <!-- row -->
        <div class="row"> {{-- title--}}

          <div class="col-8">
            <h3> OpenCV C++ Project for Face Detection </h3>
            <p>  This program uses the OpenCV library to detect faces in a live stream from webcam or in a video file stored in the local machine. This program detects faces in real time and tracks it. .</p> {{-- only 30 ta char --}}

            <p> <span class="font-weight-bold"> Created by  </span> <a href="" style="text-decoration:none"> geeks </a></p>
          </div>
          <div class="col-4"> {{-- buttons--}}
            <a href="" class="btn btn-primary text-light btn-block"> View </a>
                


          </div> {{-- col buttons--}}
          
        </div> <!-- row -->
        <div class="row"> {{-- title--}}

          <div class="col-8">
            <h3> Create port scanner in C</h3>
            <p>  Picture a bay where lots of private boats are docked. The location is called a seaport, literally a port at or on the sea. Everyone wanting to dock there, requesting landing services uses the same port. Seaports work with berth numbers assigned to individual boats.........</p> {{-- only 30 ta char --}}

            <p> <span class="font-weight-bold"> Requested By </span> <a href="" style="text-decoration:none"> samir </a></p>
          </div>
          <div class="col-4"> {{-- buttons--}}
            <a href="" class="btn btn-primary text-light btn-block"> View </a>
                


          </div> {{-- col buttons--}}
          
        </div> <!-- row -->
        <div class="row"> {{-- title--}}

          <div class="col-8">
            <h3> Student Data Management</h3>
            <p> Databases are being used in every aspect of our lives right now. Trillions of bytes of data are being stored in servers around the world. SQL is one of the most basic methods to use such a database. .........</p> {{-- only 30 ta char --}}

            <p> <span class="font-weight-bold"> Requested By </span> <a href="" style="text-decoration:none"> samir </a></p>
          </div>
          <div class="col-4"> {{-- buttons--}}
            <a href="" class="btn btn-primary text-light btn-block"> View </a>
                


          </div> {{-- col buttons--}}
          
        </div> <!-- row -->
        <hr>
        

      

    </div> {{-- col--}}
  </div> {{-- row --}}
  
@endsection


