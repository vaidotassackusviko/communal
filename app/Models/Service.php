<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\House;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'house_id'];

    protected $table = 'services';

    protected $attributes = [
        'price' => 0,
    ];
/*
    public function houses()
    {
        return $this->belongsToMany(House::class);
    }
*/
    public function house()
    {
        return $this->belongsTo(House::class);
    }
}



