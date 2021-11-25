<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siteinfo extends Model
{
    protected $table = "siteinfos";
    protected $fillable = ['title','copyright_text','logo','fevicon','meta_description','meta_keyword'];
}
