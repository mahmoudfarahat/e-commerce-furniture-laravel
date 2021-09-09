
{{-- @include('shared.header')

@include('shared.nav') --}}


@extends('layouts.master')
@section('title','Sign In')
@section('content')

<div class="container d-flex justify-content-center  ">
    <form class="  col-lg-4 col-xxl-3 col-md-5 col-sm-7" action="{{url('/adminloginlogic')}}" style=" margin-top: 180px;
}" method="post" enctype="multipart/form-data">
  <h4>Sign in</h4>

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
  <button type="submit" class="btn btn-primary  ">Log In</button>


</form>


 </div>


 {{-- @include('shared.footer') --}}
 @endsection
