<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;

use DB;


class OrderController extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function showMyOrders(){
        $orders = Order::where('user_id', auth()->user()->id)->get();

        // dd($orders);

        return view('orders', [
            'orders' => $orders
        ]);
    }

    public function updateItems() {
        $orders = Order::where('reserve', 0)->where('book_is_given', 0)->where('book_is_returned', 1)->get();
        
        foreach ($orders as $key => $value) {

            $item_id = $value->item_id;

            Item::where('id', $item_id)->update(['is_available' => 1]);

            // $update[] = array('id' => $value->item_id, 'is_available' => 1);
          
            // $items_ids[] = $value->item_id;
        }
       

        // DB::table('items')->upsert( $update, ['id'], ['is_available']);

    }

    public function create(Request $req)
    {
        $item_id = $req->input('item_id');

         // check is user
         if(!auth()->user()){

            $result = ['error' => 'Авторизуйтесь или Зарегиструйтесь'];
            return json_encode($result);
        }

        // check is item_id
        if(!$item_id){

            $result = ['error' => 'Item id not given'];
            return json_encode($result);
        }

        // check is available
        $item = Item::where('id', $item_id)->get()->first();
        if($item->is_available === 0){

            $result = ['error' => 'Книга не доступна для бронирования (уже забронирована или выдана)'];
            return json_encode($result);
        }

         // add to base
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->item_id = $item_id;
        $order->reserve = 1;
        $order->book_is_given = 0;
        $order->book_is_returned = 0;
        $order->reserve_day = $req->input('reserve_day');
        $order->save();

        // change is available
        $item->is_available = 0;
        $item->save();


        $book_name = $item->name;
        $result = [
            'success' => 'Книга: ' . $book_name . ', Успешно забронирована на дату: ' . $order->reserve_day
        ];

        
        
        return  response()->json($result);

    }
}
