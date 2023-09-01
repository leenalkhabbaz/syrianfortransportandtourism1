<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- <link rel="stylesheet" type="text/css" href="./css/style.css" /> -->

   </head>
  <body>



    <div class="container"style="margin-top:90px;">
    <div style="margin-bottom:20px;" >
        <a href="">  <button type="button"  class="btn btn-soft-purple"> رجوع</button></a>


    </div>
    <div id="map"></div>
    </div>

    <style>
 #map {
    height: 100%;
  }

  /*
   * Optional: Makes the sample page fill the window.
   */
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
    </style>
    <script>

      function myMap(){
    // The location of Uluru
    const uluru = { lat: 34.897293, lng:35.882514 };
    // The map, centered at Uluru
    const map = new google.maps.Map(
      document.getElementById("map") ,
      {
        zoom: 4,
        center: uluru,
      }
    );

    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>



  </body>
</html>
