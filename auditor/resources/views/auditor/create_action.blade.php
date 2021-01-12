@extends('layouts.master')


@section('title')
    Maak een actie aan
@endsection

@section('content')
    
<div class="create_action" id="post">
    <form action="{{ route('auditor.create_action') }}" method="POST">
      @csrf
        <div class="form-group">
          <label for="creation_date">Datum ontstaan actie</label>
          <input type="date" class="form-control" name="create_date">
        </div>
        <div class="form-group">
          <label for="bron_detail">Bron detail</label>
          <input type="text" class="form-control" name="bron_detail">
        </div>
        <div class="form-group">
          <label for="audit_ordeel">Audit Ordeel</label>
          <input type="text" class="form-control" name="audit_oordel">
        </div>
        <div class="form-group">
          <label for="process">Process</label>
          <input type="text" class="form-control" name="process">
        </div>
        <div class="form-group">
          <label for="nummer_bevinding">Nummer bevinding</label>
          <input type="text" class="form-control" name="nummer_bevinding">
        </div>
        <div class="form-group">
          <label for="omschrijving_bevinding">Omschrijving bevinding</label>
          <input type="text" class="form-control" name="omschrijving_bevinding">
        </div>
        <div class="form-group">
          <label for="probleem">Probleem</label>
          <input type="text" class="form-control" name="probleem">
        </div>
        <div class="form-group">
          <label for="risico_beschrijving">Risico beschrijving</label>
          <input type="text" class="form-control" name="risico_beschrijving">
        </div>
        <div class="form-group">
          <label for="oorzaak">Oorzaak</label>
          <input type="text" class="form-control" name="oorzaak">
        </div>
        <div class="form-group">
          <label for="aanbeveling_ia">Aanbeveling IA</label>
          <input type="text" class="form-control" name="aanbeveling_ia">
        </div>
        <div class="form-group">
          <label for="map">MAP</label>
          <input type="text" class="form-control" name="map">
        </div>
        <div class="form-group">
          <label for="datum_deadline">Datum deadline</label>
          <input type="date" class="form-control" name="datum_deadline">
        </div>
        <div class="form-group">
          <label for="datum_bijgesteld">Datum bijgesteld</label>
          <input type="date" class="form-control" name="datum_bijgesteld">
        </div>
        <div class="form-group">
          <label for="datum_gesloten">Datum gesloten</label>
          <input type="date" class="form-control" name="datum_gesloten">
        </div>
        <div class="form-group">
          <label for="voortgang">Voortgang</label>
          <input type="text" class="form-control" name="voortgang">
        </div>
        <div class="form-group">
          <label for="aantekeningen_ia">Aantekeningen IA</label>
          <input type="text" class="form-control" name="aantekeningen_ia">
        </div>
        <div class="form-group">
          <label for="oordeel_ia">Oordeel IA</label>
          <input type="text" class="form-control" name="oordeel_ia">
        </div>
        <div class="form-group">
          <label for="sector">Selecteer sector</label>
          <select class="form-control" name="sector">
            @foreach ($sectors as $sector)  
            <option>
              {{$sector->sector}}
            </option>
            @endforeach
          </select> 
        </div>
        <div class="form-group">
          <label for="sector">Selecteer primair risicosoort</label>
          <select class="form-control" name="pr">
            @foreach ($risicosoorten as $risicosoort)  
            <option>
              {{$risicosoort->primair}}
            </option>
            @endforeach
          </select>
        </div>          
          
          <div class="form-group">
            <label for="sector">Selecteer secondaire risicosoort</label>
            <select class="form-control" name="sr">
              @foreach ($risicosoorten as $risicosoort)  
              <option>
                {{$risicosoort->secundair}}
              </option>
              @endforeach
            </select>
          </div>          
            
            <div class="form-group">
              <label for="sector">Selecteer actuale risicoclassificatie</label>
              <select class="form-control" name="arc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->actuele_risicoclassificatie_ia}}
                </option>
                @endforeach
              </select>
            </div>          
              
            <div class="form-group">
              <label for="sector">Selecteer oorzak risicoclassificatie</label>
              <select class="form-control" name="orc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->oorzaak_clasificatie}}
                </option>
                @endforeach
              </select>
            </div>          
             
            <div class="form-group">
              <label for="sector">Selecteer gerapporteerd risicoclassificatie</label>
              <select class="form-control" name="grc">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option>
                  {{ $risicoclassificatie->gerapporteerd_risico}}
                </option>
                @endforeach
              </select>
            
            </div>
        <div class="form-group">
        <div class="d-flex justify-content-between align-items-center">
          <input class="form-control" type="text" placeholder="gebruiker" name="gebruiker">
        </div>
        <div class="form-group">
          <label for="sector">Selecteer status</label>
          <select class="form-control" name="status">
            @foreach ($statussen as $status)  
            <option>
              {{ $status->status}}
            </option>
            @endforeach
          </select>
       
        </div>
        <div class="form-group">
          <label for="sector">Selecteer sub-status</label>
          <select class="form-control" name="sub_status">
            @foreach ($statussen as $status)  
            <option>
              {{ $status->substatus}}
            </option>
            @endforeach
          </select>
        
        </div>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="submitPost"><strong>Maak actie aan</strong></button>
      </form>
             
      @endsection  