@extends('layouts.main_page')

@section('css_link')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="content-box container">

        <form action="{{ route('auth.edit') }}" method="post">

            <fieldset class="profile-data-container">

                <legend>Данные пользователя</legend>

                <label>Имя</label>
                <input name="name" type="text" placeholder="Имя пользователя"><br>

                <label>Email</label>
                <input name="email" type="text" placeholder="Email пользователя"><br>

                <label>Пароль</label>
                <input name="password" type="password" placeholder="Пароль"><br>

            </fieldset>

            <fieldset>
                <button>Изменить</button>
            </fieldset>

        </form>

    </div>
@endsection
