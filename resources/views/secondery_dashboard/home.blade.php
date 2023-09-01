<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
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

 
figure {
  width: 100%;
  aspect-ratio: 8 / 5;
  --bg: hsl(330 80% calc(90% - (var(--hover) * 10%)));
  --accent: hsl(280 80% 40%);
  transition:  0.2s;
  background:
  transparent;
  position: relative;
  overflow: hidden;
}

figure:after {
  content: "";
  position: absolute;
  width: 30%;
  aspect-ratio: 1;
  border-radius: 50%;
  left: 10%;
  background:transparent;
  filter: blur(25px);
  transform:
    translateX(calc(var(--hover) * 15%))
    scale(calc(1 + (var(--hover) * 0.2)));
  transition: transform 0.2s, 
}

img.custom {
  position: absolute;
  width: 100%;
  border-radius: 5%;
  transform:
    scale(calc(1 - (var(--hover) * 0.2)));
  transition: transform 0.2s;
}

article {
  --hover: 0;
}

article:hover {
  --hover: 1;
}

/* ------------------ */

body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.jawad{
  display:block;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: hidden; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Content */
.modal-content {
    position: relative;
  background-color: #fefefe;
  margin: auto;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #39476d;
  color: white;
}

.modal-body {
    padding: 2px 16px;
    background-color: white;
}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* --------------------------- */

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

    background-color: #cacaca;
    color: #000000;
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


.horizontal-snap {
  margin-bottom: 10px;
  display: grid;
  grid-auto-flow: column;
  gap: 1rem;
  height: 250px;
  width: auto;
  overflow-y: auto;
  overscroll-behavior-x: contain;
  scroll-snap-type: x mandatory;
}

.horizontal-snap > a {
  scroll-snap-align: center;
}

        </style>
       
        <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
       
        <ul>
            <li><a class="active" href="/secondry_dashboard">الرئيسية</a></li>
            <li><a href="/secondry_dashboard/reservations">الحجوزات</a></li>
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
        --}}
 
        <div class="custom">
            <div class="text-center ">
                <p class="display-6 fw-bolder padding">الغرف</p>
            </div>
        </div>

        <div id="div1" style="height: 650px;position:relative;">
            
            <div class="container px-4 px-lg-5 mt-5" style="max-height:100%;overflow:auto;border:1px">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" >

                    @foreach ( $rooms as $room ) 
                   
                    <div class="col mb-5">
                        <div class="card h-100">

                            <article>
                                <figure><img class="custom" src="{{asset('storage/pic/uNKjjtXZTzKieCzdQdujYhDqgr6HJRyf8MAYMxtb.jpg')}}" alt=""></figure>
                            </article>

                            <div style="padding-bottom: 10px">
                                <div class="text-center">
                                  <h5 class="fw-bolder">{{$room->name}}</h5>  
                                  {{$room->category}}
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                @if($room->is_available==true)
                                    <p class="text-center" style="color:green">متاحة</p>  
                                @else
                                    <p class="text-center" style="color:rgb(209, 25, 25)">غير متاحة</p>   
                                @endif
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="/secondry_dashboard/room_reservations/{{$room->id}}" >الحجوزات</a>
                                    </div>
                            </div>

                        </div>
                    </div>
                    
                    @endforeach

                </div>
            </div>
        </div>
        
        @if (!empty($reservations)) 
            
        <div class="jawad" id="myModal" >
            <div class="modal-content" style="width: 70%;border-radius:25px">
              <div class="modal-header" style="border-top-right-radius: 25px;border-top-left-radius:25px;padding:10px;">
                <span class="close">&times;</span>
                <h2>({{$room_name}}) حجوزات الغرفة</h2>
              </div>
              <div class="modal-body" style="border-bottom-right-radius: 25px;border-bottom-left-radius:25px;padding:15px;" >
                @if(count($reservations)>0)
            
                <div class="horizontal-snap">
                <table class="styled-table" style="width: 90%;margin-left:5%;margin-right:5%" >
                    <thead>
                        <tr>
                            <th>تاريخ انتهاء الحجز</th>
                            <th>تاريخ بداية الحجز</th>
                            <th>التكلفة الكلية</th>
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
                            <td>{{$reservation->persons_count}}</td>
                            <td>{{$reservation->user_phone}}</td>
                            <td>{{$reservation->user_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                @else
                <div class="text-center">
                    <h6>لا يوجد حجوزات</h6>
                </div>
                @endif
                
              </div>
            </div>
        </div>

        @endif 
        
        
        </section>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Syrian For Transport And Tourism 2023</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="js/scripts.js"></script>

        <script>

            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
             modal.style.display = "none";
            }
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }

        </script>

    </body>

</html>
