<?php

namespace App\Models;

use App\Models\Items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wiv extends Model
{
    use HasFactory;

    protected $table = 'wiv';

    protected $fillable = [
        'received_at',
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->belongsToMany(Items::class, 'item_wiv', 'wiv_id', 'item_id')->withPivot('quantity','unit','amount','mrt_id','returned_qty');
    }
}