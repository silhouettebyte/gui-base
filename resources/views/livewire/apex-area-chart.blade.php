<div id="{!! $chartId !!}"></div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const {{ $suffix }}_options = {
        series: [
            @foreach($series as $plot)
            {
                name: "{{ $plot['name'] }}",
                data: {!! $plot['data'] !!}
            },
            @endforeach
        ],
        chart: {
            height: 200,
            type: 'area'
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            labels: {
                show: false
            },
            tooltip: {
                enabled: false,
            },
        },
        tooltip: {
            x: {
                show: false
            }
        }
    };

    const {{ $suffix }}_chart = new ApexCharts(document.getElementById(`{!! $chartId !!}`), {{$suffix}}_options);
    {{ $suffix }}_chart.render();
</script>
@endpush