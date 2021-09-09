@extends('layouts.master')
@section('title', 'Show Products')
@section('content')


    <div class="container">
        <div class="row mt-4">
            <div class="col-7 ">
                <img src="{{ asset('uploads/products/' . $product->prodpicture) }}"  alt="">

            </div>

            <div class="col-5">
                <h2 class="card-title mt-5">{{ $product->prodname }}</h2>
                <h4 class="card-text">{{ $product->prodprice }}$</h4>

                <form action="{{ url('/addtocart/' . $product->id) }}" method="POST" class="mt-5">
                    @csrf

                    <input type="number" class="form-control mb-3" placeholder="Quantity" name="quantity">
                    @error('quantity')
                        <div class="text-danger">{{ $message }} </div>
                    @enderror
                    <button type="submit" class="btn btn-dark d-block mb-3 form-control">Add To Cart</button>

                </form>

                <a href="" class="btn btn-outline-dark d-block">Buy</a>
            </div>


        </div>




    </div>






@endsection
