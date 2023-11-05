<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catigory extends Model
{
    protected $table = 'catigories';
    protected $primaryKey = 'catid';
    protected $fillable =   [
                                'cat_title',
                                'cat_discription',
                                'cat_status'
                            ];
    //$timestamps = false;
    use HasFactory;
}
