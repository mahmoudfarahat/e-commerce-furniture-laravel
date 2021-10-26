@extends('layouts.master')
@section('title', 'Show Products')
@section('content')


    <div class="container">
        <div class="row mt-4">

                <img src="{{ asset('uploads/products/' . $product->prodpicture) }}" class="col-lg-7  "  alt="">


            <div class="col-lg-5 align-self-center ">
                <h2 class="card-title  ">{{ $product->prodname }}</h2>
                <h4 class="card-text">{{ $product->prodprice }}$</h4>

                <form action="{{ url('/addtocart/' . $product->id) }}" method="POST" class="mt-5  ">
                    @csrf

                    <input type="number" class="form-control mb-3 align-self-center" placeholder="Quantity" name="quantity">
                    @error('quantity')
                        <div class="text-danger">{{ $message }} </div>
                    @enderror
                    <button type="submit" class="btn submit-btn d-block mb-3 form-control">Add To Cart</button>

                </form>

                {{-- <a href="" class="btn btn-outline-dark d-block">Buy</a> --}}
            </div>


        </div>




    </div>






@endsection
