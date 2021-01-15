@extends('layouts.master')


@section('title')
    Homepagina
@endsection

@section('header')
        <div class="d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="dashboard">Homepagina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/problem_owner_sended">Toegewezen acties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/received">Terug ontvangen acties</a>
            </li>
        </div>
@endsection

@section('content')
    <div class="actions container">
        <form action="{{ route('actions.change_owner') }}" method="post">
            @csrf
            <div class="modal fade" id="successModalCenter" tabindex="-1" role="dialog" aria-labelledby="successModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="successModalLongTitle">Weet u zeker dat u dit wilt doorsturen?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-footer d-flex flex-nowrap">
                        <button type="button" class="btn btn-primary m-2 w-50" data-dismiss="modal">Annuleren</button>
                        <input type="submit" name="btnCorrect" class="btn btn-primary m-2 w-50" value="Doorsturen">
                    </div>
                </div>
                </div>
            </div>

            <div class="d-flex m-2">
                <div class="m-2 mr-auto">
                    <h2>Eigen acties:</h2>
                </div>
            
                <div class="m-2">
                    <select class="form-control" name="actie_eigenaar_id">
                        @foreach ($action_owners as $action_owner)
                            <option value="{{ $action_owner->id }}" {{ ( $action_owner->id ) ? 'selected' : '' }}> 
                                Actie eigenaar: {{ $action_owner->name }} 
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="m-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#successModalCenter">
                        Actie doorsturen
                    </button>
                </div>
            </div>
            
                <ul class="list-group">
                    @foreach ($actions as $action)
                        @if ($action->actie_eigenaar_id == null && $action->probleemeigenaar_status != 'PE-afgerond' && $action->actie_eigenaar_status != 'AE-afgerond' && $action->au_status != "AU-afgerond")
                            <li class="list-group-item">
                                <div class="form-check">
                                    <?php $id = $action->id?>
                                    <blockquote class="blockquote text-left">
                                        <p class="mb-0"><b>{{ $action->bron_detail }}</b></p>
                                    <footer class="blockquote-footer">
                                        @if ($action->audit_oordeel_ia != null)
                                            <p>Auditor oordeel: <b>{{ $action->audit_oordeel_ia }}</b></p>
                                        @endif
                                        @if ($action->deadline_bijgesteld == null)
                                            <p>Datum deadline: <b>{{ $action->datum_deadline }}</b></p>
                                        @else
                                            <p>Datum deadline bijgesteld naar: <b>{{ $action->deadline_bijgesteld }}</b></p>
                                        @endif
                                            <p>Voortgang: <b>{{ $action->voortgang }}</b></p>
                                        @if ($action->opmerking_audit != null)
                                            <p>Opmerking Audit: <b>{{ $action->opmerking_audit }}</b></p>
                                        @endif
                                            <input class="m-2" type="checkbox" value="{{ $action->id }}" name="actions[]" class="problem_owner_checkbox" id="problem_owner_checkbox">
                                            <a href="action?id={{$id}}" class="btn btn-outline-secondary">{{ $action->omschrijving }}</a>
                                    </footer>
                                    </blockquote>
                                </div>
                            </li> 
                        @endif
                    @endforeach
                </ul>
        </form>
    </div>

@endsection