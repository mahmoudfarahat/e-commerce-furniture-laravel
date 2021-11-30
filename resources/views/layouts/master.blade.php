<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>


        button.active {
            background-color: #e2d7c8 !important;
            color: white !important;


        }

        .link-a {
    color: #caa979  ;
    text-decoration: none;
}

.link-a:hover{
    color: #916a2f ;

}

.cart-hover{

}
.add-cart{
    background-color: #d1b78f7e;
    color: white;

}

  .cart-hover:hover  .add-cart{
color: white !important;
    display: block !important;
}

    </style>
</head>

<body>
    @if (session()->has('id'))

        @php
            $logInDisplay = 'd-none';
            $logOutDisplay = ' ';
        @endphp
    @else
        @php
            $logInDisplay = '';
            $logOutDisplay = 'd-none';
        @endphp
    @endif

    @if (session()->has('admin'))



        @php
            $admins = '';
            $profile = url('adminprofile');
            $ordericon = 'd-none';
        @endphp


    @elseif (session()->has('customer'))


        @php
            $profile = url('customer');
            $admins = 'd-none';

            $ordericon = '';
        @endphp

    @else
        @php
            $profile = url('/login');
            $admins = 'd-none';

            $ordericon = 'd-none';
        @endphp

    @endif


    <nav class="  navbar-expand-lg navbar-light " style="background-color: #dfdad3" style="height: 100px">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">+(20)01090449567</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Mahmoud Farahat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">mahmoud.farahat.it@gmail.com</a>
                    </li>

                </ul>

                {{-- <a href="{{ url('adminlogin') }}" class="btn btn-success m-2">Admin Panel</a> --}}
            </div>
        </div>
    </nav>



    <nav class="navbar navbar-expand-lg navbar-light bg-light  pt-3">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ url('') }}">My Store</a>
            <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">

                <form class="d-flex">
                    <input class="form-control me-2 typeahead" type="text" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    {{-- <li class="nav-item">
                        <a class="nav-link {{ $admins }}  " href="{{ url('product/create') }}">Add product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $admins }}  " href="{{ url('adminprofile') }}">My Dashboard</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                <a class="nav-link      {{$logInDisplay }}  " href="{{url('adminlogin')}}">Sign in</a>
              </li> --}}
                    <li class="nav-item">
                        <a class="nav-link      {{ $logInDisplay }}  " href="{{ url('login') }}">Sign in</a>
                    </li>
                    <li>

                    </li>
                    {{-- <li class="nav-item">
                <a class="nav-link  {{$logInDisplay }} " href="{{url('admin/create')}}">Sign up</a>
              </li> --}}
                    <li class="nav-item">
                        <a class="nav-link  {{ $logInDisplay }} " href="{{ url('customer/create') }}">Sign up</a>
                    </li>

                </ul>

                <a href="{{ url('myorder') }}" class=" btn    icon-order  position-relative mx-3 {{ $ordericon }}">
                    Orders
                    {{-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
                        {{ $orderCount }}
                        <span class="visually-hidden">unread messages</span>
                    </span> --}}
                </a>

                <a href="{{ url('cartPage') }}" class="d-block position-relative  me-3 {{ $ordericon }} ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#dfdad6"
                        class="bi bi-cart cart-icon" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>


                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
                        {{ $count }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
                <div class="dropdown {{ $logOutDisplay }} ">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#dfdad6"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>

                    <ul class="dropdown-menu drop-style p-0" style="left: -130px;  top: 56px"
                        aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ $profile }}">My Profile</a></li>
                        <li><a class="dropdown-item {{ $ordericon }} " href="{{ url('myorder') }}">Orders</a>
                        </li>
                        <li><a class="dropdown-item {{ $ordericon }}" href="{{ url('cartPage') }}">Cart</a></li>


                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                        <li><a class="dropdown-item text-danger " href="{{ url('customerlogout') }}">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active btn-nav"   aria-current="page" href="{{ url('') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('product') }}">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/#story') }}">Our Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/#contact') }}">Contact us</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    @yield('content')








    <!-- Start Footer -->

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                    viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10" />
                    <path
                        d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </svg>
                <small class="d-block mb-3 text-muted">&copy; 2017–2021</small>
            </div>
            <div class="col-3 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Cool stuff</a></li>
                    <li><a class="link-secondary" href="#">Random feature</a></li>
                    <li><a class="link-secondary" href="#">Team feature</a></li>
                    <li><a class="link-secondary" href="#">Stuff for developers</a></li>
                    <li><a class="link-secondary" href="#">Another one</a></li>
                    <li><a class="link-secondary" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-3 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Resource name</a></li>
                    <li><a class="link-secondary" href="#">Resource</a></li>
                    <li><a class="link-secondary" href="#">Another resource</a></li>
                    <li><a class="link-secondary" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-3 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Business</a></li>
                    <li><a class="link-secondary" href="#">Education</a></li>
                    <li><a class="link-secondary" href="#">Government</a></li>
                    <li><a class="link-secondary" href="#">Gaming</a></li>
                </ul>
            </div>
            <div class="col-3 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Team</a></li>
                    <li><a class="link-secondary" href="#">Locations</a></li>
                    <li><a class="link-secondary" href="#">Privacy</a></li>
                    <li><a class="link-secondary" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"
        integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('product_added'))
        <script>
            toastr.success("{!! Session::get('product_added') !!}")
        </script>

    @endif

    @if (Session::has('product_added'))
        <script>
            swal("Great Job", "{!! Session::get('product_added') !!}", "success", {
                button: "OK",
            })
        </script>

    @endif

    <script>
        // var path = "{{ url('autocomplete') }}";

        // $('input.typeahead').typeahead({
        //     source: function(terms,process){
        //         return $.get(path,{terms:terms},function(data){
        //             return process(data);
        //         });
        //     }
        // });
        var path = "{{ url('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function(query, process) {
                return $.get(path, {
                    term: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>

</body>

</html>
