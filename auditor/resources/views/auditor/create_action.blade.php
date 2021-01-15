@extends('layouts.master')


@section('title')
    Maak een actie aan
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
        <label for="audit_oordeel_ia"Audit oordeel>Audit oordeel</label>
        <select name="audit_oordeel_ia" class="form-control">
        <option value="voldoende">Voldoende</option>
        <option value="onvoldoende">Onvoldoende</option>
        <option value="slecht">Slecht</option>
        </select>
        </div>
        <div class="form-group">
          <label for="process">Process</label>
          <input type="text" class="form-control" name="proces">
        </div>
        <div class="form-group">
          <label for="nummer_bevinding">Nummer bevinding</label>
          <input type="number" class="form-control" name="nr_bevindingen">
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
          <label for="oorzaak">Oorzaak</label>
          <input type="text-area" class="form-control" name="oorzaak">
        </div>
        <div class="form-group">
          <label for="aanbeveling_internal_audit">Aanbeveling IA</label>
          <input type="text-area" class="form-control" name="aanbeveling_internal_audit">
        </div>
        <div class="form-group">
          <label for="map">MAP</label>
          <input type="text-area" class="form-control" name="management_actie_plan">
        </div>
        <div class="form-group">
          <label for="datum_deadline">Datum deadline</label>
          <input type="date" class="form-control" name="datum_deadline">
        </div>
        <div class="form-group">
          <label for="aantekeningen_ia">Aantekeningen IA</label>
          <input type="text" class="form-control" name="aantekening_ia">
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
          <input type="text-area" class="form-control" name="risico_beschrijving">
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
              <label for="probleem_eigenaar_id">Selecteer Probleem eigenaar</label>
              <select class="form-control" name="probleem_eigenaar_id">
                @foreach ($users as $user)  
                <option value="{{$user->id}}">
                  {{ $user->name}}
                </option>
                @endforeach 
              </select>
            </div>          
        
      
        <button type="submit" class="btn btn-lg btn-block" style="background:var(--bg-dropdown); color:var(--color-dropdown);" name="submitBtn" value="submitPost"><strong>Maak actie aan</strong></button>
      </form>
             
      @endsection  