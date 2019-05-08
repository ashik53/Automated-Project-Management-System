@extends('main') {{-- extends the structure of the main.blade.php--}}

@section('title', 'All single requests for a project ')

@section('content')
     
            <h2 class="text-center"> <span class="text-success"> 5  </span> persons are called for interview for this  <a href =""> Project </a> </h2> <br>

            <table class= "table">

                  <thead>
                    <th>  # </th>
                    <th>  Name </th>
                    
                  </thead>
                  

                  <tbody>
     
                        <tr>  
                            <td> 1 </td>
                            <td class= "lead">  Shemul Mahmud </td>
                            <td > 17th </td>
                            <td > 
                               <a class="btn btn-success text-white"> View Profile</a> 
                               <a class="btn btn-info text-white"> Approve for this project </a>
                               <a class="btn btn-danger text-white"> Ignore</a>

                            </td>    
                        </tr>

                        <tr>  
                            <td> 1 </td>
                            <td class= "lead">  Slafee shahinur </td>
                            <td > 17th </td>
                            <td> 
                               <a class="btn btn-success text-white"> View Profile</a> 
                               <a class="btn btn-info text-white"> Approve for this project</a>
                               <a class="btn btn-danger text-white"> Ignore</a>
                            </td>    
                        </tr>
                        <tr>  
                            <td> 2 </td>
                            <td class= "lead">  John Doe </td>
                            <td > 17th </td>
                            <td> 
                               <a class="btn btn-success text-white"> View Profile</a> 
                               <a class="btn btn-info text-white"> Approve for this project</a>
                               <a class="btn btn-danger text-white"> Ignore</a>
                            </td>    
                        </tr>
                        <tr>  
                            <td> 3 </td>
                            <td class= "lead">  Raj karon </td>
                            <td > 17th </td>
                            <td> 
                               <a  class="btn btn-success text-white"> View Profile</a> 
                               <a class="btn btn-info text-white"> Approve for this project </a>
                               <a class= "btn btn-danger text-white">Ignore </a>
                            </td>    
                        </tr>
                        <tr>  
                            <td> 4 </td>
                            <td class= "lead">  Iqbal Mahmud </td>
                            <td > 17th </td>
                            <td> 
                               <a class="btn btn-success text-white"> View Profile</a> 
                               <a  class="btn btn-info text-white"> Approve for this project</a>
                               <a class= "btn btn-danger text-white">Ignore </a>
                            </td>    
                        </tr>
                          

                    
                  </tbody>

                </table>


@endsection