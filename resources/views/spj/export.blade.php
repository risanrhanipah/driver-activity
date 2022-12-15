<!DOCTYPE html>
<html>

<head>
    <title>Pengajuan SPJ</title>

    <style>
    .table1,
    .table1 th,
    .table1 td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .table2,
    .table2 th,
    .table2 td {
        border: 1px solid black;
        border: none;
    }
    </style>
</head>

<body>
    <center><img src="{{ public_path('assets/images/kop surat.png') }}" alt="" style="width: 800px; height: 120px;"
            align="top">
    </center>
    <br>
    <font face="Arial">
        <h3 align="left">PERHITUNGAN BIAYA PERJALANAN DINAS</h4>
    </font>
    <table width="100%" class="table2">
        <tr class="noBorder">
            <td width="20%">Form No.</td>
            <td width="35%">:</td>
            <td width="20%">Request Date</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Form Plan</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>:</td>
        </tr>
        <tr>
            <td width="20%">NIK</td>
            <td width="35%">:</td>
            <td width="20%">Directorate</td>
            <td>:</td>
        </tr>
        <tr>
            <td width="20%">Employee Name</td>
            <td width="35%">:</td>
            <td width="20%">Division</td>
            <td>:</td>
        </tr>
        <tr>
            <td width="20%">Level/Position</td>
            <td width="35%">:</td>
            <td width="20%">Departement</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Project</td>
            <td>:</td>
        </tr>
    </table>
    <br>
    <table>
        <td><b>KEPERLUAN</b></td>
    </table>
    <table style="width:100%" class="table1">

        <thead>
            <tr>
                <th width="7%" style="text-align:center;">NO</th>
                <th width="43%" style="text-align:center;">DARI TGL s/d TGL</th>
                <th width="50%">KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan_spj as $pengajuanspj)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pengajuanspj->start_date}}</td>
                <td>Dari pangkal pinang menuju jdjdjdjhjahjfdhjhri ffjkjsajhj dhdhskjiuiei shdhdhs ydyika
                    uuudsjkjkahjweiuew usdjhahklflkjkjs idsiidsu</td>
            </tr>
            <tr>
                <td colspan="3"> Kembali masuk kerja :</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table>
        <td><b>CASH ADVANCE</b></td>
    </table>
    <table style="width:100%" class="table1">
        <thead>
            <tr>
                <th width="7%" rowspan="2" style="text-align:center;">NO</th>
                <th width="28%" rowspan="2">UNTUK KEPERLUAN</th>
                <th width="30%" colspan="3">CURRENCY</th>
                <th width="30%" colspan="2">TOTAL</th>
            </tr>
            <tr>
                <th>NAME</th>
                <th>VALUE</th>
                <th>EXCHANGE</th>
                <th>PLAN</th>
                <th>CLAIM</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th colspan="5" style="text-align: right;"> TOTAL</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="5" style="text-align: right;"> PLUS / MINUS</th>
                <th colspan="2"></th>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%" class="table2">
        <td width="75%">Jakarta</td>
    </table>
    <br><br>
    <table width="100%">
        <tr>
            <td width="47%">APPROVAL USER</td>
            <td width="40%">DRIVER</td>
            <td width="">VERIFIKASI</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>

</html>