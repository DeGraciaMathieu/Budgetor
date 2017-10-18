<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model 
{
    use SoftDeletes;

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable  = ['name','amount' ,'budget_id'];

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'category_id');
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
