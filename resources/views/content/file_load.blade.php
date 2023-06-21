<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load</title>
</head>
<body>
<form action="{{ route('disk.post') }}" method="post" enctype="multipart/form-data">
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
</body>
</html>
