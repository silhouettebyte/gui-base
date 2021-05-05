<?php

namespace App\Observers;

use App\Models\Telemetry;
use Illuminate\Support\Facades\Log;
use PhpMqtt\Client\Facades\MQTT;


class TelemetryObserver
{
    /**
     * Handle the Telemetry "created" event.
     *
     * @param  \App\Models\Telemetry  $telemetry
     * @return void
     */
    public function created(Telemetry $telemetry)
    {
    	$topic = 'telemetry/' . str_replace(':', '', $telemetry->device->identifier);
		try {
			MQTT::publish($topic, $telemetry->toJson());
		} catch (\Exception $e)
		{
			Log::info('error', ['error' =>$e]);
		}
    }
    /**
     * Handle the Telemetry "updated" event.
     *
     * @param  \App\Models\Telemetry  $telemetry
     * @return void
     */
    public function updated(Telemetry $telemetry)
    {
        //
    }

    /**
     * Handle the Telemetry "deleted" event.
     *
     * @param  \App\Models\Telemetry  $telemetry
     * @return void
     */
    public function deleted(Telemetry $telemetry)
    {
        //
    }

    /**
     * Handle the Telemetry "restored" event.
     *
     * @param  \App\Models\Telemetry  $telemetry
     * @return void
     */
    public function restored(Telemetry $telemetry)
    {
        //
    }

    /**
     * Handle the Telemetry "force deleted" event.
     *
     * @param  \App\Models\Telemetry  $telemetry
     * @return void
     */
    public function forceDeleted(Telemetry $telemetry)
    {
        //
    }
}
