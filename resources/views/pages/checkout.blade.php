@extends('layouts.frontend')

@section('content')

    @auth()

    <checkout></checkout>

    @endauth

@endsection
