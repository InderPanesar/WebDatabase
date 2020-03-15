<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DenyRequest extends Mailable
{
    use Queueable, SerializesModels;

	public $itemid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($itemid)
    {
        $this->itemid = $itemid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.denyrequest')->with($this->itemid);
    }
}
