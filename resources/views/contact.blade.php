@extends('template.layout')
@section('content')
    @include("template.user")
    <section class="page-section" id="contact">
        <div class="container">
            <!-- Contact Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contacts</h2>
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
                        <a class="" href="{{ url('/contact/create') }}">
                            <p class="btn btn-primary px-2 fs-5">Create</p>
                        </a>
                    @endauth
                    <ol class="mt-4 fs-4">
                        @foreach ($contacts as $contact)
                            <div class="d-flex">
                                @auth
                                    <a class="nav-link p-0 text-dark rounded" href="{{ url('/contact/contact/' . $contact->id) }}">
                                        <li class="mb-3 ">
                                            <div>
                                                <p class="ms-3 me-5">{{ $contact->phone }}</p>
                                            </div>
                                        </li>
                                    </a>
                                    <a class="me-3" href="{{ url('/contact/edit/' . $contact->id) }}">
                                        <p class = "btn btn-dark ">Editar</p>
                                    </a>
                                    <form action="{{ url("/contact/delete/$contact->id") }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input class="btn btn-dark" value="Delete" style="cursor:pointer;" type="submit">
                                    </form>
                                @endauth
                                @guest
                                    <li class="mb-3 ">
                                        <p class="ms-3 me-5">{{ $contact->phone }}</p>
                                    </li>
                                @endguest
                            </div>
                        @endforeach
                    </ol>
                </div>
            </div>
    </section>
@endsection
