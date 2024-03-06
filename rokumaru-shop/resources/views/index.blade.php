@extends('layout')

@section('content')
    <h1>お店一覧</h1>
    @foreach ($products as $product)
    <p>
    {{ $product->name }},
    {{ $product->price }},
    {{ $product->gazou }}
    </p>
    @endforeach
@endsection