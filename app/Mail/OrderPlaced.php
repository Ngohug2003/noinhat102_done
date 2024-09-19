<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;

    /**
     * Create a new message instance.
     *
     * @param array $orderDetails
     * @return void
     */
    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ngoviethung0911@gmail.com')
                    ->subject('Đơn hàng của bạn đã được đặt thành công')
                    ->view('email.order_notification')
                    ->with('orderDetails', $this->orderDetails);
    }
}
