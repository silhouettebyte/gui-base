<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApexAreaChart extends Component
{
	public $chartId;
	public $series;
	public $suffix;
	public $device;

	public function mount($chartId, $series, $suffix, $identifier)
	{
		$this->chartId = $chartId;
		$this->series = $series;
		$this->suffix = $suffix;
		$this->device = $identifier;
	}

    public function render()
    {
        return view('livewire.apex-area-chart');
    }
}
