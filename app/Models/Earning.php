<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earning extends Model 
{
    use SoftDeletes;

    protected $table = 'earnings';
    public $timestamps = true;
    protected $fillable  = ['name', 'amount' ,'budget_id', 'comment'];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
