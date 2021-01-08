@extends('layouts.master')


@section('title')
    Actie Eigenaar Dashboard
@endsection

@section('header')
<div class="d-flex align-items-center">
    
        <a class="nav-link" href="dashboard">Homepagina</a>
    
</div>
@endsection



@section('content')
    <h1>action owner</h1>

@endsection

@section('action_content')
    @if (isset($actions))
            @foreach ($actions as $action)
            <?php $id = $action->id?>
            <ul>
                <li class="list-group rows-2">

                    {{-- @if($action->actie_eigenaar_status == null || $action->actie_eigenaar_status == 'AE-teruggestuurd') --}}

                    <a href='action?id={{$id}}' class='list-group-item'>{{$action->omschrijving}}</a>

                    

                </li>
            
            </ul>
        
        @endforeach
    @endif
    
@endsection