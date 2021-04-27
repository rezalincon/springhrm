<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Expensive extends Model
{
    protected $fillable = [
        'category_id',
        'list_qty_price_total',
        'total_expense',
        'expense_date',
        'comment'
    ];
    public function category(){

         return $this->belongsTo(Category::class, 'category_id', 'id');

     }
}
