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
                                    <h4 class="card-title"> List Employee</h4>
                                    <div class="pull-right">
                                        <a href="{{ route('employee.index') }}"><i
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
                                                    <th>NIK</th>
                                                    <th>Name</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Agama</th>
                                                    <th>Jabatan</th>
                                                    <th>Penempatan</th>
                                                    <th>Nomor Telpon</th>
                                                    <th>Email</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $employee)
                                                <tr style="text-align:center;">
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <img src="../assets/images/faces/employee.png"
                                                            alt="{{ $employee->profile}}" />
                                                        </img>
                                                    </td>
                                                    <td>{{ $employee->nik }}</td>
                                                    <td>{{ $employee->user->name }}</td>
                                                    <td>{{ $employee->born_city }}</td>
                                                    <td>{{ $employee->birthday }}</td>
                                                    <td>{{ $employee->gender }}</td>
                                                    <td>{{ $employee->address }}</td>
                                                    <td>{{ $employee->religion }}</td>
                                                    <td>{{ $employee->position }}</td>
                                                    <td>{{ $employee->sites }}</td>
                                                    <td>{{ $employee->phone_number }}</td>
                                                    <td>{{ $employee->email }}</td>
                                                    <td>
                                                        <form action="{{ route('employee.destroy',$employee->id) }}"
                                                            method="POST">

                                                            <a href=" {{ route('employee.edit',$employee->id) }}"><i
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