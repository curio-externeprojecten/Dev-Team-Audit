@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    
<div class="create-Action" id="post">

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
                <input class="form-control" type="text" placeholder="oorzak" name="oorzak" required>
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
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="sector" name="sector" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="primair risico soort" name="p_risico" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="secondaire risico soort" name="s_risico" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="actuele risico soort classificatie IA" name="a_risico" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="oorzak classificatie" name="oorzak_classificatie" required>
              </div>
            <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="gerappoteerd risico" name="g_risico" required>
              </div>
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="gebruiker" name="gebruiker" required>
              </div>
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="status" name="status" required>
              </div>
              <div class="form-group">
              <div class="d-flex justify-content-between align-items-center">
                <input class="form-control" type="text" placeholder="sub status" name="s_status" required>
              </div>
              <input type="hidden" name="formType" value="createPost">
              <button type="submit" class="btn btn-lg btn-block" style="background:var(--bg-dropdown); color:var(--color-dropdown);" name="submitBtn" value="submitPost"><strong>Maak actie aan</strong></button>
@endsection