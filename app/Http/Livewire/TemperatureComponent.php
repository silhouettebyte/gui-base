<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;

class TemperatureComponent extends Component
{
	public $firstRun = true;
	/**
	 * @var Device|mixed
	 */
	public $device;

	public function mount(Device $device)
	{
		$this->device = $device;
	}

	public function render()
	{
		$identifier_r = str_replace(':', '', $this->device->identifier);
		$temperature = $this->device->getTelemetryData('temperature');
		$series = ['name' => 'Temperature Data', 'data' => $temperature];
		return view('livewire.temperature-component')->with([
			'series' => [$series],
			'chartId' => 'temperature_' . $identifier_r,
			'identifier' => $identifier_r,
		]);
	}
}
