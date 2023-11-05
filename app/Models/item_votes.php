<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_votes extends Model
{
    protected $table = 'item_votes';
    protected $primaryKey = 'item_voteid';
    protected $fillable =   [
                                'item_id',
                                'user_id'
                            ];
    use HasFactory;
}
