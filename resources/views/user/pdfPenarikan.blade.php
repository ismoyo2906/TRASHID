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
                   <b>DATA PENARIKAN SALDO</b>
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
                <th>Nama Nasabah</th>
                <th>Jumlah Penarikan</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            @foreach ($cetakPertanggal as $key => $c)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{Auth::user()->name}}</td>
                    <td>Rp. {{ number_format($c->amount_pull)}}</td>
                    <td>
                        @if ($c->pencairan == true)
                        <span class="btn btn-success btn-sm disabled mb-3">Selesai</span>
                        @elseif ($c->pencairan == false)
                            <span class="btn btn-danger btn-sm disabled">proses</span>
                        @endif
                    </td>
                    <td>{{$c->date_pull->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
     </div>

</body>
</html>