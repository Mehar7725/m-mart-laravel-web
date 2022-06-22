<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $old_cartItems = Cart::where('user_id',Auth::id())->get();
     foreach ($old_cartItems as $item) {
         if (!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists()) {
             $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
            $removeItem->delete();
  
          
            }
     }
     $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }
    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->postelcode = $request->postelcode;
        $order->postelcode = $request->postelcode;
        $order->tracking_no = 'mhr'.rand(111111,999999);
        $order->save();

        $order->id;

        $cartItems = Cart::where('user_id',Auth::id())->get();

        foreach ($cartItems as $item) {
            
            OrderItem::create([

                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,
            ]);

        }

        if (Auth::user()->address1 == Null) {
            $user = User::where('id',Auth::id())->first();

            $user->name = $request->fname;
            $user->lname = $request->lname;
          
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->postelcode = $request->postelcode;
            $user->postelcode = $request->postelcode;
            $user->update();
        }
     
    }
}
