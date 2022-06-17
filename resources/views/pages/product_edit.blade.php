@extends('layouts.frontend')

@section('content')

@auth()

<section class="container">

    <div class="card">

        <div class="card-body">

            <index-product :productz_id="{{$product_id}}" :categories="{{$categories}}"></index-product>

        </div>
   </div>

</section>
@endauth

@endsection
