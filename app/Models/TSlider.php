<?php

namespace App\Models;

use App\Abstracts\LocalizableModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSlider extends LocalizableModel
{
     protected $table = "t_sliders";
    protected $fillable = ['s_title'];
    protected $localizable = ['s_title'];
}
