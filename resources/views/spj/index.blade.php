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
                                    <h4 class="card-title">Pengajuan SPJ</h4>
                                    <div class="pull-right">
                                        <a href="{{ route('pengajuan_spj.create') }}"><i
                                                class="mdi mdi-account-multiple-plus mdi-24px"
                                                style="color:#00008B;"></i></a>
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
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Draft SPJ</th>
                                                    <th>Keterangan</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pengajuan_spj as $pengajuanspj)
                                                <tr style="text-align:center;">
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <img src="../assets/images/faces/employee.png"
                                                            alt="{{ $pengajuanspj->profile}}" />
                                                        </img>
                                                    </td>
                                                    <td>{{ $pengajuanspj->name }}</td>
                                                    <td>{{ $pengajuanspj->date_pengajuan }}</td>
                                                    <td>{{ $pengajuanspj->spj }}</td>
                                                    <td>{{ $pengajuanspj->ket }}</td>
                                                    <td>
                                                        <form
                                                            action="{{ route('pengajuan_spj.destroy',$pengajuanspj->id) }}"
                                                            method="POST">

                                                            <a
                                                                href="{{ route('pengajuan_spj.show',$pengajuanspj->id) }}"><i
                                                                    class="mdi mdi-eye-off mdi-24px"
                                                                    style="color:#00008B;"></i></a>

                                                            <a
                                                                href=" {{ route('pengajuan_spj.edit',$pengajuanspj->id) }}"><i
                                                                    class="mdi mdi-account-edit mdi-24px"
                                                                    style="color:#F1C40F;"></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                style="border:0; background-color:transparent">
                                                                <a class="mdi mdi-delete-empty mdi-24px"
                                                                    style="color:#FF0000;"
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
    <!-- End custom js f   or this page-->
</body>
@include('template.plugin')

</html>

<!-- {{ $pengajuan_spj->links() }} -->
