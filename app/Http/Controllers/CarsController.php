<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if(!$request->get('product_id')){
            return [
                'message'=> 'Product returned',
                'items'=> Cart::where('user_id', auth()->user()->id)->sum('quantity'),
            ];
        }
        //check user car items


        $product = Product::find($request->get('product_id'));
        $productFoundInCar = Cart::where('product_id', $request->get('product_id'))->pluck('id');




        if ($productFoundInCar->isEmpty()) {
            //Agregar al carro
            $cart = Cart::create([
                'user_id' => auth()->user()->id,
                'product_id'=> $product->id,
                'quantity' => 1,
                'price' => $product->sale_price,
            ]);
        }else {
            //Sumar el producto
            $cart = Cart::where('product_id',$request->get('product_id'))->increment('quantity');
        }




        if ($cart) {
            return [
                'message'=> 'Product added',
                'items'=> Cart::where('user_id', auth()->user()->id)->sum('quantity'),
            ];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     *
     */
    public function getCarItemsForCheckout()
    {
        $carItems = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        $finalData = [];
        $amount = 0;


        if (isset($carItems)) {

            foreach ($carItems as $carItem) {

                if ($carItem->product) {


                    foreach($carItem->product as $carProduct)
                    {
                        if ($carProduct->id == $carItem->product_id) {
                            $finalData[$carItem->product_id]['id'] = $carProduct->id;
                            $finalData[$carItem->product_id]['name'] = $carProduct->name;
                            $finalData[$carItem->product_id]['quantity'] = $carItem->quantity;
                            $finalData[$carItem->product_id]['sale_price'] = $carItem->price;
                            $finalData[$carItem->product_id]['total'] = $carItem->price * $carItem->quantity;
                            $amount += $carItem->price * $carItem->quantity;
                            $finalData['totalAmount'] = $amount;
                        }
                    }
                }
                // var_dump($carItem->product_id);
                // var_dump($carItem->product->name);
                // var_dump($carItem->sale_price);
                // var_dump($carItem->quantity);
            }

        }
        return response()->json($finalData);
    }

    /*
    *
    */
    public function processPayment(Request $request){

        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $address = $request->get('address');
        $city = $request->get('city');
        $state = $request->get('state');
        $zipCode = $request->get('zipCode');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $county = $request->get('county');
        $cardType = $request->get('cardType');
        $expirationMonth = $request->get('expirationMonth');
        $expirationYear = $request->get('expirationYear');
        $cvv = $request->get('cvv');
        $cardNumber = $request->get('cardNumber');

    }
}
