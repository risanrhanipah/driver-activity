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
                                                        <input type="date" name="end_date" value="{{ $spj->end_date }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea type="text" name="description" class="form-control"
                                                            placeholder="Description">{{ $spj->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Keperluan</label>
                                                    <div class="col-sm">
                                                        <div class="d-flex">
                                                            <div class="form-check d-flex-item form-check-primary">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="keperluan[]"
                                                                        class="form-check-input" value="Uang Makan" @if
                                                                        ($spj->kep_makan != '') checked @endif>
                                                                    Uang Makan
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-flex-item form-check-success">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="keperluan[]"
                                                                        class="form-check-input" value="Uang Saku" @if
                                                                        ($spj->kep_saku != '') checked @endif>
                                                                    Uang Saku
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-flex-item form-check-info">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="keperluan[]"
                                                                        class="form-check-input" value="Uang Penginapan"
                                                                        @if ($spj->kep_penginapan != '') checked @endif>
                                                                    Uang Penginapan
                                                                </label>
                                                            </div>
                                                            <div class="form-check d-flex-item form-check-danger">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="keperluan[]"
                                                                        class="form-check-input" value="Other" @if
                                                                        ($spj->other != '') checked @endif>
                                                                    Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-from-label">Project</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="project" class="form-control"
                                                            placeholder="Project" value="{{ $spj->project }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="nominal">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Keperluan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="keperluan_other"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nominal</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="nominal" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                            <button type="submit" style="border:0; background-color:transparent"><i
                                                    class="mdi mdi-telegram mdi-36px"
                                                    style="color:#00008B;"></i></button><br>
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
    <script>
    $(document).ready(function() {
        $('#nominal').hide();

        $('[name="keperluan[]"]').change(function() {
            $('input[name="keperluan[]"]:checked').each(function(i) {
                if ($(this).val() == 'Other') {
                    $('#nominal').show();
                } else {
                    $('#nominal').hide();
                }
            })
        })
    });
    </script>
    <!-- End custom js for this page-->
</body>

</html>