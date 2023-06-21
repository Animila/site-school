@extends('layouts.main_page')
@section('content')
    <table>
        <tr><td>Наименование</td><td>Дата</td><td>Тип файла</td><td>Дейтсвие</td></tr>
        <td>{{$doc->name}}</td>
        <td>{{$doc->date}}</td>
        <td>{{$doc->type["name"]}}</td>
    </table>
@endsection
