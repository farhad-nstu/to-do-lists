<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'to_do_tasks';
    protected $fillable = ['item_id','task_name','status'];

    public function item() {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
