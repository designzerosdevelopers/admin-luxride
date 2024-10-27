<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $payment;
    public $recipientType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $recipientType = 'user', $payment= 'unpaid')
    {
        $this->user = $user;
        $this->payment = $payment;
        $this->recipientType = $recipientType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ($this->recipientType === 'user') {
            if ($this->payment === 'unpaid') {
                $subject = 'Your inquiry has been sent successfully!';
            } else {
                $subject = 'Your Payment has been confirmed!';
            }
        } else {
            if ($this->payment === 'unpaid') {
                $subject = 'A new inquiry has been received!';

            } else {
                $subject = 'A new paid inquiry has been received!';

            }
        }
        $view = $this->recipientType === 'admin' ? 'mail.booking.to-admin' : 'mail.booking.to-user';
    
        return $this->from('sender_email@example.com')
                    ->subject($subject)
                    ->view($view)
                    ->with(['user' => $this->user, 'heading' => $subject]);
    }
    
}
