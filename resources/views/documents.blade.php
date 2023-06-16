<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
    <tr>Наименование</tr>
    <tr>Дата</tr>
    <tr>Тип файла</tr>
    </thead>
    <tbody>
    @foreach($doc_list as $item)
        <tr><td>{{$item->name}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->type["name"]}}</td></tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
