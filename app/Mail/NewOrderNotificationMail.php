<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Collection;

class NewOrderNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderItems;

    /**
     * @param Order $order
     * @param Collection $orderItems
     */
    public function __construct(Order $order, Collection $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
    }

    public function build()
    {
        return $this
            ->subject('Pesanan Baru #' . $this->order->order_code)
            ->view('emails.new-order-notification');
    }
}
