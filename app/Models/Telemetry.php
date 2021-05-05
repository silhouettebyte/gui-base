<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telemetry extends Model
{
    use HasFactory;

	protected $table = 'telemetries';

	protected $fillable = ['bpm', 'spo2', 'temperature'];

	public function device()
	{
		return $this->belongsTo(Device::class);
	}
}
