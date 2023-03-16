<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    public function items()
    {
        return $this->belongsToMany(Status::class, 'item_mrt', 'mrt_id', 'item_id')->withPivot('quantity','amount','status_id');
    }
}