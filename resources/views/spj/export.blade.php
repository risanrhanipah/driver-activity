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
    <center><img src="{{ public_path('assets/images/kop surat.png') }}" alt="" style="width: 800px; height: 118px;"
            align="top">
    </center>
    <br>
    <font face="Arial">
        <h3 align="left">PERHITUNGAN BIAYA PERJALANAN DINAS</h4>
    </font>
    <table width="100%" class="table2">
        <tr class="noBorder">
            <td width="18%">Form No.</td>
            <td width="30%">: {{ $data->id }}</td>
            <td width="18%">Request Date</td>
            <td>: {{ date('d F', strtotime($data->start_date)) }} - {{ date('d F Y', strtotime($data->end_date)) }}
            </td>
        </tr>
        <tr>
            <td>Form Plan</td>
            <td>:</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>: {{ $data->ket }}</td>
        </tr>
        <tr>
            <td width="18%">NIK</td>
            <td width="30%">: {{ $data->user->employee->nik }}</td>
            <td width="18%">Directorate</td>
            <td>: Sales and Marketing</td>
        </tr>
        <tr>
            <td width="18%">Employee Name</td>
            <td width="30%">: {{ $data->user->name }}</td>
            <td width="18%">Division</td>
            <td>: Power Technical Management</td>
        </tr>
        <tr>
            <td width="18%">Level/Position</td>
            <td width="30%">: {{ $data->user->employee->position}}</td>
            <td width="18%">Departement</td>
            <td>: Technical Support and Care</td>
        </tr>
        <tr>
            <td>Project</td>
            <td>: {{ $data->project }}</td>
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
            <tr>
                <td align="center">1</td>
                <td align="center">{{ date('d F', strtotime($data->start_date)) }} -
                    {{ date('d F Y', strtotime($data->end_date)) }}
                </td>
                <td align="justify">{{ $data->description }}</td>
            </tr>
            <tr>
                <td colspan="3"> Kembali masuk kerja :</td>
            </tr>
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
            <?php $i = 0;
            $grand_total = 0; ?>
            @foreach ($data->detailspj as $detail)
            @php
            $grand_total += $detail->total;
            @endphp
            <tr align="center">
                <td>{{ ++$i }}</td>
                <td>{{ $detail->keperluan }}</td>
                <td>IDR</td>
                <td>Rp {{number_format($detail->nominal)}}</td>
                <td>{{ $detail->jumlah}} hari</td>
                <td></td>
                <td>Rp {{number_format($detail->total)}}</td>
            </tr>
            @endforeach
            <tr align="center">
                <td>{{ ++$i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td>{{ ++$i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr align="center">
                <td>{{ ++$i }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th colspan="5" style="text-align: right;"> TOTAL</th>
                <th>Rp {{ number_format($grand_total) }}</th>
                <th>Rp {{ number_format($grand_total) }}</th>
            </tr>
            <tr>
                <th colspan="5" style="text-align: right;"> PLUS / MINUS</th>
                <th colspan="2"></th>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%" class="table2">
        <td width="75%">Jakarta, {{ date('d F Y', strtotime($data->start_date)) }}</td>
    </table>
    <br><br>
    <table width="100%">
        <tr>
            <td width="44%">APPROVAL USER</td>
            <td width="40%">DRIVER</td>
            <td width="">VERIFIKASI</td>
        </tr>
        <tr>
            <td width="44%">
                @if ($data->validation_user != null)
                <img src="{{ public_path('assets/images/signature/'.$data->validation_user->signature) }}" alt=""
                    style="width: 150px; height: 120px;" align="top">

                <!-- <img src="{{ public_path('assets/images/signature/user.png') }}" alt=""
                    style="width: 150px; height: 120px;" align="top"> -->
                @endif
            </td>
            <td width="40%"><img src="{{ public_path('assets/images/signature/'.$data->user->signature) }}" alt=""
                    style="width: 150px; height: 120px;" align="top"></td>
            <td>
                @if ($data->validation_admin != null)
                <!-- <img src="{{ public_path('assets/images/signature/'.$data->validation_admin->signature) }}" alt=""
                    style="width: 150px; height: 120px;" align="top"> -->

                <img src="{{ public_path('assets/images/signature/ga.png') }}" alt=""
                    style="width: 150px; height: 120px;" align="top">
                @endif
            </td>
        </tr>
        <tr>
            <td width="44%">(..............................)</td>
            <td width="40%">{{ $data->user->name }}</td>
            <td>(..............................)</td>
        </tr>
    </table>
</body>

</html>