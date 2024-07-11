<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use \App\Traits\DataTableTrait;

    protected $fillable = [
        'name', 'country_code', 'country_num_code', 'language_code'
    ];

}
