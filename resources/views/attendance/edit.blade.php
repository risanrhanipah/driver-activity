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
                                    <h4 class="card-title">Attendance Edit</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <a href="{{ route('attendance.index') }}"><i
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

                                    <form action="{{ route('attendance.update',$attendance->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" value="{{ $attendance->name }}"
                                                            class="form-control" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="date" value="{{ $attendance->date }}"
                                                            class="form-control" placeholder="Date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">In</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="in" value="{{ $attendance->in }}"
                                                            class="form-control" placeholder="In">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Out</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="out" value="{{ $attendance->out }}"
                                                            class="form-control" placeholder="Out">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Start</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="start" value="{{ $attendance->start }}"
                                                            class="form-control" placeholder="Start">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Finish</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="finish"
                                                            value="{{ $attendance->finish }}" class="form-control"
                                                            placeholder="Finish">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jumlah OT</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="jumlah_ot"
                                                            value="{{ $attendance->jumlah_ot }}" class="form-control"
                                                            placeholder="Jumlah OT">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Kolometer</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="km" value="{{ $attendance->km }}"
                                                            class="form-control" placeholder="Kilometer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Signature</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="signature"
                                                            value="{{ $attendance->signature }}" class="form-control"
                                                            placeholder="Signature">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Pemakaian</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="usage" value="{{ $attendance->usage }}"
                                                            class="form-control" placeholder="Pemakaian">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Progress</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="progress"
                                                            value="{{ $attendance->progress }}" class="form-control"
                                                            placeholder="Progress">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Keterangan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="ket" value="{{ $attendance->ket }}"
                                                            class="form-control" placeholder="Keterangan">
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
