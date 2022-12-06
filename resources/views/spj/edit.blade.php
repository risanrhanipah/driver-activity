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
                                    <h4 class="card-title">SPJ Edit</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <a href="{{ route('pengajuan.spj') }}"><i
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

                                    <form action="{{ route('pengajuan_spj.update', $spj->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Start Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="start_date"
                                                            value="{{ $spj->start_date }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">End Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="end_date"
                                                            value="{{ $spj->end_date }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="description"
                                                            value="{{ $spj->description }}" class="form-control"
                                                            placeholder="Description">
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
