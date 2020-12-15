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
                <div class="m-2">
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
            
                <div>
                    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#successModalCenter">
                        Doorsturen
                    </button>
                </div>
            </div>

                <ul class="list-group">
                    @foreach ($actions as $action)
                        @if ($action->actie_eigenaar_id == null)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="m-2" type="checkbox" value="{{ $action->id }}" name="actions[]" class="problem_owner_checkbox" id="problem_owner_checkbox">
                                    <a href="">{{ $action->omschrijving }}</a>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
        </form>
    </div>

@endsection