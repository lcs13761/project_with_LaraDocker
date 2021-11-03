@extends('template.layout')
@section('content')
    <section class="page-section mt-5" id="contact">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Detail Contact</h2>
            <div class="row justify-content-center">
                <div class="mt-5 col-lg-8 col-xl-7">
                    <p class = "fs-4">Name: <span>{{ $contact->name }}</p>
                    <p class = "fs-4">E-mail: <span>{{ $contact->email }}</span></p>
                    <p class = "fs-4">Phone: <span>{{ $contact->phone }}</span></p>
                </div>
            </div>
        </div>
    </section>
@endsection
