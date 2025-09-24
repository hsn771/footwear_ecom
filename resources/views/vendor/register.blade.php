

     @extends('layouts.master')

    @section('content')


    <h1 style="text-align: center">Vendor Register</h1>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Register as vendor</p>
                    </div>

                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input type="text" class="form-control" id="owner_name" name="owner_name" aria-describedby="emailHelp" placeholder="Owner Name">
                        </div>
                        <div class="form-group">
                            <label for="owner_contact">Contact Number</label>
                            <input type="number" class="form-control" id="owner_contact" name="owner_contact" aria-describedby="emailHelp" placeholder="Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="store_contact">Store Contact Number</label>
                            <input type="number" class="form-control" id="store_contact" name="store_contact" aria-describedby="emailHelp" placeholder="Store Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group">
                            <label for="district_id" class="form-label">District</label>
                            <select name="district_id" class="form-select" id="district">
                                <option selected>Select your district</option>
                                @foreach($districts as $district)
                                    <option class="dist dist{{$district->division_id}}" value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="division_id" class="form-label">Division</label>
                            <select name="division_id" class="form-select" id="division" onchange="fetchDistricts(this.value)">
                                <option selected>Select your division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address">
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
                            </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                   
                </div>
               

            </div>
        </div>
    </div>
    <!-- About End -->
    @endsection
