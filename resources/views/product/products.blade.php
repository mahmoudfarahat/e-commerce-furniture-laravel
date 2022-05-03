@extends('layouts.master')
@section('title', 'Show Products')
@section('content')

    {{-- @include('shared.header')

@include('shared.nav') --}}






    <div class="container-fluid">
<div class="row">
    <div class="col-2 mt-3 p-4  border-end     border-dark">
        <h5 class="">Categories</h5>
        @foreach ($categories as $catergory)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            {{$catergory->name}}
            </label>
          </div>

        @endforeach
        <hr>
        <h5 class="">Prices</h5>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               50
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               200
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               500
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
               1000
            </label>
          </div>


    </div>
    <div class="col-10">

        <div class="row my-5 mx-2">




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



                <div class="col-md-4 col-lg-3 col-sm-12 mb-3">
                    <div class="card border-0">
                        <div class="position-relative  cart-hover ">
                            <a class="" href="{{ url('/product/' . $product->id) }}">
                                {{-- <img src="{{ asset('uploads/products/' . $product->prodpicture) }}"  class="card-img-top " alt=""> --}}
                                <img src="{{$product->prodpicture}}"  class="card-img-top " alt=""   >

                            </a>
                            <a href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{ $product->id }}"
                                class=" add-cart d-none      text-center text-decoration-none position-absolute bottom-0 start-50 translate-middle-x  btn  "
                                style="width: 100%">Add to Cart</a>
                        </div>

                        <div class="card-body p-0">

                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <h5 class="card-title  mb-0">{{ $product->prodname }}</h5>
                                    <p class="card-text text-muted ">{{ $product->prodprice }}$</p>
                                </div>

                                {{-- <a class="" href="" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#e0caab"
                                        class=" align-self-center bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </a> --}}


                            </div>


                            {{-- <div class="{{ $d_btn_cart_buy }}">

                                <a href="{{ url('/order/' . $product->id) }}" class="btn btn-success "  >Buy</a>
                            </div> --}}
                            <div class="{{ $d_bought }} ">
                                <a class="btn btn-danger disabled d-block">Out of Stock</a>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="modal fade" id="exampleModal_{{ $product->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add the product to you cart</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{ url('/addtocart/' . $product->id) }}" method="POST">
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



    </div>
</div>




    <!-- Modal -->


@endsection
{{-- @include('shared.footer') --}}
