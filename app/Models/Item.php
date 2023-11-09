<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Item extends Model
{
    use HasFactory;

    public function author(): BelongsTo
   {
       return $this->BelongsTo(Author::class);
   }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
