<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiv extends Model
{
    use HasFactory;

    protected $table = 'wiv';

    public function items()
    {
        return $this->belongsToMany(Wiv::class, 'item_wiv', 'item_id', 'wiv_id')->withPivot('quantity');
    }
}
