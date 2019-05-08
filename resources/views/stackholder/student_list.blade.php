@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', '| All students')

@section('content')

     <div class = "row">
       <div class= "col-8 offset-2">

          <h2  class="text-center"> <span class="text-info">  {{ count($lists) }} </span> students are studying in DIU</h2>
          
          <br>

          <table class= "table">

            <thead>
              <th>  # </th>
              <th>  Name </th>
              <th> email </th>
              <th> Action </th>
            </thead>
            

            <tbody>

              @php
                $inc = 0
              @endphp
              
                @foreach($lists as $list)
                  @php
                     $inc = $inc + 1 
                  @endphp
                  <tr>  
                      <td> {{ $inc }} </td>
                      <td class= "lead">  {{ $list->first_name." " }} {{ $list->last_name }} </td>
                      <td > {{ $list->email }} <br>
                      <td> <a  href="/profiles/{{ $list->id }} " class= "btn btn-primary text-light">View Profile </a> </td>
                    
                      
                  </tr>
                @endforeach
              
            </tbody>

          </table>


        </div> <!-- class = col-8 -->

      </div> <!-- row -->

    

@endsection