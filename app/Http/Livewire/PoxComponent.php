<?php

namespace App\Http\Livewire;

use App\Models\Device;
use Livewire\Component;

class PoxComponent extends Component
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
		$bpm = $this->device->getTelemetryData('bpm');
		$spo2 = $this->device->getTelemetryData('spo2');
		$bpm_series = ['name' => 'Beats per Minute', 'data' => $bpm];
		$spo2_series = ['name' => 'Oxygen Concentration', 'data' => $spo2];

		return view('livewire.pox-component')->with([
			'series' => [$bpm_series, $spo2_series],
			'chartId' => 'pox_' . $identifier_r,
			'identifier' => $identifier_r
		]);
	}
}
