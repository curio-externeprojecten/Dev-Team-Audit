@extends('layouts.master')


@section('title')
    Ontvangen acties
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
         <a class="nav-link " href="received">Terug ontvangen acties</a>
      </li>
   </div>
@endsection

@section('content')
   <div class="container">
        <form action="/received/action" method="POST">
            @csrf
            <!-- Modals -->
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

            <div class="modal fade" id="failedModalCenter" tabindex="-1" role="dialog" aria-labelledby="failedModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="failedModalLongTitle">Weet u zeker dat u dit terug wilt sturen?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-footer d-flex d-flex flex-nowrap">
                        <button type="button" class="btn btn-primary m-2 w-50" data-dismiss="modal">Annuleren</button>
                        <input type="submit" name="btnFailed" class="btn btn-primary m-2 w-50" value="bevestigen">
                    </div>
                </div>
                </div>
            </div>

            <div>
                <h2 class="m-0 mt-3 p-0"><b>Acties</b></h2>
                <ul class="--list">
                    @foreach ($actions as $action)
                    <label for="action{{ $action->id }}_checkbox">
                        <li class="d-flex align-items-center mb-2">
                        <input class="mr-3" type="checkbox" name="action_checkbox" class="action_checkbox" value="{{ $action->id }}" id="action{{ $action->id }}_checkbox">
                            <div class="action-bg p-3 w-100">
                                {{ $action->bron_detail }} {{ $action->id }}
                            </div>
                        </li>
                    </label>
                    @endforeach
                </ul>
            </div>
            
            <div>
                <div class="form-group mt-3">
                    <h3><b>Opmerkingen</b></h3>
                    <textarea class="w-100 --textarea-opmerking form-control" name="opmerking_action" id="opmerking_action" cols="30" rows="10" required></textarea>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-around">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary m-2 w-50"  data-toggle="modal" data-target="#successModalCenter">
                Doorsturen
            </button>
            <button type="button" class="btn btn-primary m-2 w-50"  data-toggle="modal" data-target="#failedModalCenter">
                Terugsturen
            </button>
        </div>
   </div>
@endsection