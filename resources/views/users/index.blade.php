@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Все пользователи</h1>

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
                    <td>Id</td>
                    <td>Имя</td>
                    <td>Почта</td>
                    <td>Инструменты</td>
                </tr>
                @foreach($users_list as $item)
                    <tr class="table-body">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
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
    @include('modals.users.create')
@endsection
