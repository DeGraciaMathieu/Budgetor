<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model 
{
    protected $table = 'expenses';

    public $timestamps = true;

    protected $fillable  = ['name','amount','paid_at','description','category_id'];   

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'paid_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
