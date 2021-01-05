@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    {{-- <h1>This is the action owner actionpage!</h1> --}}

    {{-- //<p class="list-group">{{$action}}</p> --}}

    @php
        // var_dump($action);
        $schemes = Schema::getColumnListing('actie');
     
        $i = 1;

       // $indexesFound = $schemes->listTableIndexes('voortgang')

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
        
      <ul class="row list-unstyled pr-5 pt-5">

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Datum Ontstaan
                <p>{{$action[0]->datum_ontstaan}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Audit Oordeel IA
                <p>{{$action[0]->audit_oordeel_ia}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Process
                <p> {{$action[0]->proces}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Omschrijving
                <p> {{$action[0]->omschrijving}}</p>
            </p>

        </li>

        <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
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
            
            <p class="text-info font-weight-bold">
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
            
            <p class="text-info font-weight-bold">
                Aanbeveling Internal Audit
                <p>{{$action[0]->aanbeveling_internal_audit}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Datum Deadline
                <p>{{$action[0]->datum_deadline}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Voortgang
                <p>{{$action[0]->voortgang}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Bron Detail
                <p>{{$action[0]->bron_detail}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
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
            
            <p class="text-info font-weight-bold">
                Nummer Bevindingen
                <p>{{$action[0]->nr_bevindingen}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Situatie
                <p> {{$action[0]->situatie}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Risico Beschrijving
                <p>{{$action[0]->risico_beschrijving}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Oorzaak
                <p>{{$action[0]->oorzaak}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Management Actie Plan
                <p>{{$action[0]->management_actie_plan}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Deadline Bijgesteld
                <p>{{$action[0]->deadline_bijgesteld}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Probleem Eigenaar
                <p>{{$action[0]->name}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Actie Eigenaar
                <p>{{$actionOwner[0]->name}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Status
                <p>{{$action[0]->status_id}}</p>
            </p>

         </li>

         <li class="bd-highlight border col-5 ml-5">
            
            <p class="text-info font-weight-bold">
                Aantekening IA
                <p>{{$action[0]->aantekening_ia}}</p>
            </p>

         </li>

       


        

            <li class="bd-highlight border col-5 ml-5">

                    <form action="{{url('progress_action')}}" method="POST">
                        <input type="hidden" value="{{$action[0]->id}}" name="action_id">
                            @csrf
                            <div class="pt-2 ">   
                                <span class="help-block border border-info rounded">Omschrijf hieronder uw huidige voortgang.</span>
                            </div>
                
                                <br></br>
                                <div class="form">
                                    <textarea cols="40" rows="5" name="progress_action"></textarea> {{-- Text area om te verzenden!--}}
                                </div>
                                <input type="submit">
                        </form>
       
             
            </li>
 
    </ul>
  
    {{-- <div class="form">
        <textarea class="container ml-4" style="height: 200px; width: 690px;"> </textarea>
    
        <button class="btn btn-primary">

        </button>
    </div> --}}
    <form action="{{url('finish_action')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$action[0]->id}}" name="action_id">
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