<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\Author;
use App\Models\Genre;

use Illuminate\Http\Request;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\getBelongsToRelation;



use Illuminate\Database\Query\JoinClause;



use Illuminate\Support\Facades\Auth;

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

        //  SORT AND FILTER
        $req_search = null;

        $query = Item::limit(10);

        if ($request->filled('search')) {
            $req_search = $request->get('search');
            $query->where('name', 'like', "%$req_search%");

           

            if($query->count() === 0){

                // where('authors.name', 'like', "%$req_search%")->

                // $query = Item::join('authors', 'authors.id', '=', 'items.author_id')->select('items.*');

                // $query->where('name', 'like', "%$req_search%");

                // $query = Item::join($req_search, 'authors', function (JoinClause $join) {
                //     $join->on('authors.id', '=', 'items.author_id')
                //         ->where('authors.name', 'like', "%$req_search%");
                // });

                $query = Item::query()->where('author_id', Author::select('id')->where('authors.name', 'like', "%$req_search%")->get()->toArray()); 
                
            }

        }
        
        if ($request->filled('genre_ids')) {
   
            $genres = Genre::where('id', $request->get('genre_ids'));
            $query = $genres->first()->items();
        }

        if ($request->filled('author_ids')) {
            $query->where('author_id', $request->get('author_ids'));
        }

        $items = $query->get();



        // SHOW FILTERS 

        $authors = Author::get();

        $genres = Genre::get();



        // CHECKED FOR UPDATE

        $req_author_ids = $request->get('author_ids') ? $request->get('author_ids') : array();
        $req_genre_ids = $request->get('genre_ids') ? $request->get('genre_ids') : array();

        // TEST

        // $item = Item::find(1);

        // foreach ($item->genres as $role) {
        //     dd($item->genres);
        // }


    
        return view('items', ['items' => $items, 'authors' => $authors, 'genres' => $genres, 'req_genre_ids' => $req_genre_ids, 'req_author_ids' => $req_author_ids, 'req_search' => $req_search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
