<nav class="navbar navbar-light bg-light navbar-expand-md">
      <div class="container">
        <a class = "navbar-brand" href="#"> Automated Project Management system  </a>

        @if (Auth::check())
            <button class ="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#click"> <span class = "navbar-toggler-icon">  </span></button>


                <div class = "collapse navbar-collapse" id ="click">
                  <ul class = "navbar-nav mx-auto">
                    <li class = "navbar-item">
                      <a class = "nav-link" href="/">Home</a>
                    </li>
                    
                    @if (Auth::user()->role == 1)
                      <li class = "navbar-item active">
                        <a class = "nav-link" href="/projects"> Project ideas </a> {{-- all projects--}}
                      </li>
                      
                      <li class = "navbar-item active">
                        <a class = "nav-link" href="/projects/create"> Post Project Idea</a>
                      </li>
                    @elseif(Auth::user()->role == 2)
                      <li class = "navbar-item active">
                        <a class = "nav-link" href="/projects"> View all projects</a>
                      </li>
                      <li class = "navbar-item active">
                        <a class = "nav-link" href="/view-all-ideas"> My Posted Ideas</a>
                      </li>

                    @endif
                    <li class = "navbar-item">
                      <a class = "nav-link" href="/view-all-notifications"> Notifications</a>
                    </li>
                  </ul>
                </div> <!-- collpase div-->
            
              <ul class="navbar-nav mx-auto">
                <li class = "navabr-item dropdown">
                  
                  
                  <a class = "nav-link dropdown-toggle {{ Auth::user()->role == 2 ? '':'text-danger'}}" data-toggle="dropdown" href="#"> {{ Auth::user()->first_name." ".Auth::user()->last_name }} </a>
                  

                  <div class="dropdown-menu">
                    <a href="/profiles/{{Auth::user()->id}}" class="dropdown-item text-center"> Profile</a>
                    @if (Auth::user()->role == 1)
                      <a href="/view-all-ideas" class="dropdown-item  text-center">Student ideas </a>
                      <a href="/view-my-projects" class="dropdown-item  text-center">My Projects </a>
                      <a href="/view-my-assigned-projects" class="dropdown-item  text-center">Assigned Projects</a>
                      <a href="view-all-students" class= "dropdown-item  text-center"> All students </a>
                    @else
                      <a href ="/create-idea" class="dropdown-item  text-center"> Create Idea</a>
                      <a href="/view-my-applications" class="dropdown-item  text-center">Applied projects </a>
                      <a href="/view-my-interview-calls" class="dropdown-item  text-center">Interview calls </a>
                      <a href="/got-project" class="dropdown-item  text-center">Got project </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="btn btn-default btn-block text-center" type="submit" > Logout </button>
                    </form>
                  </div>
                </li>
              @else
                  <a  class= "btn btn-info" href="{{ route('login') }}"> Login </a>
              @endif

              </ul>
        </div> <!-- container -->
    </nav>
