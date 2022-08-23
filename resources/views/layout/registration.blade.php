@extends('layout.main')

@section('content')

 <!-- Page Header Start -->
 <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">About Us</h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">About Us</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<div class="container box">
    <h3 align="center"> Register Your Account</h3><br />

    @if (isset(Auth::user()->email))
        <script>
            window.location = "/main/successlogin";
        </script>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('save.registration') }}">
        @csrf
        <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text" required name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label>Enter Email</label>
            <input type="email" required name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Enter Password</label>
            <input type="password" required name="password" class="form-control" />
        </div>
        <div class="form-group">
            <p class="text-danger" for="">If you have an account, please login! <a href="{{ url('login') }}">Click Here</a></p>
        </div>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="Registration" />
        </div>
    </form>
</div>




@endsection