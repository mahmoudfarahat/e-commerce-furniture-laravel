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

      <form action="{{url('/makeOrder/')}}" method="POST" class="border p-3 mt-3">
        @csrf
<div class="row">
    <div class="col-6">
        <input type="hidden" name="product_id" value="{{request('id')}}">
        <div class="mb-3">
          <h5   class="form-label">Phone</h5>
          <input type="text" value="{{old('phone')}}"   name="phone" class="form-control @error('phone') is-invalid @enderror " >
          @error('phone')
          <div class="text-danger">{{ $message }} </div>
      @enderror
      </div>
        <div class="mb-3">
          <h5   class="form-label">Country</h5>
          <input type="text" value="{{old('country')}}"   name="country" class="form-control @error('country') is-invalid @enderror  " id="exampleInputPassword1">
          @error('country')
          <div class="text-danger">{{ $message }} </div>
      @enderror
      </div>
        <div class="mb-3">
            <h5   class="form-label">City</h5>
            <input type="text" value="{{old('city')}}"  name="city" class="form-control @error('city') is-invalid @enderror  " id="exampleInputPassword1">
            @error('city')
            <div class="text-danger">{{ $message }} </div>
        @enderror
          </div>
        <div class="mb-3">
            <h5   class="form-label">Street</h5>
            <input type="text"  value="{{old('street')}}"  name="street"  class="form-control @error('street') is-invalid @enderror  " id="exampleInputPassword1">
            @error('street')
            <div class="text-danger">{{ $message }} </div>
        @enderror
          </div>
    </div>
    <div class="col-6">

        <h5 class="mb-3">Payment Method</h5>

        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1"
            {{   'Credit card' ? 'checked' : '' }}  value="Credit card"  >
            <label class="form-check-label" f>
            <label class="form-check-label" for="flexRadioDefault1">
                Credit card
            </label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2"
            {{   'Cash on Delivery' ? 'checked' : '' }}  value="Cash on Delivery"
            >
            <label class="form-check-label" for="flexRadioDefault2">
            Cash on Delivery
            </label>
          </div>


        <h5 class="mb-3"> Delivery Method</h5>

        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="delivery" id="flexRadioDefault3" value="Air"
          or="flexRadioDefault1"      {{   'Air' ? 'checked' : '' }} >
                Air
            </label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="delivery" id="flexRadioDefault4" value="shipping"
            {{   'shipping' ? 'checked' : '' }}
             >
            <label class="form-check-label" for="flexRadioDefault2">
                Shipping
            </label>
          </div>
    </div>
</div>


          <button type="submit" class="btn btn-primary">Make The Order</button>
        </form>


</div>










@endsection
