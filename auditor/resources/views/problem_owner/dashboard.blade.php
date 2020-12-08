@extends('layouts.master')


@section('title')
    
@endsection

@section('header')
        <div class="d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="dashboard">Homepagina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="problem_owner_sended">Toegewezen acties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/received">Terug ontvangen acties</a>
            </li>
        </div>
@endsection

@section('content')
    <div class="actions">
        <h1>Eigen acties:</h1>

        <p>Select all: <input id="checkall" class="" type="checkbox"></p>
        
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actie-Eigenaren
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($action_owners as $action_owner)
                    <a class="dropdown-item" href="#"> {{ $action_owner->name }} </a>
                @endforeach
            </div>
          </div>
        
        @if (isset($actions))
            @foreach ($actions as $action)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        <a href="">{{ $action->omschrijving }}</a>
                    </label>
                </div>
            @endforeach
        @endif
        
    </div>
@endsection