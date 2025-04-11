@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Register</h1>

        <form>

            <div class="row g-2">
                <!-- first name -->
                <div class="col">
                    <div class="form-floating">
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="John">
                        <label for="fname">First Name</label>
                    </div>
                </div>

                <!-- last name -->
                <div class="col mb-2">
                    <div class="form-floating">
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Doe">
                        <label for="lname">Last Name</label>
                    </div>
                </div>
            </div>

            <!-- email -->
            <div class="form-floating mb-2 col">
                <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com">
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-2 col">
                <input type="phone" name="phone" class="form-control" id="phone" placeholder="+973 1000 1000">
                <label for="phone">Phone Number</label>
            </div>

            <div class="form-floating mb-2 col">
                <input type="password" name="password" class="form-control" id="password" placeholder="">
                <label for="password">Password</label>
            </div>

        

            <button type="submit" class="btn btn-primary">Register</button>

        </form>
    </div>

@endsection