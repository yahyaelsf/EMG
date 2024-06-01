<?php

namespace App\Models;

use App\Models\BaseModel;

class TSetting extends BaseModel
{
    protected $table = "t_system_settings";

    protected $fillable = [
        's_key',
        's_value',
        'i_data_type',
        'b_enabled',
    ];
}
