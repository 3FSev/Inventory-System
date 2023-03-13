<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Itemwiv extends Pivot
{
    use HasFactory;
    protected $table = 'item_wiv';
    public $timestamps = false;

    public function mrt()
    {
        return $this->belongsTo(Mrt::class);
    }
}
