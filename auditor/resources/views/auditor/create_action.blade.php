@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    
<div class="create_action" id="post">
    <form action=<?php echo "../../../app/Http/Controllers/ActionController.php" ?> method="POST">
      <form>
        @csrf
        <div class="form-group">
          <label for="creation_date">Datum ontstaan actie</label>
          <input type="date" class="form-control" id="create_action">
        </div>
        <div class="form-group">
          <label for="bron_detail">Bron detail</label>
          <input type="text" class="form-control" id="bron_detail">
        </div>
        <div class="form-group">
          <label for="audit_ordeel">Audit Ordeel</label>
          <input type="text" class="form-control" id="audit_oordel">
        </div>
        <div class="form-group">
          <label for="process">Process</label>
          <input type="text" class="form-control" id="process">
        </div>
        <div class="form-group">
          <label for="nummer_bevinding">Nummer bevinding</label>
          <input type="text" class="form-control" id="nummer_bevinding">
        </div>
        <div class="form-group">
          <label for="omschrijving_bevinding">Omschrijving bevinding</label>
          <input type="text" class="form-control" id="omschrijving_bevinding">
        </div>
        <div class="form-group">
          <label for="probleem">Probleem</label>
          <input type="text" class="form-control" id="probleem">
        </div>
        <div class="form-group">
          <label for="risico_beschrijving">Risico beschrijving</label>
          <input type="text" class="form-control" id="risico_beschrijving">
        </div>
        <div class="form-group">
          <label for="oorzaak">Oorzaak</label>
          <input type="text" class="form-control" id="oorzaak">
        </div>
        <div class="form-group">
          <label for="aanbeveling_ia">Aanbeveling IA</label>
          <input type="text" class="form-control" id="aanbeveling_ia">
        </div>
        <div class="form-group">
          <label for="map">MAP</label>
          <input type="text" class="form-control" id="map">
        </div>
        <div class="form-group">
          <label for="datum_deadline">Datum deadline</label>
          <input type="date" class="form-control" id="datum_deadline">
        </div>
        <div class="form-group">
          <label for="datum_bijgesteld">Datum bijgesteld</label>
          <input type="date" class="form-control" id="datum_bijgesteld">
        </div>
        <div class="form-group">
          <label for="datum_gesloten">Datum gesloten</label>
          <input type="date" class="form-control" id="datum_gesloten">
        </div>
        <div class="form-group">
          <label for="voortgang">Voortgang</label>
          <input type="text" class="form-control" id="voortgang">
        </div>
        <div class="form-group">
          <label for="aantekeningen_ia">Aantekeningen IA</label>
          <input type="text" class="form-control" id="aantekeningen_ia">
        </div>
        <div class="form-group">
          <label for="oordeel_ia">Oordeel IA</label>
          <input type="text" class="form-control" id="oordeel_ia">
        </div>
        <div class="form-group">
          <label for="sector">Selecteer sector</label>
          <select class="form-control" id="sector">
            @foreach ($sectors as $sector)  
            <option>
              {{$sector->sector}}
            </option>
            @endforeach
          </select>
        </div>          
          </div> 
        </div>
        <div class="form-group">
          <label for="sector">Selecteer primair risicosoort</label>
          <select class="form-control" id="pr">
            @foreach ($risicosoorten as $risicosoort)  
            <option>
              {{$risicosoort->primair}}
            </option>
            @endforeach
          </select>
        </div>          
          </div> 
          <div class="form-group">
            <label for="sector">Selecteer secondaire risicosoort</label>
            <select class="form-control" id="sr">
              @foreach ($risicosoorten as $risicosoort)  
              <option>
                {{$risicosoort->secundair}}
              </option>
              @endforeach
            </select>
          </div>          
            </div> 
            <div class="form-group">
              <label for="sector">Selecteer actuale risicoclassificatie</label>
              <select class="form-control" id="arc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->actuele_risicoclassificatie_ia}}
                </option>
                @endforeach
              </select>
            </div>          
              </div> 
            </div>
            <div class="form-group">
              <label for="sector">Selecteer actuale risicoclassificatie</label>
              <select class="form-control" id="arc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->oorzaak_clasificatie}}
                </option>
                @endforeach
              </select>
            </div>          
              </div> 
            </div>
            <div class="form-group">
              <label for="sector">Selecteer actuale risicoclassificatie</label>
              <select class="form-control" id="arc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->gerapporteerd_risico}}
                </option>
                @endforeach
              </select>
            </div>          
              </div> 
            </div>
        <div class="form-group">
        <div class="d-flex justify-content-between align-items-center">
          <input class="form-control" type="text" placeholder="gebruiker" name="gebruiker" required>
        </div>
        <div class="form-group">
          <label for="sector">Selecteer status</label>
          <select class="form-control" id="status">
            @foreach ($statussen as $status)  
            <option>
              {{ $status->status}}
            </option>
            @endforeach
          </select>
        </div>          
          </div> 
        </div>
        <div class="form-group">
          <label for="sector">Selecteer sub-status</label>
          <select class="form-control" id="sub_status">
            @foreach ($statussen as $status)  
            <option>
              {{ $status->substatus}}
            </option>
            @endforeach
          </select>
        </div>          
          </div> 
        </div>
            
              <input type="hidden" name="formType" value="createPost">
              <button type="submit" class="btn btn-lg btn-block" style="background:var(--bg-dropdown); color:var(--color-dropdown);" name="submitBtn" value="submitPost"><strong>Maak actie aan</strong></button>
@endsection