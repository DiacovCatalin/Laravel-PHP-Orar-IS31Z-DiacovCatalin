<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupProfile extends Model
{

    use HasFactory;
    protected $table = 'group_profiles';
    protected $fillable = ['name'];
}
