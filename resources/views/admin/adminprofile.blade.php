@extends('layouts.admin')
@section('title', 'My Profile')
@section('content')


    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Orders</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Products</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-3 mb-3 ">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Orders</h5>
                                {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                                <p class="card-text">{{ $ordercount }}</p>
                                {{-- <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bending Orders</h5>
                                <p class="card-text">{{ $bendingcount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">On delivery</h5>
                                <p class="card-text">{{ $ondeliveryconut }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Completed Orders</h5>
                                <p class="card-text">{{ $doneconut }}</p>

                            </div>
                        </div>
                    </div>
                </div>



                <table class="table  table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">Order</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Shipment</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order status</th>
                            <th scope="col">Order total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $orders)
                            <tr>
                                <th scope="row" class=" align-middle"> <a href={{ url('customerorders/' . $orders->id) }}
                                        class="card-link link-a "> {{ $orders->id }}</a> </th>
                                <td class="align-middle"> {{ $orders->name }} </td>
                                <td class="align-middle"> {{ $orders->country }}, {{ $orders->city }}, <br>
                                    {{ $orders->street }} <br>
                                    <span class="text-muted"> via {{ $orders->delivery }}</span>
                                </td>
                                <td class="align-middle">{{ $orders->updated_at }}</td>
                                <td class="     align-middle">{{ $orders->status }}</td>
                                <td class="align-middle"> {{ $orders->total }}</td>


                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>








            <div class="container">
                <div class="d-flex align-items-start">

                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-3">
                                        <div class="card">

                                            <img src="{{ asset('uploads/products/' . $product->prodpicture) }}"
                                                class="card-img-top" alt="">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->prodname }}</h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="card-text">{{ $product->prodprice }}$</p>
                                                    <p class="card-text">Quanity: {{ $product->quantity }} </p>

                                                </div>

                                                <form action="{{ url('/product/' . $product->id) }}" method="post">
                                                    @csrf
                                                    <a href="{{ url('/product/' . $product->id) }}"
                                                        class="btn btn-success">Open</a>
                                                    <a href="{{ url('/product/' . $product->id . '/edit/') }}"
                                                        class="btn btn-primary">Edit</a>

                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">...
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">...
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">











                <a href="{{ url('product/create') }}" class="btn ">Add product</a>


                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->prodname }}</td>
                                <td><img src="{{ $product->prodpicture }}" class="img-thumbnail" height="100px"
                                        width="100px"></td>
                                <td>${{ $product->price }}</td>
                                <td>


                                    <form action="{{ url('/product/' . $product->id) }}" method="post">
                                        @csrf

                                        <input type="hidden" name="_method" value="delete">
                                        <a href="" class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger">Delete</button>
                                </td>

                                </form>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>


    </div>





















@endsection
