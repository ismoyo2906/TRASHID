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
    </style>
</head>
<body>
            
     <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height:1.6; font-wight:bold">
                  BANK SAMPAH MELATI BERSIH INDONESIA<br>
                    Tangerang selatan pamulang no 12
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
                <th>Tanggal</th>
            </tr>
            @foreach ($cetakPertanggal as $key => $c)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{Auth::user()->name}}</td>
                    <td>Rp. {{ number_format($c->amount_pull)}}</td>
                    <td>{{$c->date_pull->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
     </div>

</body>
</html>