@extends('layouts.master')


@section('title')
    Dashboard
@endsection

@section('header')
<div class="d-flex align-items-center">
    <li class="nav-item">
        <a class="nav-link" href="dashboard">Homepagina</a>
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
    This is the Auditor Page!
@endsection