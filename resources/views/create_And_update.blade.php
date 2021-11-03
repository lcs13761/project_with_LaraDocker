@extends('template.layout')
@section('content')
    <section class="page-section mt-5" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            @if ($type == 'create')
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Create Contact</h2>
            @else
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Update Contact</h2>
            @endif
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Contact Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    @auth
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @endif
                        @if ($type == 'create')
                            <form method="POST" action="{{ url('/contact/add') }}" id="contactForm"
                                data-sb-form-api-token="API_TOKEN">
                                @csrf
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" required name="name" id="name" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Full name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" required name="email" id="email" type="email"
                                        placeholder="name@example.com" data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" required name="phone" id="phone" type="tel"
                                        placeholder="99999-9999" data-sb-validations="required" />
                                    <label for="phone">Phone number</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                            </form>
                        @else
                            <form method="POST" action="{{ url('/contact/update/' . $data->id) }}" id="contactForm"
                                data-sb-form-api-token="API_TOKEN">
                                @method("PUT")
                                @csrf
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" value="{{ $data->name }}" required name="name" id="name"
                                        type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Full name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" value="{{ $data->email }}" required name="email" id="email"
                                        type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" value="{{ $data->phone }}" required name="phone" id="phone"
                                        type="tel" placeholder="99999-9999" data-sb-validations="required" />
                                    <label for="phone">Phone number</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
    </section>
@endsection
