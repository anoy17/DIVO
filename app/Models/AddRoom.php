<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddRoom extends Model
{
    protected $table = 'addrooms';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'roomname', 'roomnumber'];
}
