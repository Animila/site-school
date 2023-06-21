@extends('layouts.main_page')
@section('content')
    <h1>Документы</h1>

    <div class="row">
        <div class="content-box">
            <h2>Действия</h2>
            <div class="row row-column" style="margin-top: 1vw;">
                <div class="btn btn-new"><a href="{{route('documents.createShow')}}">Создать</a></div>
            </div>
        </div>
        <!-- Фильтры -->
        <div class="content-box filters">
            <h2>Фильтры</h2>
            <div class="row row-column">
                <div class="filter-box">
                    <p>Наименование:</p>
                    <input type="text" placeholder="Введите наименование" class="filter-input big">
                </div>

                <div class="filter-box">
                    <p>Дата:</p>
                    <input type="date" class="filter-input med">
                </div>
                <div class="filter-box">
                    <p>Сортировать по:</p>
                    <select name="filterType" class="filter-input med">
                        <option value="">Выберите тип сортировки</option>
                        <option value="1">Наименование</option>
                        <option value="2">Дата</option>
                        <option value="3">Пользователь</option>
                    </select>
                </div>
            </div>



        </div>
    </div>

    <!-- Содержимое -->
    <div class="db-header"><h2>Файлы</h2></div>
    <div class="content-box database">
        <table>
            <tr><td class="name-table">Наименование</td>
                <td class="date-table">Дата</td>
                <td class="type-table">Тип файла</td>
                <td class="action-table">Дейтсвие</td></tr>
            @foreach($doc_list as $item)
                <tr><td>{{$item->name}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->type["name"]}}</td>
                    <td>
                        <a href="{{--{{ route('documents.put') }}--}}" class="edit-button"></a>
                        <a href="{{--{{ route('documents.delete') }}--}}" class="delete-button"></a>
                        <a href="{{--{{ route('documents.one') }}--}}" class="download-button"></a>
                    </td></tr>
            @endforeach
        </table>
        <div class="table-footer">
            <select name="add-button" class="create">
                <option value="">Добавить</option>
                <option value="1">Документ</option>
                <option value="2">Мероприятие</option>
            </select>
        </div>
    </div>
@endsection
