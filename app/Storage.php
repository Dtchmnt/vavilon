<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Storage extends Model
{
    protected $table = 'storage';

    protected $fillable = [
        'id',
        'title',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'storage_id');
    }

    public function rootStorages(){
        $data = DB::table('storage')->paginate(7);
        return $data;
    }

}

