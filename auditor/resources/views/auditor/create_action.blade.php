@extends('layouts.master')


@section('title')
    Maak een actie aan
@endsection

@section('content')
    
<div class="create_action" id="post">
    <form action="{{ route('auditor.create_action') }}" method="POST">
      @csrf
        <div class="form-group">
          <label for="datum_ontstaan">Datum ontstaan actie</label>
          <input type="date" class="form-control" name="datum_ontstaan">
        </div>
        <div class="form-group">
          <label for="bron_detail">Bron detail</label>
          <input type="text" class="form-control" name="bron_detail">
        </div>
        <div class="form-group">
          <label for="audit_ordeel_ia">Audit Ordeel</label>
          <input type="text" class="form-control" name="audit_oordeel_ia">
        </div>
        <div class="form-group">
          <label for="process">Process</label>
          <input type="text" class="form-control" name="proces">
        </div>
        <div class="form-group">
          <label for="nummer_bevinding">Nummer bevinding</label>
          <input type="text" class="form-control" name="nr_bevindingen">
        </div>
        <div class="form-group">
          <label for="omschrijving_bevinding">Omschrijving bevinding</label>
          <input type="text" class="form-control" name="omschrijving">
        </div>
        <div class="form-group">
          <label for="situatie">Situatie</label>
          <input type="text" class="form-control" name="situatie">
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
          <label for="aanbeveling_internal_audit">Aanbeveling IA</label>
          <input type="text" class="form-control" name="aanbeveling_internal_audit">
        </div>
        <div class="form-group">
          <label for="map">MAP</label>
          <input type="text" class="form-control" name="management_actie_plan">
        </div>
        <div class="form-group">
          <label for="datum_deadline">Datum deadline</label>
          <input type="date" class="form-control" name="datum_deadline">
        </div>
        <div class="form-group">
          <label for="deadline_bijgesteld">Deadline bijgesteld</label>
          <input type="date" class="form-control" name="deadline_bijgesteld">
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
          <input type="text" class="form-control" name="aantekening_ia">
        </div>
        <div class="form-group">
          <label for="oordeel_ia">Oordeel IA</label>
          <input type="text" class="form-control" name="oordeel_ia">
        </div>
        <div class="form-group">
          <label for="sector">Selecteer sector</label>
          <select class="form-control" name="sector_id">
            @foreach ($sectors as $sector)  
            <option value="{{$sector->id}}">

              {{$sector->sector}}
            </option>
            @endforeach
          </select> 
        </div>
        <div class="form-group">
          <label for="risicosoort_id">Selecteer risicosoort</label>
          <select class="form-control" name="risicosoort_id">
            @foreach ($risicosoorten as $risicosoort)  
            <option value="{{$risicosoort->id}}">
              {{$risicosoort->primair}}
            </option>
            @endforeach
          </select>
        </div>          
        <div class="form-group">
          <label for="risico_beschrijving">Risicosoort beschrijving</label>
          <input type="text" class="form-control" name="risico_beschrijving">
        </div>
            <div class="form-group">
              <label for="risicoclassificatie_id">Selecteer risicoclassificatie</label>
              <select class="form-control" name="risicoclassificatie_id">
                @foreach ($risicoclassificaties as $risicoclassificatie)  
                <option value="{{$risicoclassificatie->id}}">
                  {{ $risicoclassificatie->actuele_risicoclassificatie_ia}}
                </option>
                @endforeach
              </select>
            </div>          
        <div class="form-group">
        <div class="d-flex justify-content-between align-items-center">
          <input class="form-control" type="text" placeholder="gebruiker" name="gebruiker">
        </div>
        <div class="form-group">
          <label for="status_id">Selecteer status</label>
          <select class="form-control" name="status_id">
            @foreach ($statussen as $status)  
            <option value="{{$status->id}}">
              {{ $status->status}}
            </option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submitBtn" value="submitPost"><strong>Maak actie aan</strong></button>
      </form>
             
      @endsection  