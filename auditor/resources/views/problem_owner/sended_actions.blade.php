@extends('layouts.master')


@section('title')
    Toegewezen acties
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
    <div class="actions container">
            <div class="m-2">
                <h2>Toegewezen acties:</h2>
            </div>

            <ul class="list-group">
                @foreach ($actions as $action)
                    @if ($action->actie_eigenaar_id != null)
                        <li class="list-group-item">
                            <div class="form-check">
                                <?php $id = $action->id?>
                                <p>Actie toegewezen aan: {{ $action->name }}</p>
                                <a href="action?id={{$id}}" class="btn btn-outline-secondary">{{ $action->omschrijving }}</a>
                            </div>
                        </li>
                    @endif 
                @endforeach
            </ul>
    </div>
@endsection