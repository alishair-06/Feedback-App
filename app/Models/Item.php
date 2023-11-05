<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'itemid';
    protected $fillable =   [
                                'item_title',
                                'item_discription',
                                'cat_id',
                                'user_id',
                                'vote'
                            ];
    use HasFactory;
}
