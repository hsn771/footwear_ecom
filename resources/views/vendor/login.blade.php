@extends('layouts.master')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Login as vendor</p>
                    </div>

                    <form method="POST" action="{{ route('vendor.login') }}">
                        @csrf
                         <div class="form-group">
                                <label for="username">Username</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="username"
                                    name="username"
                                    placeholder="Enter username"
                                    required>
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                         </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Enter password"
                                    required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
