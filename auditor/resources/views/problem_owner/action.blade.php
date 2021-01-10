@extends('layouts.master')


@section('title')
    {{$action[0]->bron_detail}}
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
    @php
        $schemes = Schema::getColumnListing('actie');
        $i = 1;

        $names = [
            'Datum Ontstaan',
            'Audit Oordeel IA',
            'Process',
            'Omschrijving',
            'Risicosoort',
            'RisicoClassificatie',
            'Aanbeveling Internal Audit',
            'Datum Deadline',
            'Voortgang',
            'Bron Detail',
            'Sector',
            'Bevinding',
            'Situatie',
            'Risico Beschrijving',
            'Oorzaak',
            'Management Actie Plan',
            'Deadline Bijgesteld',
            'Probleem Eigenaar',
            'Status',
            'Aantekening IA',
        ];
    @endphp
    <h2 class="text-center mb-0">{{$action[0]->bron_detail}}</h2>

    <div>
        <a class="btn btn-primary m-4 mb-4" href="/received">Ga terug naar ontvangen acties</a>
    </div>

    <ul class="row list-unstyled pr-5">
        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Datum Ontstaan
                <p>{{$action[0]->datum_ontstaan}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Audit Oordeel IA
                <p>{{$action[0]->audit_oordeel_ia}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Process
                <p> {{$action[0]->proces}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Omschrijving
                <p> {{$action[0]->omschrijving}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Risicosoort

                <div class="d-flex">
                    <p class="text-danger">Primair: </p> <p class="pl-1"> {{$action[0]->primair}}</p>
                </div>

                <div class="d-flex">
                    <p class="text-danger">Secundair: </p> <p class="pl-1">{{$action[0]->secundair}}</p>
                </div>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                RisicoClassificatie

                <div class="d-flex">
                    <p class="text-danger">Actuele Risicoclassificatie ia: </p> <p class="pl-1"> {{$action[0]->actuele_risicoclassificatie_ia}}</p>
                </div>

                <div class="d-flex">
                    <p class="text-danger">Oorzaak Classificatie: </p> <p class="pl-1">{{$action[0]->oorzaak_clasificatie}}</p>
                </div>

                <div class="d-flex">
                    <p class="text-danger">Gerapporteerd Risico:</p> <p class="pl-1">{{$action[0]->gerapporteerd_risico}}</p>
                </div>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Aanbeveling Internal Audit
                <p>{{$action[0]->aanbeveling_internal_audit}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Datum Deadline
                <p>{{$action[0]->datum_deadline}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Voortgang
                <p>{{$action[0]->voortgang}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Bron Detail
                <p>{{$action[0]->bron_detail}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Sector

                <div class="d-flex">
                    <p class="text-danger">Sector </p> <p class="pl-1"> {{$action[0]->sector}}</p>
                </div>

                <div class="d-flex">
                    <p class="text-danger">Domein: </p> <p class="pl-1">{{$action[0]->domein}}</p>
                </div>

                <div class="d-flex">
                    <p class="text-danger">Keten:</p> <p class="pl-1">{{$action[0]->keten}}</p>
                </div>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Nummer Bevindingen
                <p>{{$action[0]->nr_bevindingen}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Situatie
                <p> {{$action[0]->situatie}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Risico Beschrijving
                <p>{{$action[0]->risico_beschrijving}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Oorzaak
                <p>{{$action[0]->oorzaak}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Management Actie Plan
                <p>{{$action[0]->management_actie_plan}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Deadline Bijgesteld
                <p>{{$action[0]->deadline_bijgesteld}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Probleem Eigenaar
                <p>{{$action[0]->name}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Actie Eigenaar
                <p>{{$actionOwner[0]->name}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Status
                <p>{{$action[0]->status}}</p>
            </p>
        </li>

        <li class="bd-highlight border col-5 ml-5">
            <p class="text-info font-weight-bold mb-2">
                Aantekening IA
                <p>{{$action[0]->aantekening_ia}}</p>
            </p>
        </li>
    </ul>    
@endsection