@extends('layouts.frontend')

@section('content')

@auth()

<section class="container">

    <div class="card">

        <div class="card-body">

            <index-category :categori="{{$category}}"></index-category>

        </div>
   </div>

</section>
@endauth

@endsection
