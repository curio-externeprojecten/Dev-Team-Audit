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
    <form action="{{route('AU_receivedAction')}}" method="POST">
        @csrf

        <div>
            <h2 class="m-0 mt-3 p-0"><b>Acties</b></h2>
            <ul class="--list">
                @foreach ($actions as $action)
                    <label for="action{{ $action->id }}_checkbox" onclick="checkMyCheckbox()">
                        <li class="d-flex mb-2">
                        <input type="checkbox" name="action_checkbox" class="action_checkbox mt-4" value="{{ $action->id }}" id="action{{ $action->id }}_checkbox">
                            <div class="p-3 w-100">
                                <div class="d-flex p-2 action-bg justify-content-between">
                                    <div><strong>{{ ucwords($action->bron_detail) }}</strong></div>
                                    @if (!empty($action->PE_status) && empty($action->AE_status))
                                        <div><span class="badge badge-danger">{{ $action->PE_status }}</span></div>
                                    @endif
                                    @if (empty($action->PE_status) && !empty($action->AE_status))
                                        <div><span class="badge badge-danger">{{ $action->AE_status }}</span></div>
                                    @endif
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
                    </label>
                @endforeach
            </ul>
        </div>
        
        <div>
            <div class="form-group mt-3">
                <h3><b>Opmerking</b></h3>
                <textarea class="w-100 --textarea-opmerking form-control" name="opmerking_action" id="opmerking_action" cols="30" rows="10" required></textarea>
            </div>
        </div>

        <div>
            <div class="form-group mt-3">
                <h3><b>Oordeel</b></h3>
                <textarea class="w-100 --textarea-opmerking form-control" name="oordeel_action" id="oordeel_action" cols="30" rows="5" required></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-around">
            <input type="submit" name="btnCorrect" class="btn btn-primary m-2 w-50" value="Goedkeuren en afronden">
            <input type="submit" name="btnFailed" class="btn btn-primary m-2 w-50" value="Terugsturen naar probleem-eigenaar">
        </div>
    </form>
</div>

<script type="text/javascript">
// function to check that only 1 box is checked
   function checkMyCheckbox(){
    $('input[type="checkbox"]').on('change', function() {
        $('input[type="checkbox"]').not(this).prop('checked', false);
    });
   }
</script>
@endsection