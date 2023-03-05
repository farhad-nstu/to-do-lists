<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'to_do_items';
    protected $fillable = ['item_name','status'];

    public function tasks() {
        return $this->hasMany(Task::class, 'item_id');
    }
}