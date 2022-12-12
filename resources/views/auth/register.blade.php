@include('template.head')

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-2 px-10 px-sm-5">
                            <div class="card-body">
                                <a href="#" class="app-brand-link gap-2">
                                    <br>
                                    <span class="app-brand-logo demo">
                                        <img src="assets/images/driver5.jpeg" class="driver" width="200px"
                                            style="display:block; margin:auto;" />
                                    </span>
                                </a>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row mb-0">
                                        <label for="name" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name"
                                                placeholder="Name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <label for="email" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Email Address">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <label for="role" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            {{-- <input id="role" type="text"
                                                class="form-control @error('role') is-invalid @enderror" name="role"
                                                value="{{ old('role') }}" required autocomplete="role"
                                            placeholder="Role"> --}}
                                            <select class="form-control @error('role') is-invalid @enderror" name="role"
                                                value="{{ old('role') }}">
                                                <option>admin</option>
                                                <option>user</option>
                                                <option>driver</option>
                                            </select>

                                            @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <label for="password" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password"
                                                placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input">
                                                I agree to all Terms & Conditions
                                            </label>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <button type=" submit" class="btn btn-primary col-md-12">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4 font-weight-light">
                                            Already have an account? <a href="login" class="text-primary">Sign in</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.plugin')
</body>