<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddWarehouse extends Model
{
    protected $table = 'addwarehouses';
    protected $primaryKey = 'id';
    protected $fillable = ['warehouse', 'company', 'email','phonenumber','location','status'];
}
