<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordre extends Model
{   
    protected $fillable=['codcl','codsh','codpay','total','status'];
    use HasFactory;
}
