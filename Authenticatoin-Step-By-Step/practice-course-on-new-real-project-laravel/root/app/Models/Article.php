<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // send data that will be accepts to the database
    // if we want to send data to the database we should use the fillable property
    // the only keys that i written in the fillable property will be accepted which mean send to the database
    protected $fillable = ['title', 'body'];
}
