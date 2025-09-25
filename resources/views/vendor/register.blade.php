@extends('layouts.master')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Register as vendor</p>
                    </div>

                    <form method="POST" action="{{ route('vendor.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" class="form-control" id="owner_name" name="owner_name" aria-describedby="emailHelp" placeholder="Owner Name">
                            @error('owner_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="owner_contact">Contact Number</label>
                            <input type="number" class="form-control" id="owner_contact" name="owner_contact" aria-describedby="emailHelp" placeholder="Contact Number">
                            @error('owner_contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="store_contact">Store Contact Number</label>
                            <input type="number" class="form-control" id="store_contact" name="store_contact" aria-describedby="emailHelp" placeholder="Store Contact Number">
                            @error('store_contact')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="division_id" class="form-label">Division</label>
                                    <select name="division_id" class="form-control" id="division" onchange="fetchDistricts(this.value)">
                                        <option selected>Select your division</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district_id" class="form-label">District</label>
                                    <select name="district_id" class="form-control" id="district">
                                        <option selected>Select your district</option>
                                        @foreach($districts as $district)
                                            <option class="dist dist{{$district->division_id}}" value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Confirm password"
                                    required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ route('vendor.login') }}" class="btn btn-secondary">Already registered? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
