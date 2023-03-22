<?php

namespace App\Models;

use App\Models\Wiv;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'item_name',
        'quantity',
        'category_id',
        'price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function wivs()
    {
        return $this->belongsToMany(Wiv::class, 'item_wiv', 'item_id', 'wiv_id')->withPivot('quantity','amount');
    }

    public function mrt()
    {
        return $this->belongsToMany(Mrt::class, 'item_mrt', 'item_id', 'mrt_id')->withPivot('quantity','amount','usable','unusable');
    }
}
