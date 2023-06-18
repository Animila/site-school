@extends('layouts.main_page')
@section('content')

    <h1>Недавние операции</h1>

    <!-- Фильтры -->
    <div class="content-box filters">
        <div class="filter-box">
            <p>Наименование:</p>
            <input type="text" placeholder="Введите наименование" class="filter-input big">
        </div>

        <div class="filter-box">
            <p>Дата:</p>
            <input type="date" class="filter-input med">
        </div>

        <div class="filter-box">
            <p>Тип файла:</p>
            <select name="fileType" class="filter-input big">
                <option value="">Выберите тип файла</option>
                <option value="1">Документ</option>
                <option value="2">Мероприятие</option>
            </select>
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

    <!-- Содержимое -->
    <div class="db-header"><h2>Файлы</h2></div>
    <div class="content-box database">
        <table>
            <tr><td class="name-table">Наименование</td>
                <td class="date-table">Дата</td>
                <td class="type-table">Тип файла</td>
                <td class="action-table">Дейтсвие</td></tr>
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
