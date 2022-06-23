<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ["title", "slug", "categories_id", "user_id", 'type_id', 'image', "shopeelink", "description", "body"];
    // protected $guarded = ["id"];
    // protected $with = ['author', 'categories'] // eager loading

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where("title", "like", '%' . $search . '%')
                ->orWhere("body", "like", '%' . $search . '%')
        );

        $query->when(
            $filters['categories'] ?? false,
            fn ($query, $categories) =>
            $query->whereHas(
                'categories',
                function ($query) use ($categories) {
                    $query->where('slug', $categories);
                }
            )
        );
    }

    public function categories()
    {
        return $this->belongsTo(categories::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // for route binding with slug instead id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
