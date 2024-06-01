<?php

namespace App\Models;

use App\Abstracts\LocalizableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TNumber extends LocalizableModel
{
    protected $table = "t_numbers";
    protected $fillable = ['s_title','s_number', 's_description'];
    protected $localizable = ['s_title', 's_number', 's_description'];
}
