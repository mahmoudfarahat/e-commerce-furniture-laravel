@extends('layouts.master')
@section('title', 'Make an Order')
@section('content')







    <div class="container">
        <h2>My Orders</h2>
        <br>

        <div class="row mb-3">

            <div class="col-6">
                <div class="card ">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title">On Delivery</h5>
                        <h5> {{ $onDeliveryOrderCount }}</h5>

                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between ">
                        <h5 class="card-title">Finished </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> </h6>

                    </div>
                </div>

            </div>
        </div>


        <hr>


        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Data Order</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

            </thead>
            <tbody>
                @foreach ($order as $orderw)
                    <tr>
                        <th scope="row">{{ $orderw->id }}</th>
                        <td></td>
                        <td>{{ $orderw->created_at }}</td>
                        <td>{{ $orderw->quantities }}</td>





                        <td class="bg-danger ">{{ $orderw->finished }}</td>
                        <td class="  ">
                            <a href="" class="btn btn-primary">Open</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>














@endsection
