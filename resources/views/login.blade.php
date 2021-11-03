@extends('template.layout')
@section('content')
    <section class="page-section mt-5" id="login">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ url('/user/signIn/verify') }}"
                        id="loginForm" data-sb-form-api-token="API_TOKEN">
                        @csrf
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" autocomplete="email" name="email" id="email" type="email"
                                placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Password number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" autocomplete="current-password" name="password" id="password"
                                type="password" placeholder="password" data-sb-validations="required" />
                            <label for="password">Password</label>
                            <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton">SignIn</button>
                    </form>
                </div>
            </div>
    </section>
@endsection
