@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Доумент</h1>

    <div>
        <span>{{$doc->name}}</span>
        <span>{{$doc->date}}</span>
        <span>{{$doc->type["name"]}}</span>
    </div>
@endsection
