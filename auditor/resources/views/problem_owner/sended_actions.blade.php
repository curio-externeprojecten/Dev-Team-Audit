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
        
                    @if ($action->actie_eigenaar_id != null && $action->probleemeigenaar_status != 'PE-afgerond' && $action->actie_eigenaar_status != 'AE-afgerond' && $action->au_status != "AU-afgerond")
                        <li class="list-group-item">
                            <div class="form-check">
                                <?php $id = $action->id?>
                                <blockquote class="blockquote text-left">
                                    <p class="mb-0"><b>{{ $action->bron_detail }}</b></p>
                                <footer class="blockquote-footer">
                                    <p>Actie toegewezen aan: <b>{{ $action->name }}</b></p>
                                    @if ($action->audit_oordeel_ia != null)
                                        <p>Auditor oordeel: <b>{{ $action->audit_oordeel_ia }}</b></p>
                                    @endif
                                    @if ($action->deadline_bijgesteld != null)
                                        <p>Datum deadline bijgesteld naar: <b>{{ $action->deadline_bijgesteld }}</b></p>
                                    @else
                                        <p>Datum deadline: <b>{{ $action->datum_deadline }}</b></p>
                                    @endif
                                        <p>Voortgang: <b>{{ $action->voortgang }}</b></p>
                                    @if ($action->opmerking_actie_eigenaar != null)
                                        <p>Opmerking Actie Eigenaar: <b>{{ $action->opmerking_actie_eigenaar }}</b></p>
                                    @endif
                                    @if ($action->opmerking_audit != null)
                                            <p>Opmerking Audit: <b>{{ $action->opmerking_audit }}</b></p>
                                    @endif
                                    <a href="action?id={{$id}}" class="btn btn-outline-secondary">{{ $action->omschrijving }}</a>
                                </footer>
                                </blockquote>
                            </div>
                        </li>
                    @endif 
                @endforeach
            </ul>
    </div>
@endsection