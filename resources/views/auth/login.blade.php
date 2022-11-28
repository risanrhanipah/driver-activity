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
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-0">
                                        <label for="email" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email"
                                                placeholder="Email Address" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="password" class="col-md-4 col-form-label text-md-end"></label>

                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <button type=" submit" class="btn btn-primary col-md-12">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted" for="remember">
                                                <input type="checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                Remember Me</input>
                                            </label>
                                        </div>
                                        <div class="my-2 d-flex justify-content-between align-items-center">
                                            Don't have an account? <a href="register" class="text-primary"> Create</a>
                                        </div>
                                        <!-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}"
                                            class="text-primary">
                                            Forgot Your Password?
                                        </a>
                                        @endif -->
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>