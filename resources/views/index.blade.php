@extends('layouts.master')
@section('title', 'Home')
@section('content')


    <div class="container">

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img src="{{ asset('uploads/1.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="{{ url('product') }}" class="btn btn-dark btn-lg">Shop</a>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('uploads/2.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="{{ url('product') }}" class="btn btn-dark btn-lg">Shop</a>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('uploads/3.jpg') }}" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="{{ url('product') }}" class="btn btn-dark btn-lg">Shop</a>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-5" id="story">
        <div class="card bg-dark text-white">
            <img src="{{ asset('uploads/5.jpg') }}" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h2 class="card-title text-center display-1 position-absolute top-50 start-50 translate-middle fw-bold">Our
                    Story</h2>

            </div>
        </div>

        <h4 class="text-center mt-5"> A place where all kinds of good things come together.</h4>

        <div class="row mt-5">

            <div class="col-sm-12 col-md-6 d-flex align-items-center  ">
                <div>
                    <h5>A happy place</h5>
                   A place where all kinds of good things come together. It's a collage of whimsy and restraint, an ode to
                    vintage and a nod to experimentation, a mixture of the familiar with the exotic.
                </div>

            </div>

            <div class="col-sm-12 col-md-6">
                <img src="{{ asset('uploads/6.jpg') }}" class="card-img" alt="...">
            </div>
        </div>

        <div class="row mt-4">

            <div class="col-sm-12 d-flex align-items-center  col-md-6 ">
                <div>
                    <h5>A happy place</h5>
                    A place where all kinds of good things come together. It's a collage of whimsy and restraint, an ode to
                    vintage and a nod to experimentation, a mixture of the familiar with the exotic.
                </div>

            </div>
            <div class="col-sm-12 col-md-6 ">
                <img src="{{ asset('uploads/7.jpg') }}" class="card-img" alt="...">
            </div>
        </div>
    </div>
    </div>
    <div class="container mt-5" id="contact">
        <div class="  mb-3 " style="max-width: 1500px;">
            <div class="row g-0">

                    <img src="{{ asset('uploads/4.jpg') }}" class=" col-md-4 col-sm-12 rounded-start  "   alt="...">

                <div class="col-md-8 col-sm-12">
                    <div class="card-body  ">
                        <h5 class="card-title">Subscribe to our newsletter</h5>
                        <p class="card-text">Promotions, new products and sales. Directly to your inbox.</p>
                        <form action="{{ url('sendContact') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control   @error('name') is-invalid @enderror  "
                                    placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone"
                                    class="form-control   @error('phone') is-invalid @enderror  " placeholder="Phone">
                                @error('phone')
                                    <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror  "
                                    placeholder="E-mail">
                                @error('email')
                                    <div class="text-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <button class="btn btn-dark form-control">Submit</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
