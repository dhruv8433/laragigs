<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $filelable = ['title', 'company', 'location', 'website', 'email','description', 'tags'];

    public function scopeFilter($query, array $filters) {
        // ?? -> null coalescing opeator it means if that is not false then ...
        if($filters['tag'] ?? false){
            // search for whatever in tag
            $query -> where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false){
            // search for whatever in tag
            $query -> where('title', 'like', '%' . request('search') . '%')
            ->onWhere('descrription', 'like', '%' . request('search') . '%')
            ->onWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
}
