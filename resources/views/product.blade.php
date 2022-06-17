@extends('layouts.frontend')

@section('content')

    <div>
         @if (isset($categories))
            @foreach ($categories as $category)

                    <div >
                        <h3>
                            <h2 >{{$category->name}}</h2>
                        </h3>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row row-cols-3 row-cols-md-1 g-4">
                                    @foreach ($products as $product)
                                    @if ($category->id == $product->categories_id)

                                        <div class="card col mb-3" style="width: 250px;">
                                            <img src="{{ asset('storage'.'/'.$product->image_name) }}" class="card-img-top img-thumbnail img-fluid" alt="Foto">
                                            <div class="card-body">
                                            <h5 class="card-title">{{$product->name}}</h5>
                                            <p class="card-text">{{$product->description}}</p>
                                            <p class="card-text">${{$product->sale_price}}</p>
                                            <add-component product-id="{{$product->id}}"
                                                user-id="{{auth()->user()->id ?? 0}}"/>
                                            </div>
                                        </div>

                                        @endif
                                        @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
                @endif
</div>

@endsection
