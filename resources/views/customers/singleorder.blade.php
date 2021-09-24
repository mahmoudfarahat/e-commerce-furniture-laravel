@extends('layouts.master')
@section('title', 'order')
@section('content')




    <div class="container">
        <h2 class="mb-3">Order Details:</h2>
        <div class="row border p-3">
            <div class="col-4">
                <h4>Shipping Address</h4>
                <p class="mb-1">country: {{ $order->country }}</p>
                <p class="mb-1">city: {{ $order->city }}</p>
                <p class="mb-1">street: {{ $order->street }}</p>
                <br>
                <p class="mb-1">phone: {{ $order->phone }}</p>

            </div>
            <div class="col-4">
                <h4>Shipping Method</h4>
                <small>{{ $order->delivery }}</small>

            </div>
            <div class="col-4">
                <h4>Payment Method</h4>
                <small>{{ $order->payment }}</small>
            </div>
        </div>




        <div class="row mt-4">


            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)

                        <tr>
                            <th scope="row">
                                <div class="d-flex">
                                    <div class="col-md-2    ">
                                        <img src="{{ asset('uploads/products/' . $product->prodpicture) }}"
                                            class="card-img-top" alt="">

                                    </div>
                                    <div class="ms-4">
                                        <a href="{{ url('') }}" class="  mb-4 d-block ">{{ $product->prodname }}</a>



                                    </div>

                                </div>

                            </th>
                            <td>
                                <p class="card-text mb-0">${{ $product->prodprice }} </p>

                            </td>
                            <td>
                                <p class="card-text mb-0"> {{ $product->c_quantity }} </p>


                            </td>
                            <td>
                                <p class="card-text mb-0"> ${{ $product->total }} </p>



                            </td>
                        </tr>






                    @endforeach

                </tbody>


            </table>
            <div class="row ">
            <div class="col-6">

            </div>
            <div class="col-6">
                <div class="d-flex justify-content-between mb-3">
                    <h2> Subtotal</h2>
                    <h2> ${{ $order->total }}</h2>
                </div>
            </div>
            </div>




        </div>

    </div>





@endsection
