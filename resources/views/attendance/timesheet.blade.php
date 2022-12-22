<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheet</title>

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
    <center><img src="{{ public_path('assets/images/kop surat.png') }}" alt="" style="width: 800px; height: 150px;"
            align="top">
    </center>
    <font face="Arial">
        <h3 align="center">TIME SHEET</h4>
    </font>
    <table width="100%" class="table2">
        <tr class="noBorder">
            <td width="15%">Name</td>
            <td width="47%">: {{ $employee->user->name }}</td>
            <td width="50%"><small>Note :</small></td>
            <td></td>
        </tr>
        <tr>
            <td width="15%">No. ID</td>
            <td width="47%">: {{ $employee->user->employee->id_card}}</td>
            <td width="50%"><small>Kelebihan kerja (over time) wajib di paraf oleh
                </small></td>
            <td></td>
        </tr>
        <tr>
            <td width="15%">Post</ td>
            <td width="47%">:</td>
            <td width="50%">pimpinan project serta dituliskan dalam</td>
            <td></td>
        </tr>
        <tr>
            <td width="15%">Month-Year</td>
            <td width="47%">:</td>
            <td width="50%">pelaksanaan lembur / personil yang digantikan</td>
            <td></td>
        </tr>
        </tr>
    </table>
    <br>
    <table style="width:100%" class="table1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Date</th>
                <th rowspan="2">Start</th>
                <th rowspan="2">Finish</th>
                <th rowspan="2">Total</th>
                <th colspan="2">Over time</th>
                <th rowspan="2" width="40%">Remarks</th>
            </tr>
            <tr>
                <th>Total</th>
                <th>Paraf</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $i = 0;
            $total = 0; ?>
            @foreach ($attendance as $timesheet)
            @php
            $total += $timesheet->jumlah_ot;
            $date_in = new DateTime($timesheet->date_in);
            $date_out = new DateTime($timesheet->date_out);
            $diff = $date_in->diff($date_out);
            @endphp
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ date('d F Y', strtotime($timesheet->date_in)) }}</td>
                <td>{{ date('h:i:s', strtotime($timesheet->date_in)) }}</td>
                <td>{{ date('h:i:s', strtotime($timesheet->date_out)) }}</td>
                <td>{{ $diff->format('%h') }} jam</td>
                <td>{{ $timesheet->jumlah_ot }} jam</td>
                <td></td>
                <td>{{ $timesheet->ket }}</td>
            </tr>
            @endforeach
        </tbody>
        <tr>
            <th colspan="8"></th>
        </tr>
        <tr>
            <td colspan="8" align="left"><small>Note from supervisor</small> <br>
            </td>
        </tr>
        <tr>
            <td colspan="3"><small>Confirm by client</small></td>
            <td colspan="4" rowspan="2"><small>Name USER :</small><br><small>Date :</small><br><small>Signature</small>
            </td>
            <td colspan><small>Approved by</small></td>
        </tr>
        <tr>
            <td colspan="3">Name</td>
            <td colspan>Name</td>
        </tr>
    </table>
</body>

</html>