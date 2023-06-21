@extends('layouts.main_page')
@section('content')
    <div class="content-box create-box">
        <form action="{{ route('documents.create') }}" method="post" enctype="multipart/form-data" class="row row-column">
            @csrf
            <input type="text" placeholder="Наименование" name="name">
            <input type="date" name="date">
            <input type="file" placeholder="Путь к файлу" name="pathname">
            <select name="typeid">
                <option value="1">Договор</option>
                <option value="2">Отчет</option>
            </select>

            <button>Загрузить</button>
        </form>
    </div>
@endsection
