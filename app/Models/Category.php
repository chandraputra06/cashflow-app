<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ['name'];  //fungsinya untuk mengambil seluruh field yang ada di category kecuali name
    // protected $fillable = ['name']; // fungsinya hanya mengambil field name saja
}
