@extends('layouts.master')
@section('title', 'order')
@section('content')




<div class="container">
    <h2>Order Information:</h2>
    <h5>Quantity:</h5>
    <h5>Total Price:</h5>
    <h4></h4>


    <hr>
    <div class="row">
        @foreach ($products as $product)


                <div class="col-3">
                    <div class="card">

                        <img src="{{ asset('uploads/products/' . $product->prodpicture) }}" class="card-img-top" alt="">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->prodname }}</h5>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">{{ $product->prodprice }}$</p>


                            </div>



                        </div>

                    </div>
                </div>


        @endforeach
    </div>
</div>





@endsection
