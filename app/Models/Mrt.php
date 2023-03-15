<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mrt extends Model
{
    use HasFactory;

    protected $table = 'mrt';
    public $timestamps = false;

    protected $fillable = [
        'date',
    ];
    public function itemWivs()
    {
        return $this->hasMany(ItemWiv::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function items()
    {
        return $this->belongsToMany(Items::class, 'item_mrt', 'mrt_id', 'item_id')->withPivot('quantity','amount');
    }
}
