<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Author;
use App\Models\Genre;

use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Relations\getBelongsToRelation;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Auth;


use App\Action\FilterByRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {


        $query = Item::limit(10);
        $FilterByRequest = new FilterByRequest;
        $query = $FilterByRequest->filter($query, $request);
        $items = $query->get();


        // SHOW FILTERS 
        $req_search = null;
        $req_search = $request->get('search'); // FOR SEARCH
        $authors = Author::get(); // FOR AUTHORS
        $genres = Genre::get(); // FOR GENRES


        // CHECKED FOR UPDATE IN FILTERS 
        $req_author_ids = $request->get('author_ids') ? $request->get('author_ids') : array();
        $req_genre_ids = $request->get('genre_ids') ? $request->get('genre_ids') : array();
    

        return view('items', [
            'items' => $items,
            'authors' => $authors, 'genres' => $genres,
            'req_genre_ids' => $req_genre_ids,
            'req_author_ids' => $req_author_ids,
            'req_search' => $req_search
        ]);
    }


    public function indexJson(Request $request)
    {


        $query = Item::limit(10);
        $FilterByRequest = new FilterByRequest;
        $query = $FilterByRequest->filter($query, $request);
        $items = $query->get();


        // SHOW FILTERS 
        $req_search = null;
        $req_search = $request->get('search'); // FOR SEARCH
        $authors = Author::get(); // FOR AUTHORS
        $genres = Genre::get(); // FOR GENRES


        // CHECKED FOR UPDATE IN FILTERS 
        $req_author_ids = $request->get('author_ids') ? $request->get('author_ids') : array();
        $req_genre_ids = $request->get('genre_ids') ? $request->get('genre_ids') : array();


        // dd($req_genre_ids);


        $items_array = $items->toArray();

        foreach ($items as $item_key => $item) {

            $items_array[$item_key]['author_name'] =  $item->author->name;

            foreach ($item->genres as $key => $genre) {

                $items_array[$item_key]['genres'][] = $genre->name; 
               
            }

        }

        // dd($items_array );

        $items = $items_array;

        $filter_array = [
            'authors' => $authors, 'genres' => $genres,
            'req_genre_ids' => $req_genre_ids,
            'req_author_ids' => $req_author_ids,
            'req_search' => $req_search
        ];

        $res =  [
            'items' => $items,
            'filter_array' => $filter_array
        ];
    
        return json_encode($res);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return json_encode($item);
    }

    /**
     * Display the specified resource.
     */
    public function check(Item $item)
    {

        if(!Auth::check()){

            $item = ['error' => 'Авторизуйтесь или Зарегиструйтесь'];

            return json_encode($item);

           
        }

        return json_encode($item);
    }

}
