<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'reviewid';
    protected $fillable =   [
                                'user_id',
                                'rev_msg',
                                'rev_featured',
                                'child_of',
                                'rev_date'
                            ];
    use HasFactory;
}
