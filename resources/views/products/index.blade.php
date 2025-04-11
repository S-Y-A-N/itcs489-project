@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <h1 class="mb-5">{{ $title }}</h1>
    <div class="grid gap-2">

      @for ($i = 0; $i < 8; $i++)
      <div class="col card p-0 flex-fill">
      <img class="card-img-top w-100" src="https://placehold.co/60x40/fffbcf/d4a900?text=Product" alt="Title" />
      <div class="card-body">
      <h6 class="card-title mb-4">Item Name</h6>
      <p class="card-subtitle"><s>BHD 99.99</s></p>
      <p class="card-subtitle lead">BHD 99.99</p>
      <p class="card-subtitle mt-2"><a href="">Brand Name</a></p>
      <a href="" class="stretched-link"></a>
      </div>
      </div>
    @endfor

    </div>
  </div>

@endsection