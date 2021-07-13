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
            
     {{-- <img src="{{ asset('assets/img/bankmelati.png')}}" style="width: 60px; height:auto; position: absolute;" alt=""> --}}

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
                <th>No Transaksi</th>
                <th>No Rekening</th>
                <th>Nama perusahaan</th>
                <th>Nama Sampah</th>
                <th>jumlah Sampah</th>
                <th>Total Harga</th>
                <th>petugas</th>
                <th>Tanggal</th>
            </tr>
            @foreach ($cetakPertanggal as $key => $c)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$c->kd_transaction}}</td>
                    <td>{{$c->collector->no_rek}}</td>
                    <td>{{$c->collector->company_name}}</td>
                    <td>{{$c->trash->trash_name}}</td>
                    <td>{{$c->amount_sell}} {{ $c->trash->unit->unit_name }}</td>
                    <td>Rp. {{ ($c->total_price)}}</td>
                    <td>{{$c->admin->nameLevel }}</td>
                    <td>{{$c->date_sells->format('Y-m-d')}}</td>
                </tr>
            @endforeach
        </table>
     </div>
        
</body>
</html>