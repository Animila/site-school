@extends('layouts.documents')
@section('document_content')
    <td>{{$doc->name}}</td>
    <td>{{$doc->date}}</td>
    <td>{{$doc->type["name"]}}</td>
@endsection
