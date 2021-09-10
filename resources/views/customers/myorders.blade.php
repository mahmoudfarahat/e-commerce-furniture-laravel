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
                        <h5>{{$finishedOrderCount}}</h5>

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



                    @if    ($orderw->finished == 1 );
                         @php $finished = 'bg-success'; @endphp
                    @else
                    @php $finished = 'bg-danger'; @endphp
                    @endif
                        <td class="{{$finished }}"></td>
                        <td class="  ">
                            <a href="{{url('singleorder/'.$orderw->id)}}" class="btn btn-primary">Open</a>

                            <a  href=""  class="  btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$orderw->id}}">Delete</a>
                        </td>



                    </tr>

                    <div class="modal fade" id="exampleModal_{{$orderw->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete your order?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="{{ url('singleorder/'.$orderw->id ) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>









                @endforeach
            </tbody>
        </table>
    </div>














@endsection
