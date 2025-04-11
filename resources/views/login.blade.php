@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Login</h1>

        <form>
            <!-- Email -->
            <div class="form-floating mb-2 col">
                <input type="email" name="email" class="form-control" id="email" placeholder="someone@example.com">
                <label for="email">Email</label>
            </div>

            <!-- Password -->
            <div class="form-floating mb-2 col">
                <input type="password" name="password" class="form-control" id="password" placeholder="">
                <label for="password">Password</label>
            </div>


            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>

@endsection