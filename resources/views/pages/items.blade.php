@extends('layouts.frontend')

@section('content')
<section class="container">
    <h1>.</h1>
    <index-product :products="{{$products}}" :categories="{{$categories}}">

    </index-product>
</section>


@endsection
