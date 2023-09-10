@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Типы документов</h1>

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
                    <td>Действие</td>
                </tr>
                @foreach($types as $item)
                    <tr class="table-body">
                        <td>{{$item->name}}</td>
                        <td class="table-body-tool">
                            <button href="#" class="btn btn_warning"  onclick="changeActiveEdit({{$item}})">
                                <img src="{{asset('images/edit.svg')}}" width="20" alt="">
                            </button>
                            <form action="{{ route('types.delete', $item->id) }}" method="POST">
                                @method('delete')
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button href="#" class="btn btn_warning">
                                    <img src="{{asset('images/delete.svg')}}" width="20" alt="">
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>

    </script>

    @include('.modals.types.create')
    @include('.modals.types.edit')
@endsection
