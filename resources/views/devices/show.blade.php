@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card prod-p-card bg-behance background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Patient Name</h6>
                            <h3 class="m-b-0 text-white">Archimedes A. Valencia II</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">person</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card prod-p-card bg-primary background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Device Identifier</h6>
                            <h3 class="m-b-0 text-white">{{ $device->identifier }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">vpn_key</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $card = ['ACTIVE' => 'green', 'INACTIVE' => 'red', 'IDLE' => 'blue'];
        @endphp
        <div class="col-sm-3">
            <div class="card prod-p-card bg-{{$card[$device->status]}}-300 background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Device Status</h6>
                            <h3 class="m-b-0 text-gray-300">{{ $device->status }}</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">devices_other</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9 my-auto">
                            <h5>Pulse Oximeter Telemetry Data</h5>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-sm btn-outline-primary float-right">Show History</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <livewire:pox-component :device="$device">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9 my-auto">
                            <h5>Temperature Telemetry Data </h5>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-sm btn-outline-primary float-right">Show History</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <livewire:temperature-component :device="$device">
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    @livewireChartsScripts
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js" type="text/javascript"></script>
    <script>
        const mqtt_options = {
            keepalive: 60,
            clientId: 'testid',
            protocolId: 'MQTT',
            protocolVersion: 4,
            clean: true,
            reconnectPeriod: 1000,
            connectTimeout: 30 * 1000,
            will: {
                topic: 'WillMsg',
                payload: 'Connection Closed abnormally..!',
                qos: 0,
                retain: false
            },
        }
        console.log('Connecting mqtt client')
        const mqtt_client = mqtt.connect('ws://broker.emqx.io:8083/mqtt', mqtt_options);

        mqtt_client.on('error', (err) => {
            console.log('Connection error: ', err)
            mqtt_client.end()
        });

        mqtt_client.on('connect', () => {
            console.log('Client connected')
        })
        mqtt_client.subscribe('telemetry/{{ str_replace(':', '', $device->identifier) }}', { qos: 0 });

        mqtt_client.on('message', (topic, message, packet) => {
            dt = JSON.parse(message.toString());
            console.log(dt);
            pox_chart.appendData([
                {
                    data: [dt.bpm]
                },
                {
                    data: [dt.spo2]
                }
            ]);
            temperature_chart.appendData([
                {
                    data: [dt.temperature]
                }
            ]);
        })
    </script>
@endsection

@section('css')

@endsection