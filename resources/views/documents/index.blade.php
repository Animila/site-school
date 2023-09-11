@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Все документы</h1>

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
                    <td>Тип файла</td>
                    <td>Действие</td>
                </tr>
                @foreach($doc_list as $item)
                    <tr class="table-body">
                        <td>{{$item->name}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->type["name"]}}</td>
                        <td class="table-body-tool">
                            <a href="#" class="btn btn_warning" onclick="changeActiveEdit({{$item}})">
                                <img src="{{asset('images/edit.svg')}}" width="20" alt="">
                            </a>


                            <form action="{{ route('documents.delete', $item->id) }}" method="POST">
                                @method('delete')
                                <button href="#" class="btn btn_warning">
                                    <img src="{{asset('images/delete.svg')}}" width="20" alt="">
                                </button>
                            </form>


                            <form action="{{route('documents.download')}}" method="POST">
                                <input type="hidden" name="pathname" value="{{$item->pathname}}">
                                <button class="btn btn_warning">
                                    <img src="{{asset('images/download.svg')}}" width="20" alt="">
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('modals.document.create')
    @include('modals.document.edit')
@endsection
