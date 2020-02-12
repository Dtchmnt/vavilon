<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'parent_id'
    ];
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0 , 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'),
            '-');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function ProductCategory(){
        return $this->hasMany($this, 'parent_id');
    }

    public function rootCategories(){
        return $this->where('parent_id', 0)->with('ProductCategory')->paginate(6);
    }
}

