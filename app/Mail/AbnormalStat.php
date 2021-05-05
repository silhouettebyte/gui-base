<?php

namespace App\Mail;

use App\Models\Telemetry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbnormalStat extends Mailable
{
    use Queueable, SerializesModels;

    public $bpm, $spo2, $temperature;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bpm, $spo2, $temperature)
    {
		$this->bpm = $bpm;
		$this->spo2 = $spo2;
		$this->temperature = $temperature;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pulse-notification@pulso.com')
			->markdown('emails.abstat');
    }
}
