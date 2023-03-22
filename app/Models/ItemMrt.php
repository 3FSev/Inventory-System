<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemMrt extends Pivot
{
    protected $table = 'item_mrt';
    public $timestamps = false;
    protected $fillable = [
        'mrt_id',
        'item_id',
        'quantity',
        'amount',
        'usable',
        'unusable',
    ];

    public function items()
    {
        return $this->belongsTo(Items::class);
    }

    public function mrt()
    {
        return $this->belongsTo(Mrt::class);
    }
}
