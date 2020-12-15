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
<div class="head">
    <h1 class=" d-flex justify-content-center">action owner</h1>
</div>


@endsection

@section('action_content')
    @if (isset($actions))
            @foreach ($actions as $action)
            <?php $id = $action->id?>
            <ul>
                <li class="list-group rows-2">
                
                    <a href='action?id={{$id}}' class='list-group-item'>{{$action->omschrijving}}</a>


                </li>
            
            </ul>
        
        @endforeach
    @endif
    
@endsection