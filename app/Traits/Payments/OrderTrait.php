<?php
namespace App\Traits\Payments;
use App\Models\Order;


trait OrderTrait
{
  public function addOrder(array $data)
  {
      $order = Order::create($data);

      $data = [
        'order_id' => $order->id,
        'payment_order_id' => $order->order_id,
        'amount' => $order->amount
      ];

      $this->addPayment($data);
  }

//   public function getOrder($order_id){

//       return Order::where('payment_order_id', $order_id)->first();
//   }

}
