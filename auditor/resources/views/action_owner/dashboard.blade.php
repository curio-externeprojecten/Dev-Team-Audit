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
    <h2 class="ml-3 m-0 mt-3 pl-4"><b>Acties</b></h2>

@endsection

@section('action_content')

    @if (isset($actions))

        <ul class="--list">
            @foreach ($actions as $action)
     
            <?php $id = $action->id?>
            
                <li class="d-flex mb-2"">

                    {{-- @if($action->actie_eigenaar_status == null || $action->actie_eigenaar_status == 'AE-teruggestuurd') --}}

                    <div class="p-3 w-100">
                        <div class="d-flex p-2 pl-4 action-bg justify-content-between">

                            <div><strong>{{ ucwords($action->bron_detail) }}</strong></div>

                        </div>

                        <div class="pt-2 pl-4" style="background:white;">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="m-0 p-0">Actie Omschrijving: {{ $action->omschrijving }}</p>
                                <span class="badge badge-primary mr-2">{{ $action->primair }}</span>
                            </div>                                    
                            <p class="m-0 p-0">Deadline: {{ $action->datum_deadline }}</p>
                            <a href='action?id={{$action->actie_id}}' class="btn btn-sm btn-primary mt-2 mb-2">Bekijk deze actie</a>
                        </div>
                        
                    </div>
                    
                

                    {{-- <div class="p-3 w-100">
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
                                <p class="m-0 p-0">Houder: {{ $action->name }}</p>
                                <span class="badge badge-primary mr-2">{{ $action->primair }}</span>
                            </div>                                    
                            <p class="m-0 p-0">Deadline: {{ $action->datum_deadline }}</p>
                            <a href="{{route('PE_receivedShowAction', $action->id)}}" class="btn btn-sm btn-primary mt-2 mb-2">Bekijk actie</a>
                        </div>
                    </div> --}}
                </li>
            
            
        
        @endforeach
            </ul>

    
  
    @endif
    
@endsection