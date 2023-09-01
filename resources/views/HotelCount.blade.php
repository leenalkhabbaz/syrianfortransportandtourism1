@extends('userheader')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <div class="container-fluid" dir="rtl">
        <div class="row">
            @foreach($data as $hotelData)

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="d-flex align-items-start mb-4 mb-lg-0">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">{{ $hotelData['hotelName'] }}</h5>
                            </div>
                        </div>

                        <div class="line-chart-container">
                            <canvas id="line-chart-{{ $loop->iteration }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card"style="width: 400px;">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-2"> عدد الحجوزات لكل غرفة </h5>
                            </div>
                        </div>

                        <div class="doughnut-chart-container">
                            <canvas id="doughnut-chart-{{ $loop->iteration }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>



                <script>
                    $(function () {
                        var ctx{{ $loop->iteration }} = $("#line-chart-{{ $loop->iteration }}");

                        var chartData{{ $loop->iteration }} = {!! json_encode($hotelData['chartData']) !!};
                        var months{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.label);
                        var values{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.data);

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

                        var chart{{ $loop->iteration }} = new Chart(ctx{{ $loop->iteration }}, {
                            type: "line",
                            data: data{{ $loop->iteration }},
                            options: options{{ $loop->iteration }}
                        });

                        var ctxDoughnut{{ $loop->iteration }} = $("#doughnut-chart-{{ $loop->iteration }}");

                        var roomReservations{{ $loop->iteration }} = @json($roomReservations[$hotelData['hotelName']]);

                        var roomLabels{{ $loop->iteration }} = roomReservations{{ $loop->iteration }}.map(reservation => reservation.room_name);
                        var roomData{{ $loop->iteration }} = roomReservations{{ $loop->iteration }}.map(reservation => reservation.total);

                        var dataDoughnut{{ $loop->iteration }} = {
                            labels: roomLabels{{ $loop->iteration }},
                            datasets: [
                                {
                                    data: roomData{{ $loop->iteration }},
                                    backgroundColor: [
                                        "rgba( 205, 133, 63, 1 )",
                                        "rgba( 32, 178, 170, 1 )",
                                        "rgba( 199, 21, 133, 1 )",
                                        "rgba( 219, 112, 147, 1 )",
                                        "rgba( 221, 160, 221, 1 )",
                                        "rgba( 70, 130, 180, 1 )"
                                    ],
                                    borderColor:[
                                "rgba( 205, 133, 63, 1 )",
                                        "rgba( 32, 178, 170, 1 )",
                                        "rgba( 199, 21, 133, 1 )",
                                        "rgba( 219, 112, 147, 1 )",
                                        "rgba( 221, 160, 221, 1 )",
                                        "rgba( 70, 130, 180, 1 )"
                            ],
                                    borderWidth: 1
                                }
                            ]
                        };

                        var optionsDoughnut{{ $loop->iteration }} = {
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

                        var chartDoughnut{{ $loop->iteration }} = new Chart(ctxDoughnut{{ $loop->iteration }}, {
                            type: "doughnut",
                            data: dataDoughnut{{ $loop->iteration }},
                            options: optionsDoughnut{{ $loop->iteration }}
                        });
                    });
                </script>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card" dir="rtl">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <h5 class="card-title mb-2">الحجوزات الواردة الأخيرة</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table project-list-table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle" style="color: #123A5D;">اسم الزبون</th>
                                        <th class="align-middle" style="color: #123A5D;">رقم الزبون</th>
                                        <th class="align-middle" style="color: #123A5D;">المبلغ</th>
                                        <th class="align-middle" style="color: #123A5D;">اسم الفندق</th>
                                        <th class="align-middle" style="color: #123A5D;">رقم الغرفة</th>
                                        <th class="align-middle" style="color: #123A5D;">تاريخ الدخول</th>
                                        <th class="align-middle" style="color: #123A5D;">تاريخ الخروج</th>
                                        <th class="align-middle" style="color: #123A5D;">تأكيد الدفع</th>
                                        <th class="align-middle" style="color: #123A5D;">رفض الحجز</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->user_name }}</td>
                                            <td>{{ $book->user_phone }}</td>
                                            <td>{{ $book->total_price }}</td>
                                            <td>{{ $book->hotel->name }}</td>
                                            <td>{{ $book->room_name }}</td>
                                            <td>{{ $book->start_date }}</td>
                                            <td>{{ $book->end_date }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                @if($book->find($book->id)->confirmed)
                                                    <button type="submit" class="btn btn-success" disabled>تم الدفع</button>
                                                @else
                                                    <a href="/reservationacceptedRoom/{{$book->id}}" class="btn btn-soft-dark"
                                                        type="submit">
                                                        دفع
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="/reservationRoomdelete/{{$book->id}}" class="btn btn-soft-danger"
                                                        type="submit">
                                                        حذف
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="Content" class="searchdata"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            @foreach($data as $hotelData)
                var ctx{{ $loop->iteration }} = $("#line-chart-{{ $loop->iteration }}");
                var ctxDoughnut{{ $loop->iteration }} = $("#doughnut-chart-{{ $loop->iteration }}");

                var chartData{{ $loop->iteration }} = {!! json_encode($hotelData['chartData']) !!};
                var months{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.label);
                var values{{ $loop->iteration }} = chartData{{ $loop->iteration }}.map(item => item.data);

                var roomReservations{{ $loop->iteration }} = @json($roomReservations[$hotelData['hotelName']]);
                var roomLabels{{ $loop->iteration }} = roomReservations{{ $loop->iteration }}.map(reservation => reservation.room_name);
                var roomData{{ $loop->iteration }} = roomReservations{{ $loop->iteration }}.map(reservation => reservation.total);

                var lineChartData{{ $loop->iteration }} = {
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

                var doughnutChartData{{ $loop->iteration }} = {
                    labels: roomLabels{{ $loop->iteration }},
                    datasets: [
                        {
                            data: roomData{{ $loop->iteration }},
                            backgroundColor: [
                                "rgba( 205, 133, 63, 1 )",
                                        "rgba( 32, 178, 170, 1 )",
                                        "rgba( 199, 21, 133, 1 )",
                                        "rgba( 219, 112, 147, 1 )",
                                        "rgba( 221, 160, 221, 1 )",
                                        "rgba( 70, 130, 180, 1 )"
                            ],
                            borderColor:[
                                "rgba( 205, 133, 63, 1 )",
                                        "rgba( 32, 178, 170, 1 )",
                                        "rgba( 199, 21, 133, 1 )",
                                        "rgba( 219, 112, 147, 1 )",
                                        "rgba( 221, 160, 221, 1 )",
                                        "rgba( 70, 130, 180, 1 )"
                            ],
                            borderWidth: 1
                        }
                    ]
                };

                var lineChartOptions{{ $loop->iteration }} = {
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

                var doughnutChartOptions{{ $loop->iteration }} = {
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

                new Chart(ctx{{ $loop->iteration }}, {
                    type: "line",
                    data: lineChartData{{ $loop->iteration }},
                    options: lineChartOptions{{ $loop->iteration }}
                });

                new Chart(ctxDoughnut{{ $loop->iteration }}, {
                    type: "doughnut",
                    data: doughnutChartData{{ $loop->iteration }},
                    options: doughnutChartOptions{{ $loop->iteration }}
                });
            @endforeach
        });
    </script>
@endsection
