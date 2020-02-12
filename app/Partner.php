<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Partner extends Model
{
    protected $table = 'partner';

    protected $fillable = [
        'id',
        'name',
        'number',
        'email',
        'address',
        'status',
        'inn',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'partner_id');
    }

    public function rootPartners(){
        $data = DB::table('partner')->paginate(10);
        return $data;
    }

}

