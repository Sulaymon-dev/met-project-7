<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body style="  font-family: 'DejaVu Sans', sans-serif; ">
<p class="text-center h4 alert alert-info font-weight-bold">Руйхати фанҳо</p>
<table width="100%" style="width:100%" border="0" class="table table-hover table-striped">
    <tr class="thead-dark">
        <th>ID</th>
        <th>Номи Фан</th>
        <th>Синф</th>
        <th>Намуди фан</th>
    </tr>
    @foreach($subjects as $subject)
        @switch($subject->type)
            @case('1')
            {{$type = 'Ҳатмӣ'}}
            @break
            @case('2')
            {{$type = 'Олимпиадавӣ'}}
            @break
            @case('3')
            {{$type = 'ММТ'}}
            @break
            @case('4')
            {{$type = 'Иловагӣ'}}
        @endswitch
        <tr id="sub-{{$subject->id}}">
            <td>{{$subject->id}}</td>
            <td>{{$subject->label}}</td>
            <td>{{$subject->class}}</td>
            <td>{{$type}}</td>
        </tr>
    @endforeach

</table>
</body>
</body>
</html>
