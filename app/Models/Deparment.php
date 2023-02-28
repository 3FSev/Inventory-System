<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
    use HasFactory;
    protected $table = 'department';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
