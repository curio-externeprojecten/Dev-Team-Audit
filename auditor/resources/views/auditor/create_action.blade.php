@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    
<div class="create_action" id="post">
    <form action=<?php echo "../../../app/Http/Controllers/ActionController.php" ?> method="POST">
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="Datum Ontstaan" name="creation_date" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="Bron Detail" name="bron_detail" required>
            </div>  
            <div class="form-group">
                <div class="d-flex justify-content-between align-items-center">
                  <input class="form-control" type="text" placeholder="Audit Ordeel IA" name="audit_oordeel" required>
                </div>
            <div class="form-group">
                <div class="d-flex justify-content-between align-items-center">
                    <input class="form-control" type="text" placeholder="Process" name="process" required>
                </div>
            <div class="form-group">
                <div class="d-flex justify-content-between align-items-center">
                    <input class="form-control" type="text" placeholder="nummer bevinding" name="nr_bevinding" required>
                </div>    
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="Omschrijving bevinding" name="omschrijving_bevinding" required>
              </div>    
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="probleem" name="probleem" required>
              </div>
             <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="risico beschrijving" name="risico_beschrijving" required>
              </div> 
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="oorzaak" name="oorzaak" required>
              </div>
             <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="aanbeveling IA" name="aanbeveling_ia" required>
              </div> 
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="MAP" name="map" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="datum deadline" name="datum_deadline" required>
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between align-items-center">
                  <input class="form-control" type="text" placeholder="datum bijgesteld" name="datum_bijgesteld" required>
                </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="date gesloten" name="datum_gesloten" required>
              </div> 
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="voortgang" name="voortgang" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="aantekeningen IA" name="aantekeningen_ia" required>
              </div>  
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="oordel IA" name="oordeel_ia" required>
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