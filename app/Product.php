<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'id',
        'title',
        'photo',
        'retail_price',
        'wholesale_price',
        'count',
        'category_id',
        'storage_id',
        'partner_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function rootProducts(){
        return $this->with('categories', 'partner', 'storage')->paginate(6);
    }
}

