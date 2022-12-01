<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('template.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            @include('template.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <h4 class="card-title"> List Attendance </h4>
                                    <div class="pull-right">
                                        <a href="{{ route('attendance.index') }}"><i
                                                class="mdi mdi-arrow-left-bold-circle mdi-24px"
                                                style="color:#00008B; text-align:right;"></i></a>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                                    <br>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr style="text-align:center;">
                                                    <th>No</th>
                                                    <th>Profile</th>
                                                    <th>Name</th>
                                                    <th>Tanggal</th>
                                                    <th>In</th>
                                                    <th>Out</th>
                                                    <th>Start</th>
                                                    <th>Finish</th>
                                                    <th>Jumlah OT</th>
                                                    <th>Kilometer</th>
                                                    <th>Pemakaian</th>
                                                    <th>Progress</th>
                                                    <th>Keterangan</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                    <tr style="text-align:center;">
                                                        <td>{{ ++$i }}</td>
                                                        <td>
                                                            <img src="../assets/images/faces/employee.png"
                                                                alt="{{ $attendance->profile }}" />
                                                            </img>
                                                        </td>
                                                        <td>{{ $attendance->user->name }}</td>
                                                        <td>{{ $attendance->date }}</td>
                                                        <td>{{ $attendance->in }}</td>
                                                        <td>{{ $attendance->out }}</td>
                                                        <td>{{ $attendance->start }}</td>
                                                        <td>{{ $attendance->finish }}</td>
                                                        <td>{{ $attendance->jumlah_ot }}</td>
                                                        <td>{{ $attendance->km }}</td>
                                                        <td>{{ $attendance->usage }}</td>
                                                        <td>{{ $attendance->progress }}</td>
                                                        <td>{{ $attendance->ket }}</td>
                                                        <td>
                                                            <form
                                                                action="{{ route('attendance.destroy', $attendance->id) }}"
                                                                method="POST">

                                                                <a
                                                                    href=" {{ route('attendance.edit', $attendance->id) }}"><i
                                                                        class="mdi mdi-account-edit mdi-24px"
                                                                        style="color:#F1C40F;"></i></a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    style="border:0; background-color:transparent">
                                                                    <a class="mdi mdi-delete-empty mdi-24px"
                                                                        style="color:#D11010;"
                                                                        onclick="return confirm('Are you sure?')"></a>
                                                                </button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('template.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>
@include('template.plugin')

</html>

{!! $attendances->links() !!}
