@extends('site.layouts.master')

@section('title'){{ $meta->meta_title }}@endsection

@section('description'){{ $meta->meta_description }}@endsection

@section('keywords'){{ $meta->meta_keywords }}@endsection

@section('robots')@if($meta->indexing){{ $meta->indexing }}@else{{ 'index, follow' }}@endif
@endsection

@section('canonical')@if($meta->canonical){{ $meta->canonical }}@else{{ \Illuminate\Support\Facades\URL::current() }}@endif
@endsection

@section('content')
    <div class="container-fluid tb_spacing contact_page">
        <div class="card p-4 mx-5">
            <div class="row mx-0">
                <div class="col-12 col-md-6 contact_details">
                    <h1>Contact Us</h1>
                    <p>
                        Heroes are not born, but are made. Your hero is your symbol, the purity and the strength to
                        persevere
                        and endure in spite of overwhelming obstacles.
                    </p>

                    <div class="row mx-0">
                        <div class="col-3 col-md-1">
                            <i class="fas fa-phone-square"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-0">Phone</p>
                            <p>+977 9860311180, +977 9860079333, +977 9823577014</p>
                        </div>
                    </div>

                    <div class="row mx-0">
                        <div class="col-3 col-md-1">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-0">Email</p>
                            <p>heoresjourneytoeverest@gmail.com</p>
                        </div>
                    </div>

                    <div class="row mx-0">
                        <div class="col-3 col-md-1">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="col-8">
                            <p class="mb-0">Head Office</p>
                            <p>Basundhara, Kathmandu, Nepal</p>
                        </div>
                    </div>

                    <h2 class="mt-3">Have any query?</h2>
                    <p>We will get back to you as soon as possible.</p>
                    <form method="post" action="{{ route('enquiry.store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="col-4 col-md-3">
                                    <label for="name">Full Name</label>
                                </div>
                                <div class="col-8">
                                    <input
                                        type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        placeholder="Enter your name"
                                        value="{{ old('name') }}"
                                    >
                                </div>
                                @error('name')
                                <div class="offset-4 offset-md-3 col invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="col-4 col-md-3">
                                    <label for="email">Email Address</label>
                                </div>
                                <div class="col-8">
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        placeholder="Enter your email address"
                                        value="{{ old('email') }}"
                                    >
                                </div>
                                @error('email')
                                <div class="offset-4 offset-md-3 col invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="col-4 col-md-3">
                                    <label for="subject">Subject</label>
                                </div>
                                <div class="col-8">
                                    <input
                                        type="text"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        id="subject"
                                        name="subject"
                                        placeholder="Enter query subject"
                                        value="{{ old('subject') }}"
                                    >
                                </div>
                                @error('subject')
                                <div class="offset-4 offset-md-3 col invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="col-4 col-md-3">
                                    <label for="message">Message</label>
                                </div>
                                <div class="col-8">
                                    <textarea
                                        id="message"
                                        class="form-control @error('message') is-invalid @enderror"
                                        name="message"
                                        placeholder="Enter your message"
                                    >{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                <div class="offset-4 offset-md-3 col invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-0">
                                <div class="col-12 col-md-11 text-right">
                                    <input type="reset" class="btn btn-outline-secondary my_btn px-5" value="Reset">
                                    <button type="submit" class="btn btn-outline-primary my_btn px-5">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3530.9676843323696!2d85.3397303143856!3d27.749142730262246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjfCsDQ0JzU2LjkiTiA4NcKwMjAnMzAuOSJF!5e0!3m2!1sen!2snp!4v1617967681105!5m2!1sen!2snp"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">

        </div>
    </div>
@endsection
