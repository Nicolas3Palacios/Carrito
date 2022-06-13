@extends('layouts.frontend')

@section('content')

@auth()

<section class="container">
    <h1>.</h1>
    <index-product :products="{{$products}}" :categories="{{$categories}}">

    </index-product>
</section>
@endauth


@endsection
