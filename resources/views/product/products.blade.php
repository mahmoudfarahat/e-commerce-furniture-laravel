@extends('layouts.master')
@section('title', 'Show Products')
@section('content')

    {{-- @include('shared.header')

@include('shared.nav') --}}






    <div class="container">




        <div class="row my-5">
            @if (Session::has('product_added'))
                <div class="alert-success alert" role="alert">
                    {{ Session::get('product_added') }}
                </div>
            @endif




            @foreach ($products as $product)

                @if ($product->quantity == 0)

                    @php
                        $d_btn_cart_buy = 'd-none';
                        $d_bought = '';
                    @endphp
                @else
                    @php
                        $d_btn_cart_buy = '';
                        $d_bought = 'd-none';
                    @endphp
                @endif



                <div class="col-3">
                    <div class="card border-0">
                     <a href="{{url('/product/'. $product->id  )}}"><img src="{{ asset('uploads/products/' . $product->prodpicture) }}" class="card-img-top" alt=""></a>

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->prodname }}</h5>
                            <p class="card-text">{{ $product->prodprice }}$</p>

                            <div class="{{ $d_btn_cart_buy }}">
                                <a class="btn btn-primary  " data-bs-toggle="modal" data-bs-target="#exampleModal_{{$product->id}}">Add to
                                    Cart</a>
                                <a href="{{ url('/order/' . $product->id) }}" class="btn btn-success  ">Buy</a>
                            </div>
                            <div class="{{ $d_bought }} ">
                                <a class="btn btn-danger disabled d-block">Out of Stock</a>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add the product to you cart</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{ url('/addtocart/' . $product->id ) }}" method="POST">
                                @csrf

                                <div class="modal-body">
                                    <label class="mb-2">Quantity:</label>
                                    <input class="form-control" name="quantity" type="number">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>


        @endforeach
    </div>

    {{ $products->links() }}

    </div>




    <!-- Modal -->


@endsection
{{-- @include('shared.footer') --}}
