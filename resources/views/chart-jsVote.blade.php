@extends('userheader')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <div class="container-fluid"dir="rtl">


        <div class="card pricing-box">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-2"> نتائج التصويت </h5>
                        <hr>
                    </div>

                </div>

                <div class="chart-container">
                    <div class="pie-chart-container">
                        <div style="height :300px; width:500px;padding-right:80px;">
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

    <!-- javascript -->

    <script>
        $(function() {
            //get the pie chart canvas
            var cData = JSON.parse(`<?php echo $chart_data; ?>`);
            var ctx = $("#pie-chart");

            //pie chart data
            var data = {
                labels: cData.label,
                datasets: [{
                    label: "Users Count",
                    data: cData.data,
                    backgroundColor: [
                        "rgba( 219, 112, 147, 1 )",

                        "rgba( 70, 130, 180, 1 )",
                        "rgba( 205, 133, 63, 1 )",
                        "rgba( 221, 160, 221, 1 )",
                        "rgba( 32, 178, 170, 1 )",
                        "rgba( 199, 21, 133, 1 )"

                    ],
                    borderColor: [

                    "rgba( 219, 112, 147, 1 )",

                        "rgba( 70, 130, 180, 1 )",
                        "rgba( 205, 133, 63, 1 )",
                        "rgba( 221, 160, 221, 1 )",
                        "rgba( 32, 178, 170, 1 )",
                        "rgba( 199, 21, 133, 1 )"

                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1]
                }]
            };

            //options
            var options = {
                responsive: true,

                // title: {
                //   display: true,
                //   position: "top",
                //   text: "Last Week Registered Users -  Day Wise Count",
                //   fontSize: 18,
                //   fontColor: "#111"
                // },
                legend: {
                    display: true,
                    position: "bottom",

                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }

            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "pie",
                data: data,
                options: options
            });

        });
    </script>
@endsection
