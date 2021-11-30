
{{-- @include('shared.header')

@include('shared.nav') --}}


@extends('layouts.master')
@section('title','Sign In')
@section('content')

<div class="container d-flex justify-content-center  ">
    <form class="  col-lg-4 col-xxl-3 col-md-5 col-sm-7" action="{{url('/customerloginlogic')}}" style=" margin-top: 140px;
}" method="post" enctype="multipart/form-data">
  <h5>Log In to Your Shop Account!</h5>
<hr>
@csrf
  <div class="mb-3 ">
      <input type="email" value=" " placeholder="email" name="email"
          class="  form-control     @error('email') is-invalid @enderror">
      @error('email')
          <div class="text-danger"> {{ $message }}</div>
      @enderror
  </div>
  <div class="mb-3 ">
      <input type="password" placeholder="password" name="password" class="form-control   @error('password') is-invalid @enderror ">
      @error('password')
          <div class="text-danger">{{ $message }} </div>
      @enderror
  </div>

  <div class="mb-3">
      <input type="checkbox"  name="rememberMe"   >
      <label for="exampleInputPassword1"> remember Me </label>
    </div>
  <button type="submit" class="btn  w-100 " style="background-color: #dfdad3"   >Log In</button>
 <div class="mt-3">Don't have an account? <a href="{{url('customer/create')}}" class="text-dark ">Sign up</a></div>
</form>


 </div>


 {{-- @include('shared.footer') --}}
 @endsection
