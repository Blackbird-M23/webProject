<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'type', 'description'];

    public function scopefilter($query, array $filters)
    {
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('type', 'like', '%' . request('search') . '%');
                    // ->orWhere('description', 'like', '%' . $search . '%'
        }
    }

}
