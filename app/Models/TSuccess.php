<?php

namespace App\Models;

use App\Abstracts\LocalizableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSuccess extends LocalizableModel
{
    protected $table = "t_success";
    protected $fillable = ['s_title', 's_description'];
    protected $localizable = ['s_title', 's_description'];
}
