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
                                    <h4 class="card-title">Timesheet List</h4>

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
                                                    <th>Position</th>
                                                    <th>Site</th>
                                                    <th>total Absence</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <img src="../assets/images/faces/employee.png"
                                                            alt="{{ $attendance->profile }}" />
                                                        </img>
                                                    </td>
                                                    <td>{{ $attendance->name }}</td>
                                                    <td>{{ $attendance->employee->position }}</td>
                                                    <td>{{ $attendance->employee->sites }}</td>
                                                    <td>{{ $attendance->attendance->count() }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('attendance.list_timesheet', $attendance->id) }}"><i
                                                                class="mdi mdi-eye-off mdi-24px"
                                                                style="color:#00008B;"></i></a>
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