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

                                    <h4 class="card-title">Attendance List</h4>
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
                                                    <th>Name</th>
                                                    <th>Date (IN)</th>
                                                    <th>Date (OUT)</th>
                                                    <th>Kilometer (IN)</th>
                                                    <th>Kilometer (OUT)</th>
                                                    <th>Usage</th>
                                                    <th>Start OT</th>
                                                    <th>Finish OT</th>
                                                    <th>Amount OT</th>
                                                    <th>Description</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $attendance->user->name }}</td>
                                                    <td>{{ $attendance->date_in }}</td>
                                                    <td>{{ $attendance->date_out }}</td>
                                                    <td>{{ $attendance->km_in }}</td>
                                                    <td>{{ $attendance->km_out }}</td>
                                                    <td>{{ $attendance->usage }}</td>
                                                    <td>{{ $attendance->start_ot }}</td>
                                                    <td>{{ $attendance->finish_ot }}</td>
                                                    <td>{{ $attendance->jumlah_ot }}</td>
                                                    <td>{{ $attendance->ket }}</td>
                                                    <!-- @if (auth()->user()->role == 'admin')
                                                    <td><a href=" {{ route('attendance.edit', $attendance->id) }}"><i
                                                                class="mdi mdi-account-edit mdi-24px"
                                                                style="color:#F1C40F;"></i></a></td>
                                                    @endif -->
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