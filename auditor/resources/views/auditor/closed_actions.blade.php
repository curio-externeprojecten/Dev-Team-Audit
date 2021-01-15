@extends('layouts.master')


@section('title')
    
@endsection

@section('header')
<div class="d-flex align-items-center">
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">Homepagina</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/create_action">Maak actie aan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{route('AU_received')}}">Terug ontvangen acties</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/auditor/actions/closed">Afgeronde acties</a>
    </li>
</div>
@endsection


@section('content')
<div class="container">
        <div>
            <h2 class="m-0 mt-3 p-0"><b>Afgeronde Acties</b></h2>
            <ul class="--list">
                @foreach ($actions as $action)
                    <li class="d-flex mb-2">
                        <div class="p-3 w-100">
                            <div class="d-flex p-2 action-bg justify-content-between">
                                <div><strong>{{ ucwords($action->bron_detail) }}</strong></div>
                                <div><span class="badge badge-danger">Afgerond</span></div>
                            </div>

                            <div class="pt-2 pl-2" style="background:white;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="m-0 p-0">Houder: {{ $action->name ?? 'nog geen houder aangewezen' }}</p>
                                    <span class="badge badge-primary mr-2">{{ $action->primair }}</span>
                                </div>                                    
                                <p class="m-0 p-0">Deadline: {{ $action->datum_deadline }}</p>
                                <a href="{{route('AU_receivedShowAction', $action->id)}}" class="btn btn-sm btn-primary mt-2 mb-2">Bekijk actie</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
@endsection