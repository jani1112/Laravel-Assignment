<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Register extends Model
{
    use HasFactory;

    protected $table = "registers";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    //Accessor -> Uppercase the name while access the name from the model

    // public function getNameAttribute($value){
        // return strtoupper($value);
    // }

    //Mutator -> Capatilize the name before inserting in the database
    // public function setNameAttribute($value){
        // $this->attributes['name'] = ucfirst($value);
    // }
}
