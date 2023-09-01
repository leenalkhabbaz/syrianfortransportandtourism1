<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reservations</title>
        <style>
        
        body {margin:0;}

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: transparent;
            position: absolute;
            top: 0;
            width: 100%;
        }

        li {
            float: right;
        }
        
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        li a:hover:not(.active) {
            background-color: #9b9b9b;
        }

        .active {
          background-color: #525252;
        }

        div.custom {
            background-color: rgb(160, 163, 163) ;
            margin-right: 10%;
            margin-left: 10%;
            padding-top: 2mm;
            padding-bottom: 2mm;
            border-radius:25px;
        }

        #block_container
        {
            text-align:center;
        }
        #bloc1, #bloc2
        {
            display:inline;
        }


        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    border-radius: 5%;

    background-color: #39476d;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #31406b;
}

        </style>
       
        <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
       
        <ul>
            <li><a  href="/secondry_dashboard">الرئيسية</a></li>
            <li><a class="active" href="/secondry_dashboard/reservations">الحجوزات</a></li>
            <li><a href="/logout">تسجيل الخروج</a></li>
            <span class="logo-sm">
                <img src="{{asset('images/logo.png')}}" alt="" height="120">
            </span>
        </ul>
      
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">{{$hotel->name}}</h1>
                    <p class="lead fw-normal text-white-50 mb-0">{{$hotel->description}}</p>
                    <br>
                    <p class="lead  text-white-10 mb-0">{{$hotel->address}}</p>
                </div>
            </div>
        </header>
        
        <section class="py-5">

        {{-- 
        <div class="container">
            <div class="card h-100" >
                <img class="card-img-top" src="{{asset('storage/pic/hotel.jpg')}}">
            </div>
        </div>

        <br>
        <br> 
        --}}
        
        {{-- <div class="custom">
            <div class="text-center ">
                <p class="display-6 fw-bolder padding">الحجوزات</p>
            </div>
        </div> --}}


            <table class="styled-table" style="width: 70%;margin-left:15%;margin-right:15%;" >
                <thead>
                    <tr>
                        <th>تاريخ انتهاء الحجز</th>
                        <th>تاريخ بداية الحجز</th>
                        <th>التكلفة الكلية</th>
                        <th>الغرفة</th>
                        <th>عدد الأشخاص</th>
                        <th>الرقم</th>
                        <th>الاسم</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ( $reservations as $reservation )  
                    <tr>
                        <td>{{$reservation->end_date}}</td>
                        <td>{{$reservation->start_date}}</td>
                        <td>{{$reservation->total_price}}</td>
                        <td>{{$reservation->room_name}}</td>
                        <td>{{$reservation->persons_count}}</td>
                        <td>{{$reservation->user_phone}}</td>
                        <td>{{$reservation->user_name}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
                
        </div>
        </section>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Syrian For Transport And Tourism 2023</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

    </body>

</html>
