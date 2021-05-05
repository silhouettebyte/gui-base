@component('mail::message')
# Abnormal Status Detected
## Please see data below

Heart Rate : {{  $bpm }} BPM
Oxygen Concentration : {{  $spo2 }}%
Temperature : {{  $temperature }} C

@endcomponent
