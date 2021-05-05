<?php

namespace App\Http\Controllers;

use App\Mail\AbnormalStat;
use App\Models\Device;
use App\Models\Telemetry;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpMqtt\Client\Facades\MQTT;

class DeviceController extends Controller
{
    public function show(Device $device)
	{
		$columnChartModel =
			(new ColumnChartModel())
				->setTitle('Expenses by Type')
				->addColumn('Food', 100, '#f6ad55')
				->addColumn('Shopping', 200, '#fc8181')
				->addColumn('Travel', 300, '#90cdf4')
		;
		return view('devices.show', [
			'device' => $device,
			'bpm' => $device->getTelemetryData('bpm'),
			'spo2' => $device->getTelemetryData('spo2'),
			'temperature' => $device->getTelemetryData('temperature'),
			'columnChartModel' => $columnChartModel
		]);
	}

	public function index()
	{
		$devices = Device::orderBy('status')->get();
		return view('devices.index', ['devices' => $devices]);
	}

	public function telemetry(Device $device, string $attribute, int $count = 10)
	{

	}

	public function acquire($identifier, Request $request)
	{
		$device = Device::firstOrCreate(
			['identifier' => $identifier],
			['status' => 'active']
		);

		$telemetry = $device->telemetries()->create([
			'bpm' => round($request['bpm'], 2),
			'spo2' => round($request['spo2'], 2),
			'temperature' => round($request['temperature'], 2),
		]);

		if($request['bpm'] > 100 || $request['bpm'] < 55)
		{
			Mail::to('doctor@doctor.com')->queue(new AbnormalStat($request['bpm'], $request['spo2'], $request['temperature']));
		}

		return $telemetry;
	}
}
