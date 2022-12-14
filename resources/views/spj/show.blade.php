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
                                    <h4 class="card-title">List Pengajuan SPJ</h4>

                                    @if (auth()->user()->role == 'driver')
                                    <div class="pull-right">
                                        <a href="{{ route('pengajuan_spj.create') }}"><i
                                                class="mdi mdi-account-multiple-plus mdi-24px"
                                                style="color:#00008B;"></i></a>
                                    </div>
                                    @endif

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
                                                    <th width="50px">No</th>
                                                    <th width="100px">Profile</th>
                                                    <th width="250px">Name</th>
                                                    <th width="100px">Start Date</th>
                                                    <th width="100px">End Date</th>
                                                    <th width="100px">Days Total</th>
                                                    <th width="100px">Project</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pengajuan_spj as $pengajuanspj)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <img src="../assets/images/faces/employee.png"
                                                            alt="{{ $pengajuanspj->profile }}" />
                                                        </img>
                                                    </td>
                                                    <td>{{ $pengajuanspj->user->name }}</td>
                                                    <td>{{ $pengajuanspj->start_date }}</td>
                                                    <td>{{ $pengajuanspj->end_date }}</td>
                                                    <td>{{ (strtotime($pengajuanspj->end_date) - strtotime( $pengajuanspj->start_date)) / 60 /60 /24 }}
                                                    </td>
                                                    <td>{{ $pengajuanspj->project }}</td>
                                                    <td align="center">
                                                        <a href="{{ route('pengajuan_spj.export',$pengajuanspj->id) }}"><i
                                                                class="mdi mdi-file-pdf mdi-24px"
                                                                style="color:#D42525;"></i></a>
                                                        @if (auth()->user()->role == 'user' &&
                                                        $pengajuanspj->validasi_user == 0)
                                                        <a
                                                            href="{{ route('pengajuan_spj.validation.user',$pengajuanspj->id) }}"><i
                                                                class="mdi mdi-checkbox-multiple-marked-circle mdi-24px"
                                                                style="color:#389E2C;"></i></a>
                                                        @endif

                                                        @if (auth()->user()->role == 'admin' &&
                                                        $pengajuanspj->validasi_admin == 0)
                                                        <a
                                                            href="{{ route('pengajuan_spj.validation.admin',$pengajuanspj->id) }}"><i
                                                                class="mdi mdi-checkbox-multiple-marked-circle mdi-24px"
                                                                style="color:#389E2C;"></i></a>
                                                        @endif
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
    <!-- End custom js f   or this page-->
</body>
@include('template.plugin')

</html>

<!-- {{ $pengajuan_spj->links() }} -->