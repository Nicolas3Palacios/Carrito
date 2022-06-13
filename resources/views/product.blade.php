@extends('layouts.frontend')

@section('content')

<section id="product" class="product-area pt-100 pb-130 mt-25">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="collection-menu text-center mt-30">
                    <h4 class="collection-tilte">OUR PRODUCTS</h4>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @if (isset($categories))
                            @foreach ($categories as $category)
                            <a class="active" id="v-pills-{{$category->name}}-tab" data-toggle="pill" href="#v-pills-{{$category->name}}" role="tab" aria-controls="v-pills-{{$category->name}}" >{{$category->name}}</a>
                            @endforeach
                        @endif

                        
                    </div> <!-- nav -->
                </div> <!-- collection menu -->
            </div>
            @if (isset($categories))
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($categories as $category)
                        <div class="tab-pane fade show active" id="v-pills-{{$category->name}}" role="tabpanel" aria-labelledby="v-pills-{{$category->name}}-tab">
                            @if (isset($products))
                            @foreach ($products as $product)
                                <div class="product-items mt-30">
                                    <div class="row product-items-active">
                                                @if ($product->category_name == $category->name)
                                                <div class="col-md-4">
                                                    <div class="single-product-items">
                                                        <div class="product-item-image">
                                                            <a href="#"><img src="{{ asset('storage'.'/'.$product->image_name)}}" alt="Product"></a>
                                                        </div>
                                                        <div class="product-item-content text-center mt-30">
                                                            <h5 class="product-title"><a href="#">{{$product->name}}</a></h5>
                                                            <ul class="rating">
                                                                <li><i class="lni-star-filled"></i></li>
                                                                <li><i class="lni-star-filled"></i></li>
                                                                <li><i class="lni-star-filled"></i></li>
                                                                <li><i class="lni-star-filled"></i></li>
                                                            </ul>
                                                            <span class="regular-price">${{$product->sale_price}}</span>
                                                            {{-- <span class="discount-price">${{$product->price }}</span> --}}
                                                            <add-component product-id="{{$product->id}}"
                                                                user-id="{{auth()->user()->id ?? 0}}"/>
                                                        </div>
                                                    </div> <!-- single product items -->
                                                </div>                                                
                                                @endif
                                                
                                            </div> <!-- row -->
                                        </div> <!-- product items -->
                                        @endforeach
                                @endif
                        </div> <!-- tab pane -->
                        @endforeach
                        
                       
                </div> <!-- tab content -->
            </div>
            @endif

        </div> <!-- row -->

    </div> <!-- container -->
</section>



@endsection
