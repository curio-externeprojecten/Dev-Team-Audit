@extends('layouts.master')


@section('title')
    
@endsection

@section('content')
    <h1>action owner</h1>

@endsection

@section('action_content')
    @if (isset($actions))
            @foreach ($actions as $action)
            <?php $id = $action->id?>
            <ul>
                <li class="list-group rows-2">
                
                    <a href='action?id={{$id}}' class='list-group-item'>{{$action->omschrijving}}</a>


                </li>
            
            </ul>
        
        @endforeach
    @endif
    
@endsection