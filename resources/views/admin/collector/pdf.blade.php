<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535
        }
        td{
            height: 50px;
            text-align: center;
        }
        .image{
            max-width: 150px;
            float: left;
            margin-top: -20px;
        }
        .text{
            float: left;
            margin-left: 70px;
        }
    </style>
</head>
<body>

     <table style="width: 100%;">
        <tr>
            <td align="center">
                <img class="image" src="{{ public_path('Cprofile/img/logo5.png')}}" alt="">
                <span style="line-height:1.6; font-wight:bold" class="text">
                  BANK SAMPAH TRASH INDONESIA<br>
                   <b>DATA PENGEPUL</b>
                </span>
            </td>
        </tr>
     </table>
     <hr>
     <br>
     <div class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width:95%;">
            <tr>
                <th>No</th>
                <th>Nomor Rekening</th>
                <th>Nama Pengepul</th>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
            @foreach ($cetakPertanggal as $key => $c)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$c->no_rek}}</td>
                    <td>{{$c->collector_name}}</td>
                    <td>{{$c->company_name	}}</td>
                    <td>{{$c->address}}</td>
                    <td>{{$c->phone}}</td>
                </tr>
            @endforeach
        </table>
     </div>
    
</body>
</html>