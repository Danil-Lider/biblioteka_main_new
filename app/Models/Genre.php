<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
     public function items()
     {
         return $this->belongsToMany(Item::class);
     }
}
