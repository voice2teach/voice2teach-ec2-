<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $table="Tables";
    protected $fillable = [
        'ID', 'Table_Owner', 'Table_Name', 'Time',
    ];
}
