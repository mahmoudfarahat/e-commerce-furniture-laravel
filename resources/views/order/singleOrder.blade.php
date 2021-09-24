@extends('layouts.master')
@section('title','Make an Order')
@section('content')






<div class="container">

    @if(Session::has('reject'))
    <div class="alert-danger alert" role="alert">
        {{Session::get('reject')}}
    </div>
    @endif

    @if(Session::has('order_added'))
    <div class="alert-success alert" role="alert">
        {{Session::get('order_added')}}
    </div>
    @endif

  <div class="row">
    <div class="col-6">
      <form action="{{url('/makeorder/'.request('id'))}}" method="POST" class="border p-3 mt-3">
        @csrf
        <div class="mb-3">
          <label   class="form-label">Quantity</label>
          <input type="number" name="quantities" value="{{old('quantities')}}" class="form-control @error('quantities') is-invalid @enderror  " id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('quantities')
          <div class="text-danger">{{ $message }} </div>
      @enderror
        </div>

         <input type="hidden" name="product_id" value="{{request('id')}}">
          <div class="mb-3">
            <label   class="form-label">Phone</label>
            <input type="text" value="{{old('phone')}}"   name="phone" class="form-control @error('phone') is-invalid @enderror " id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('phone')
            <div class="text-danger">{{ $message }} </div>
        @enderror
        </div>
          <div class="mb-3">
            <label   class="form-label">Country</label>
            <input type="text" value="{{old('country')}}"   name="country" class="form-control @error('country') is-invalid @enderror  " id="exampleInputPassword1">
            @error('country')
            <div class="text-danger">{{ $message }} </div>
        @enderror
        </div>
          <div class="mb-3">
              <label   class="form-label">City</label>
              <input type="text" value="{{old('city')}}"  name="city" class="form-control @error('city') is-invalid @enderror  " id="exampleInputPassword1">
              @error('city')
              <div class="text-danger">{{ $message }} </div>
          @enderror
            </div>
          <div class="mb-3">
              <label   class="form-label">Street</label>
              <input type="text"  value="{{old('street')}}"  name="street"  class="form-control @error('street') is-invalid @enderror  " id="exampleInputPassword1">
              @error('street')
              <div class="text-danger">{{ $message }} </div>
          @enderror
            </div>

          <button type="submit" class="btn btn-primary">Make The Order</button>
        </form>
    </div>
    <div class="col-6">
        <div class="  mt-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('uploads/products/'.$product->prodpicture)}}"  class="card-img-top"    alt="">

            <div class="card-body">
              <h5 class="card-title">{{$product->prodname }}</h5>
              <p class="card-text">{{$product->prodprice }}$</p>

                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>

        </div>

    </div>
  </div>

</div>










@endsection
