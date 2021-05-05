<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public function telemetries()
	{
		return $this->hasMany(Telemetry::class);
	}

	public function getTelemetryData($attribute)
	{
		return collect($this->telemetries()->orderBy('created_at', 'asc')->get(['created_at', $attribute])->map(function($data) use($attribute) {
			return $data->$attribute;
		}));
	}
}
