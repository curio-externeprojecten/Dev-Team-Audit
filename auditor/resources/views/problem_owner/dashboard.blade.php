@extends('layouts.master')


@section('title')
    
@endsection

@section('header')
        <div class="d-flex align-items-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Homepagina</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Terug ontvangen acties</a>
            </li>
        </div>
@endsection

@section('content')
    <div class="action links">
        <a class="btn btn-primary" href="">Eigen acties</a>
        <a class="btn btn-primary" href="">Toegewezen acties</a>
    </div>

    <div class="actions">
        <ul>
            <li>
                {{-- {{ $actions = DB::table('actie')->select('bron_detail', 'omschrijving')->get() }} --}}

                {{ $actions = DB::table('actie')->pluck('bron_detail', 'omschrijving') }}

                @foreach ($actions as $bron_detail)
                    {{ $bron_detail }}
                @endforeach

                @foreach ($actions as $omschrijving)
                    {{ $omschrijving }}
                @endforeach
            </li>
        </ul>
    </div>
@endsection