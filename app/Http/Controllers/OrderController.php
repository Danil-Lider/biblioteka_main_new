<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order as Contact;


class OrderController extends Controller
{
     /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {

         // add to base
        $contact = new Contact();
        $contact->user_id = 1;
        $contact->item_id = 1;
        // $req->input('item_id');
        $contact->reserve = 1;
        $contact->book_is_given = 0;
        $contact->book_is_returned = 0;
        $contact->reserve_day =  date("Y-m-d");
        //$req->input('reserve_day');
        // $contact->book_is_given_start = 1;
        // $contact->book_is_given_end = 1;
        $contact->save();

    }
}
