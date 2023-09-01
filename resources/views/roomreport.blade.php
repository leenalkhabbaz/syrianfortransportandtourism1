@extends('userheader')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<div class="container-fluid" dir="rtl">
    <div class="row">
        @foreach($data as $roomData)
            <div class="col-md-6">
                <div class="card pricing-box">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-2"> {{ $roomData['roomName'] }}</h5>
                                <hr>
                            </div>
                        </div>

                        <div class="chart-container">
                            <div class="line-chart-container">
                                <canvas id="line-chart-{{ $loop->iteration }}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- JavaScript -->
<script>
    $(function () {
        @foreach($data as $roomData)
        // Get the line chart canvas
        var ctx{{ $loop->iteration }} = $("#line-chart-{{ $loop->iteration }}");

        // Chart data
        var chartData{{ $loop->iteration }} = {!! json_encode($roomData['chartData']) !!};
        var months{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.label);
        var values{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.data);

        // Line chart data
        var data{{ $loop->iteration }} = {
            labels: months{{ $loop->iteration }},
            datasets: [
                {
                    label: "إحصائيات الشهور",
                    data: values{{ $loop->iteration }},
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    borderColor: "rgba(0, 123, 255, 1)",
                    borderWidth: 1
                }
            ]
        };

        // Options
        var options{{ $loop->iteration }} = {
            responsive: true,
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            }
        };

        // Create Line Chart class object
        var chart{{ $loop->iteration }} = new Chart(ctx{{ $loop->iteration }}, {
            type: "line",
            data: data{{ $loop->iteration }},
            options: options{{ $loop->iteration }}
        });
        @endforeach
    });
</script>

@endsection
