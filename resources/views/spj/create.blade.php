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
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <h4 class="card-title">SPJ Input</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <a href="{{ route('pengajuan_spj.show') }}"><i
                                                        class="mdi mdi-arrow-left-bold-circle mdi-24px"
                                                        style="color:#00008B; text-align:right;"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form class="form-sample" action="{{ route('pengajuan_spj.store') }}"
                                        method="POST">
                                        @csrf
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal Pengajuan</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="date_pengajuan" class="form-control"
                                                            placeholder="Date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Draft SPJ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="spj" class="form-control"
                                                            placeholder="Draft SPJ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Keterangan</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="ket" class="form-control" placeholder="Keterangan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" style="border:0; background-color:transparent"><i
                                                        class="mdi mdi-telegram mdi-36px"
                                                        style="color:#00008B;"></i></button><br>
                                            </div>
                                        </div>
                                    </form>
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
    @include('template.plugin')
    <!-- End custom js for this page-->
</body>

</html>
