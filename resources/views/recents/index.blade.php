@extends('layouts.main_page')
@section('content')
    <h1 class="page-title">Последние события</h1>

    <div class="table-content">
        <div class="table-tools">
            <div class="table-tools__buttons">
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
                    <td>Дата</td>
                    <td>Пользователь</td>
                    <td>Действие</td>
                </tr>
                @foreach([] as $item)
                    <tr class="table-body">
                        <td>1</td>
                        <td>2023-01-19</td>
                        <td>user_1</td>
                        <td>Практика</td>


                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
