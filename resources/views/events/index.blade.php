@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Все события</h1>

    <div class="table-content">
        <div class="table-tools">
            <div class="table-tools__buttons">
                <a class="btn btn_warning" onclick="changeActiveCreate()">Добавить</a>
            </div>
            <div class="table-search">
                <img src="{{asset('images/search.svg')}}" alt="поиск" >
                <input type="text" placeholder="Поиск по документам" id="searchInput">
            </div>
        </div>
        <div class="table-data">
            <table>
                <tr class="table-header">
                    <td>Наименование</td>
                    <td>Дата</td>
                    <td>Описание</td>
                    <td>Действие</td>
                </tr>
                @foreach($event_list as $item)
                    <tr class="table-body">
                        <td>{{$item->title}}</td>
                        <td>{{$item->datetime}}</td>
                        <td>{{$item->description}}</td>
                        <td class="table-body-tool">
                            <a href="#" class="btn btn_warning" onclick="changeActiveEdit({{$item}})">
                                <img src="{{asset('images/edit.svg')}}" width="20" alt="">
                            </a>
                            <a href="#" class="btn btn_warning">
                                <img src="{{asset('images/delete.svg')}}" width="20" alt="">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('.modals.events.create')
    @include('.modals.events.edit')


@endsection
