@extends('layouts.documents')
@section('document_content')
    @foreach($doc_list as $item)
        <tr><td>{{$item->name}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->type["name"]}}</td></tr>
    @endforeach
@endsection
