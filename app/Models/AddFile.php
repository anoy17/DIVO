<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFile extends Model
{
    protected $table = 'addfiles';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'roomnumber', 'racknumber','boxnumber','filename','filenumber'];
}
