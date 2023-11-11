<?php

namespace App\Action;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Author;
use App\Models\Genre;

class FilterByRequest extends Request
{
    public function filter($query ,Request $request) {

        // $query = Item::limit(10);
        
        if ($request->filled('search')) {


            $req_search = $request->get('search');
            $query->where('name', 'like', "%$req_search%");


            if($query->count() === 0){
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

        return $query;

    }

}