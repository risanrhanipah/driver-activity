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
                        <div class="container py-0 h-700">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col col-lg-12 mb-2 mb-lg-0">
                                    <div class="card mb-3" style="border-radius: .5rem;">
                                        <div class="row g-0">
                                            <div class="col-md-4 gradient-custom text-center text-white"
                                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                                    alt="Avatar" class="img-fluid my-5" style="width: 150px;" />
                                                <h5>Marie Horwitz</h5>
                                                <p>Web Designer</p>
                                                <i class="far fa-edit mb-5"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-4">
                                                    <h6>Information</h6>
                                                    <hr class="mt-0 mb-4">
                                                    <div class="row pt-1">
                                                        <div class="col-6">
                                                            <h6>NIK</h6>
                                                            <p class="text-muted">{{ $profile->nik }}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Name</h6>
                                                            <p class="text-muted">{{ $profile->user->name}}</p>
                                                        </div>
                                                        <div class="col-6 mb-0">
                                                            <h6>Born City</h6>
                                                            <p class="text-muted">{{ $profile->born_city}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Birthday</h6>
                                                            <p class="text-muted">{{ $profile->birthday}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Gender</h6>
                                                            <p class="text-muted">{{ $profile->gender}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Address</h6>
                                                            <p class="text-muted">{{ $profile->address}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Religion</h6>
                                                            <p class="text-muted">{{ $profile->religion}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Position</h6>
                                                            <p class="text-muted">{{ $profile->position}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Site</h6>
                                                            <p class="text-muted">{{ $profile->sites}}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>ID Card</h6>
                                                            <p class="text-muted">{{ $profile->id_card}}</p>
                                                        </div>
                                                    </div>
                                                    <h6>Contact</h6>
                                                    <hr class="mt-0 mb-4">
                                                    <div class="row pt-1">
                                                        <div class="col-6">
                                                            <h6>Phone Number</h6>
                                                            <p class="text-muted">{{ $profile->phone_number }}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h6>Email</h6>
                                                            <p class="text-muted">{{ $profile->user->email }}</p>
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