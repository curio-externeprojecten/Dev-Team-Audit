@extends('layouts.master')


@section('title')
    
@endsection

@section('header')
<div class="d-flex align-items-center">
    
        <a class="nav-link" href="dashboard">Homepagina</a>
    
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
                <p>{{$actionOwner->name ?? 'geen eigenaar'}}</p>
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
                Huidige Opmerking Actie Eigenaar
                <p>{{$action->opmerking_actie_eigenaar}}</p>
            </p>

         </li>

        

            <li class="bd-highlight border col-5 ml-5">

            <div class="form-group d-flex justify-content-around">

                {{-- <form action="{{url('progress_action')}}" method="POST"> --}}
           <form action="{{route('progress.action', $action->id)}}" method="POST">
            @method('PUT')
                    {{-- <input type="hidden" value="{{$action->id}}" name="action_id"> --}}
                        @csrf
                        <div class="pt-2 ">   
                            <span class="help-block border border-info rounded">Voortgang.</span>
                        </div>
            
                            <br></br>
                            <div class="form">
                                <textarea cols="40" rows="5" name="progress_action"></textarea> {{-- Text area om te verzenden!--}}
                            </div>
                            <input type="submit" value="Verzend Voortgang">
                    </form>
   
                    <form action="{{route('comment.action', $action->id)}}" method="POST">
                        @method('PUT')
                            @csrf
                            <div class="pt-2 ">   
                                <span class="help-block border border-info rounded">Opmerking.</span>
                            </div>
                
                                <br></br>
                                <div class="form">
                                    <textarea cols="40" rows="5" name="comment_action"></textarea> 
                                </div>
                                <input type="submit" value="Verzend Opmerking">
                        </form>

            </div>
                    
           
            </li>
 
    </ul>
  
    {{-- <div class="form">
        <textarea class="container ml-4" style="height: 200px; width: 690px;"> </textarea>
    
        <button class="btn btn-primary">

        </button>
    </div> --}}
    <form action="{{url('finish_action')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$action->id}}" name="action_id">
        <div>
            {{-- <div class="form-group mt-3 ml-3 mr-3">
                <h3><b>Opmerking</b></h3>
                <textarea class="w-100 --textarea-opmerking form-control" name="opmerking_action" id="opmerking_action" cols="30" rows="10" required></textarea>
            </div> --}}
        </div>
    
        <div class="d-flex justify-content-around">
            
            <input type="submit" name="finish_action" class="btn btn-primary m-2 w-50" value="Afronden">
        </div>
    </form>

   

    
@endsection