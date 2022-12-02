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
                    <section class="vh-100" style="background-color: #f4f5f7;">
                        <div class="container py-2 h-400">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-lg-12 mb-2 mb-lg-0">
                                    <div class="card mb-3" style="border-radius: .5rem;">
                                        @foreach ($employees as $employee)
                                        <div class="row g-0">
                                            <div class="col-md-4 gradient-custom text-center text-white"
                                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                                <h5>Marie Horwitz</h5>
                                                <p>Web Designer</p>
                                                <i class="far fa-edit mb-5"></i>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card-body p-4">
                                                    <h6>Information</h6>
                                                    <hr class="mt-0 mb-4">
                                                    <div class="row pt-1">
                                                        <div class="col-6 mb-3">
                                                            <h6>NIK</h6>
                                                            <p class="text-muted">{{ $employee->nik }}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Nama</h6>
                                                            <p class="text-muted">{{ $employee->user->name}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Tempat Lahir</h6>
                                                            <p class="text-muted">{{ $employee->born_city}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Tanggal Lahir</h6>
                                                            <p class="text-muted">{{ $employee->birthday}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Jenis Kelamin</h6>
                                                            <p class="text-muted">{{ $employee->gender}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Alamat</h6>
                                                            <p class="text-muted">{{ $employee->address}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Agama</h6>
                                                            <p class="text-muted">{{ $employee->religion}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Jabatan</h6>
                                                            <p class="text-muted">{{ $employee->position}}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Penempatan</h6>
                                                            <p class="text-muted">{{ $employee->sites}}</p>
                                                        </div>
                                                    </div>
                                                    <h6>Kontak</h6>
                                                    <hr class="mt-0 mb-4">
                                                    <div class="row pt-1">
                                                        <div class="col-6 mb-3">
                                                            <h6>Nomor Telpon</h6>
                                                            <p class="text-muted">{{ $employee->phone_number }}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6>Email</h6>
                                                            <p class="text-muted">{{ $employee->user->email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-start">
                                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
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