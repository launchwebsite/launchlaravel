<?php
namespace App\Mail;

use App\Models\Vendor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorOnHoldMail extends Mailable
{
    use Queueable, SerializesModels;

    public Vendor $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function build()
    {
        return $this->subject('Your Vendor Account Has Been Put On Hold')
            ->view('emails.vendor-on-hold');
    }
}
