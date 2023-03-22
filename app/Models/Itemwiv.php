<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Itemwiv extends Pivot
{
    protected $table = 'item_wiv';
    public $timestamps = false;
    public function items()
    {
        return $this->belongsTo(Items::class);
    }

    public function wivs()
    {
        return $this->belongsTo(Wiv::class);
    }
}
