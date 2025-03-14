@extends('base')
@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100" style="max-width: 400px;">

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form action="{{ route('auth.userRegister') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>

            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

    </div>
</div>
@endsection