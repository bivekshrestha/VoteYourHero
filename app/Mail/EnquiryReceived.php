<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @param $enquiry
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.enquiry.received')
            ->subject('Enquiry Received')
            ->to('heroesjourneytoeverest@gmail.com');
    }
}
