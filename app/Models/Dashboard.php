<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'recents';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'roomnumber', 'racknumber','boxnumber','filename','filenumber'];
}
