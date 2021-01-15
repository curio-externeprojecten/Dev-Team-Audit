@extends('layouts.master')


@section('title')
    Problem Owner Received
@endsection

@section('header')
<div class="d-flex align-items-center">
    <li class="nav-item">
       <a class="nav-link" href="/dashboard">Homepagina</a>
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
      <ul class="row list-unstyled pr-5 pt-5">

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Datum Ontstaan
                <p>{{$action->datum_ontstaan}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Audit Oordeel IA
                <p>{{$action->audit_oordeel_ia}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Process
                <p> {{$action->proces}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Omschrijving
                <p> {{$action->omschrijving}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Risicosoort

                <div class="d-flex">
                    <p class="text-danger">Primair: </p> <p class="pl-1"> {{$action->primair}}</p>
                </div>

                <div class="d-flex">

                    <p class="text-danger">Secundair: </p> <p class="pl-1">{{$action->secundair}}</p>

                </div>
             
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                RisicoClassificatie

                <div class="d-flex">
                    <p class="text-danger">Actuele Risicoclassificatie ia: </p> <p class="pl-1"> {{$action->actuele_risicoclassificatie_ia}}</p>
                </div>

                <div class="d-flex">

                    <p class="text-danger">Oorzaak Classificatie: </p> <p class="pl-1">{{$action->oorzaak_clasificatie}}</p>

                </div>
                <div class="d-flex">
                    <p class="text-danger">Gerapporteerd Risico:</p> <p class="pl-1">{{$action->gerapporteerd_risico}}</p>
                </div>
            </p>

        </li>

          <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Aanbeveling Internal Audit
                <p>{{$action->aanbeveling_internal_audit}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Datum Deadline
                <p>{{$action->datum_deadline}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Voortgang
                <p>{{$action->voortgang}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Bron Detail
                <p>{{$action->bron_detail}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Sector

                <div class="d-flex">
                    <p class="text-danger">Sector </p> <p class="pl-1"> {{$action->sector}}</p>
                </div>

                <div class="d-flex">

                    <p class="text-danger">Domein: </p> <p class="pl-1">{{$action->domein}}</p>

                </div>
                <div class="d-flex">
                    <p class="text-danger">Keten:</p> <p class="pl-1">{{$action->keten}}</p>
                </div>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Nummer Bevindingen
                <p>{{$action->nr_bevindingen}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Situatie
                <p> {{$action->situatie}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Risico Beschrijving
                <p>{{$action->risico_beschrijving}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Oorzaak
                <p>{{$action->oorzaak}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Management Actie Plan
                <p>{{$action->management_actie_plan}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Deadline Bijgesteld
                <p>{{$action->deadline_bijgesteld}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Probleem Eigenaar
                <p>{{$action->name}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Actie Eigenaar
                @if (isset($actionOwner) && !empty($actionOwner->name))
                    <p>{{$actionOwner->name}}</p>
                @else
                    <p>Geen actie eigenaar gekozen</p>
                @endif
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Status
                <p>{{$action->status_id}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Aantekening IA
                <p>{{$action->aantekening_ia}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Huidige Voortgang
                <p>{{$action->voortgang}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Huidige Opmerking
                <p>{{$action->opmerking_actie_eigenaar}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Huidige Opmerking Probleem Eigenaar
                <p>{{$action->opmerking_probleem_eigenaar}}</p>
            </p>

         </li>

        
    </ul>  

@endsection