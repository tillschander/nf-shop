<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'address'];
 
    public function orderItems()
    {
      return $this->hasMany('App\OrderItem');
    }

    public function addItems(array $items)
    {
      foreach ($items as $item) {
        $this->orderItems()->updateOrCreate([
          'name'        => $item['name'],
          'description' => $item['description'],
          'qty'         => $item['qty'],
          'price'       => $item['price']
        ]);
      }
    }
}
