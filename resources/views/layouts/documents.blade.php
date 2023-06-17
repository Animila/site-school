<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Навигаторы детства - Документы</title>
</head>
<body>

<div class="page">

    <!-- Шапка -->
    <div class="header">
        <div></div>
    </div>

    <!-- Контент -->
    <div class="content">
        <h1>Документы</h1>

        <!-- Фильтры -->
        <div class="filters">
            <div class="filter-box">
                <p>Наименование:</p>
                <input type="text" placeholder="Введите наименование" class="filter-input big">
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
                <p>Дата:</p>
                <input type="text" placeholder="__.__.____" class="filter-input med">
            </div>

            <div class="filter-box">
                <p>Сортировать по:</p>
                <input type="text" placeholder="Выберите тип сортировки" class="filter-input med">
            </div>

        </div>

        <table>
            <tr><td>Наименование</td><td>Дата</td><td>Тип файла</td><td>Дейтсвие</td></tr>
            @yield('document_content')
        </table>
    </div>

</div>

</body>
</html>
