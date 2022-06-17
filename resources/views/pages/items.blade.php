@extends('layouts.frontend')

@section('content')

@auth()

<section class="container">
   <div class="card">
        <div class="card-body">
            <table-product :products="{{$products}}" :categories="{{$categories}}"/>
        </div>
   </div>
</section>
@endauth


@endsection
