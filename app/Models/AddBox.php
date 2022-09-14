<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBox extends Model
{
    protected $table = 'addboxes';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'room', 'rack','boxname','boxnumber'];
}
