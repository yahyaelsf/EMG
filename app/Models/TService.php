<?php

namespace App\Models;

use App\Abstracts\LocalizableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TService extends LocalizableModel
{
    protected $table = "t_services";
    protected $fillable = ['s_title', 's_description'];
    protected $localizable = ['s_title', 's_description'];
}
