@extends('layouts.master')


@section('header')
    <div class="d-flex align-items-center">
        <li class="nav-item">
            <a class="nav-link" href="dashboard">Homepagina</a>
        </li>
        
      
    </div>
@endsection

@section('title')
    
@endsection

@section('content')
    {{-- <h1>This is the action owner actionpage!</h1> --}}

    {{-- //<p class="list-group">{{$action}}</p> --}}

    @php
        // var_dump($action);
        $schemes = Schema::getColumnListing('actie');
        $i = 0;
    @endphp

      <ul class="row list-unstyled pr-5 pt-5">

     @foreach ($action[0] as $item)
           
            <li class="bd-highlight border col-5 ml-5">
                
                <p class="text-info font-weight-bold">
                    {{$schemes[$i]}}
                </p>
                
                {{$item}}
             
              
            </li>
        @php
            $i++
        @endphp
    @endforeach 
 
    </ul>
  

 

    
@endsection