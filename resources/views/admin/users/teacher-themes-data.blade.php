<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style type="text/css">
        .zui-table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            /*font: normal 13px Arial, sans-serif;*/
        }
        .zui-table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }
        .zui-table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }
    </style>

    {{--    <link rel="stylesheet" href="http://127.0.0.1:8000/libs/bootstrap-4.5.3-dist/css/bootstrap.min.css">--}}
</head>
<body style="  font-family: 'DejaVu Sans', sans-serif; ">
<p
    style="text-align: center; font-weight: bold; font-size: 24px; background-color: #07294d; color: white; padding: 6px; width: 100%">Руйхати Истифодабарандагон</p>
<table width="100%" style="width:100%" border="0" class="zui-table">
    <tr >
        <th>Ном</th>
        <th>Эмайл</th>
        <th>Китоб</th>
        <th>План</th>
        <th>Дарс</th>
    </tr>
    @foreach($teachers as $teacher)
        @php
            $status = 'Фаъол';
            if ($teacher->status == 0)
                $status = 'Ғайрифаъол'
        @endphp
        <tr>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->email}}</td>
            <td>{{$teacher->books_count}}</td>
            <td>{{$teacher->plans_count}}</td>
            <td>{{$teacher->themes_count}}</td>
        </tr>
    @endforeach

</table>
</body>
</body>
</html>
