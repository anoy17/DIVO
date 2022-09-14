<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddRack extends Model
{
    protected $table = 'addracks';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'roomnumber', 'rackname', 'racknumber'];
}
