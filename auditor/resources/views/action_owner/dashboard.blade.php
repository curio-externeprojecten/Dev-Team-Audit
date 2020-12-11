@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    <h1>action owner</h1>

@endsection

@section('action_content')
    @foreach ($actions as $action)
        
        <ul>
            <li>
                <a href=''>{{$action->omschrijving}}</a>
            </li>
           
        </ul>
      
    @endforeach
@endsection