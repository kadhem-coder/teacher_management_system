<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
  //  make sure in fillable
    protected $fillable = [
        'name', 'phoneNumber' , 'dateOfBirth' , 'address'
    ];
}
 