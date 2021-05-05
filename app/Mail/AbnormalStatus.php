<?php

namespace App\Mail;

use App\Models\Telemetry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbnormalStatus extends Mailable
{
    use Queueable, SerializesModels;

	/**
	 * @var Telemetry
	 */
	public $telemetry;

	/**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Telemetry $data)
    {
        $this->telemetry = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pulse-notification@pulso.com')
					->view('emails.abnormal');
    }
}
