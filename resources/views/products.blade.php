@extends('layouts/app')

@section('content')
  <h1>Products</h1>

  <ul>
  @foreach($products as $product)
    <li>{{ $product }}</li>
  @endforeach
  </ul>
@endsection