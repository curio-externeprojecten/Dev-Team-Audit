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

       // $indexesFound = $schemes->listTableIndexes('voortgang')

    @endphp

      <ul class="row list-unstyled pr-5 pt-5">

     @foreach ($action[0] as $item)
           
            <li class="bd-highlight border col-5 ml-5">
                
                <p class="text-info font-weight-bold">
                    {{$schemes[$i]}}
                </p>
                
                {{$item}}
      
                
                
             
                @if ($schemes[$i] == 'voortgang') {{-- Check of we bij de kolom voortgang zijn! --}}
                
                <form action="{{url('progress_action')}}" method="POST">
                    <input type="hidden" value="{{$action[0]->id}}" name="action_id">
                        @csrf
                        <div class="pt-2 ">   
                            <span class="help-block border border-info rounded">Omschrijf hieronder uw huidige voortgang.</span>
                        </div>
            
                            <br></br>
                            <div class="form">
                                <textarea cols="40" rows="5" name="progress_action"></textarea> {{-- Text area om te verzenden!--}}
                            </div>
                            <input type="submit">
                    </form>
              
                @endif
             
              
            </li>
        @php
            $i++
        @endphp
    @endforeach 

 
    </ul>
  
    {{-- <div class="form">
        <textarea class="container ml-4" style="height: 200px; width: 690px;"> </textarea>
    
        <button class="btn btn-primary">

        </button>
    </div> --}}
    <form action="/received/action" method="POST">
        @csrf
        <div>
            <div class="form-group mt-3">
                <h3><b>Opmerking</b></h3>
                <textarea class="w-100 --textarea-opmerking form-control" name="opmerking_action" id="opmerking_action" cols="30" rows="10" required></textarea>
            </div>
        </div>
    
        <div class="d-flex justify-content-around">
            <input type="submit" name="btnCorrect" class="btn btn-primary m-2 w-50" value="Doorsturen">
            <input type="submit" name="btnFailed" class="btn btn-primary m-2 w-50" value="Terugsturen">
        </div>
    </form>

   

    
@endsection