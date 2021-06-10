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
    style="text-align: center; font-weight: bold; font-size: 24px; background-color: #07294d; color: white; padding: 6px; width: 100%">
    Руйхати китобҳо</p>
<table width="100%" style="width:100%" border="0" class="zui-table">
    <tr >
        <th>ID</th>
        <th>Акс</th>
        <th>Ном</th>
        <th>Ҳолат</th>
    </tr>
    @foreach($books as $book)
        @php
            $status = 'Фаъол';
            if ($book->status == 1)
                $status = 'Ғайрифаъол'
        @endphp
        <tr id="sub-{{$book->id}}">
            <td>{{$book->id}}</td>
            <td><img style="width: 250px" src="{{public_path("storage/uploads/img/".$book->img_src)}}" alt=""></td>
            <td>{{$book->name}}</td>
            <td>{{$status}}</td>
        </tr>
    @endforeach

</table>
</body>
</body>
</html>
