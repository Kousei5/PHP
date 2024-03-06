@extends('layout')

@section('content')
<h1>{{ $product->id }},　　　{{$product->name}}</h1>
<div>
    <p>
        {{ $product->price }}円
    </p>
</div>
<div>
    <a href={{ route('shop.list') }}>一覧に戻る</a>
</div>
@endsection