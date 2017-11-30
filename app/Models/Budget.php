<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model 
{
    use SoftDeletes;

    protected $table = 'budgets';
    public $timestamps = true;
    protected $fillable  = ['name','amount' ,'started_at' ,'ended_at'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'budget_id');
    }

    public function earnings()
    {
        return $this->hasMany(Category::class, 'budget_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function getAllAmountAttribute()
    {
        $stocksAmount = $this->stocks()->where('cost', false)->sum('amount');

        return $this->attributes['amount'] + $stocksAmount;
    }
}
