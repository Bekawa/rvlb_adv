<?php
    include '../config/conn.php';

    $riverdata = array();
    $bdata = array();
    $basinlake = array();
 $json = array(); 
   $query = "SELECT * FROM `boundary` ";
    $result = $connect->query($query) or die('data selection for boundary failed: ' . $connect->error);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row; 
    }
$jsonData =json_encode($json);
$original_data = json_decode($jsonData, true);
$features = array();
foreach($original_data as $key => $value) {
    $features[] = array(
        'type' => 'Feature',
        'properties' => array('name' => $value['name']),
        'geometry' => array(
             'type' => 'Polygon', 
             'coordinates' => array(
                  $value['boundarydata']
             ),
         ),
    );
}
$new_data = array(
    'type' => 'FeatureCollection',
    'features' => $features,
);

$final_data = json_encode($new_data, JSON_PRETTY_PRINT);

$basinlake = array(); 
$query = "SELECT * FROM `lake` ";
 $result = $connect->query($query) or die('data selection for lake failed: ' . $connect->error);
 while ($row = mysqli_fetch_assoc($result)) {
      $basinlake[] = $row; 
    }
$lakeData = json_encode($basinlake);
$originallake_data = json_decode($lakeData, true);
$features = array();
foreach($originallake_data as $key => $value) {
 $features[] = array(
     'type' => 'Feature',
     'properties' => array('id' => $value['lakeid'] , 'name' => $value['lakename'] ),
     'geometry' => array(
          'type' => 'Polygon', 
          'coordinates' => array(
               $value['lakedata']
          ),
      ),
 );
}
$newlake_data = array(
 'type' => 'FeatureCollection',
 'features' => $features,
);
$finallake_data = json_encode($newlake_data, JSON_PRETTY_PRINT);

$woredas = array(); 
$query = "SELECT * FROM `woreda` ";
 $result = $connect->query($query) or die('data selection for lake failed: ' . $connect->error);
 while ($row = mysqli_fetch_assoc($result)) {
     $woredas[] = $row; 
  }
$woredaData = json_encode($woredas);
$originalworeda_data = json_decode($woredaData, true);
$features = array();
foreach($originalworeda_data as $key => $value) {
 $features[] = array(
     'type' => 'Feature',
     'properties' => array('name' => $value['woredaname'] , 'Region' => $value['woredaregion'], 'code' => $value['woredacode'] ),
     'geometry' => array(
          'type' => 'Polygon', 
          'coordinates' => array(
               $value['woredadata']
          ),
      ),
 );
}
$newworeda_data = array(
 'type' => 'FeatureCollection',
 'features' => $features,
);
$finalworeda_data = json_encode($newworeda_data, JSON_PRETTY_PRINT);

$soil = array();
$query = "SELECT * FROM `soil` ";
 $result = $connect->query($query) or die('data selection for lake failed: ' . $connect->error);
 while ($row = mysqli_fetch_assoc($result)) {
     $soil[] = $row; 
  }
$soilData = json_encode($soil);
$soil_data = json_decode($soilData, true);
$features = array();
foreach($soil_data as $key => $value) {
 $features[] = array(
     'type' => 'Feature',
     'properties' => array('name' => $value['soiltypename'] , 'density' => $value['density']),
     'geometry' => array(
          'type' => 'Polygon', 
          'coordinates' => array(
               $value['soildata']
          ),
      ),
 );
}
$newsoil_data = array(
 'type' => 'FeatureCollection',
 'features' => $features,
);
$finalsoil_data = json_encode($newsoil_data, JSON_PRETTY_PRINT);

    $query = "SELECT * FROM `river` ";
    $resultboundary = $connect->query($query) or die('data selection for river failed: ' . $connect->error);
    while ($row = mysqli_fetch_array($resultboundary)) {
    $riverdata[] = $row['riverdata'];
    $efrdata[] = $row['efr'];
    $Avsupp[] = $row['averagesupply'];
    $riv[] = $row['rivername'];
    $totdem[] = $row['totaldemand'];
    $rem[] = $row['remainingflow'];
    }

    $query = "SELECT * FROM `metrostation` ";
    $result = $connect->query($query) or die('data selection for metrostation failed: ' . $connect->error);
    while ($row = mysqli_fetch_array($result)) { 
    $msdata[] = $row['ststiondata'];
    $msnum[] = $row['stationnum'];
    $msnname[] = $row['stationname'];
    $mscode[] = $row['stationcode'];
    }

    ?>
















<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="BootstrapDash">

  <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

  <!-- vendor css -->
  <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/typicons.font/typicons.css" rel="stylesheet">
  <link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

  <!-- azia CSS -->
  <link rel="stylesheet" href="../assets/css/azia.css">








  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <link rel="stylesheet" href="../assets/css/interface.css">
        <link rel="stylesheet" href="../assets/css/Control.FullScreen.css">
        <script type="text/javascript" src="../assets/js/Leaflet.Coordinates-0.1.5.min.js"></script>
	<link rel="stylesheet" href="../assets/css/Leaflet.Coordinates-0.1.5.css"/>
        <script src="../assets/js/leaflet.browser.print.js"></script>
       








        <script src="../assets/data/Agriculturalland.js"></script>
        <script src="../assets/data/builtAreas.js"></script>
        <script src="../assets/data/Grassland.js"></script>
        <script src="../assets/data/Shrub.js"></script>
        <script src="../assets/data/tree.js"></script>
        <script src="../assets/data/school.js"></script>
        <script src="../assets/data/HealthFacility.js"></script>
        <script src="../assets/data/culnaturalfeatures.js"></script>










        
        <script src="../assets/js/geocoder.js"></script>       
        <script src="../assets/js/Control.FullScreen.js"></script>
  
    <script src="../assets/Leaflet.draw.js"></script>
    <script src="../assets/Leaflet.Draw.Event.js"></script>
    <link rel="stylesheet" href="../assets/leaflet.draw.css" />

    <script src="../assets/Toolbar.js"></script>
    <script src="../assets/Tooltip.js"></script>

    <script src="../assets/ext/GeometryUtil.js"></script>
    <script src="../assets/ext/LatLngUtil.js"></script>
    <script src="../assets/ext/LineUtil.Intersect.js"></script>
    <script src="../assets/ext/Polygon.Intersect.js"></script>
    <script src="../assets/ext/Polyline.Intersect.js"></script>
    <script src="../assets/ext/TouchEvents.js"></script>

    <script src="../assets/draw/DrawToolbar.js"></script>
    <script src="../assets/draw/handler/Draw.Feature.js"></script>
    <script src="../assets/draw/handler/Draw.SimpleShape.js"></script>
    <script src="../assets/draw/handler/Draw.Polyline.js"></script>
    <script src="../assets/draw/handler/Draw.Marker.js"></script>
    <script src="../assets/draw/handler/Draw.CircleMarker.js"></script>
    <script src="../assets/draw/handler/Draw.Circle.js"></script>
    <script src="../assets/draw/handler/Draw.Polygon.js"></script>
    <script src="../assets/draw/handler/Draw.Rectangle.js"></script>


    <script src="../assets/edit/EditToolbar.js"></script>
    <script src="../assets/edit/handler/EditToolbar.Edit.js"></script>
    <script src="../assets/edit/handler/EditToolbar.Delete.js"></script>

    <script src="../assets/Control.Draw.js"></script>

    <script src="../assets/edit/handler/Edit.Poly.js"></script>
    <script src="../assets/edit/handler/Edit.SimpleShape.js"></script>
    <script src="../assets/edit/handler/Edit.Marker.js"></script>
    <script src="../assets/edit/handler/Edit.CircleMarker.js"></script>
    <script src="../assets/edit/handler/Edit.Circle.js"></script>
    <script src="../assets/edit/handler/Edit.Rectangle.js"></script>





</head>

<body>





















































  <div class="az-header">
    <div class="container-fluid">
      
      <div class="az-header-left">
        <a href="index.html" class="az-logo"><span></span></a>
        <img class="me-2 mb-1" src="../Storage/img/mowe_logo.jpg" width="32px" height="40px" >&nbsp;
        <div class="az-logo">
          <h2 class="az-logo-title">Ministry Of Water and Energy</h2>
          <p class="az-dashboard-text">FDRE | የኢትዮጵያ ፌደራላዊ ዴሞክራሲያዊ ሪፐብሊክ</p>
        </div>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div>


      <div class="az-header-menu">

        <div class="az-header-menu-header">
          <img class="me-2" src="../Storage/img/mowe_logo.jpg" width="22px" height="30px" >
          <div class="az-logo">
            <h2 class="az-logo-title-mobile">Ministry Of Water and Energy</h2>
            <p class="az-dashboard-text-mobile">FDRE | የኢትዮጵያ ፌደራላዊ ዴሞክራሲያዊ ሪፐብሊክ</p>
          </div>
          <a href="" class="ml-2 mb-2 close">&times;</a>
        </div>

        <ul class="nav">

          <li class="nav-item ">
            <a href="index.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
          </li>
          
          <li class="nav-item ">
            <a href="Documents.php" class="nav-link"><i class="far fa-file-alt"></i>&nbsp; Documentation</a>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i> Pages</a>
            <nav class="az-menu-sub">
              <a href="page-signin.html" class="nav-link">Sign In</a>
              <a href="page-signup.html" class="nav-link">Sign Up</a>
            </nav>
          </li>

          <li class="nav-item">
            <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Charts</a>
          </li>

          <li class="nav-item">
            <a href="form-elements.html" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i> Forms</a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
            <div class="az-menu-sub">
              <div class="container">
                <div>
                  <nav class="nav">
                    <a href="elem-buttons.html" class="nav-link">Buttons</a>
                    <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                    <a href="elem-icons.html" class="nav-link">Icons</a>
                    <a href="table-basic.html" class="nav-link">Table</a>
                  </nav>
                </div>
              </div>
            </div>
          </li>

        </ul>


      </div>
      <div class="az-header-right">
        <a href="https://www.bootstrapdash.com/demo/azia-free/docs/documentation.html" target="_blank" class="az-header-search-link"><i class="far fa-file-alt"></i></a>
        <a href="" class="az-header-search-link"><i class="fas fa-search"></i></a>
        <div class="az-header-message">
          <a href="#"><i class="typcn typcn-messages"></i></a>
        </div>
        <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <p class="az-notification-text">You have 2 unread notification</p>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="../Storage/profiles/bereket.jpg" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media new">
                <div class="az-img-user online"><img src="../img/faces/face3.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Joyce Chua</strong> just created a new blog post</p>
                  <span>Mar 13 04:16am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face4.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                  <span>Mar 13 02:56am</span>
                </div><!-- media-body -->
              </div><!-- media -->
              <div class="media">
                <div class="az-img-user"><img src="../img/faces/face5.jpg" alt=""></div>
                <div class="media-body">
                  <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                  <span>Mar 12 10:40pm</span>
                </div><!-- media-body -->
              </div><!-- media -->
            </div>
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div>
        </div>
        <div class="dropdown az-profile-menu">
          <a href="" class="az-img-user"><img src="../Storage/profiles/bereket.jpg" alt=""></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <div class="az-header-profile">
              <div class="az-img-user">
                <img src="../Storage/profiles/bereket.jpg" alt="">
              </div>
              <h6>Aziana Pechon</h6>
              <span>Premium Member</span>

              <a class="m-auto" href="./signin.php" > Signout </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>














































































  <div class="az-content az-content-dashboard">
    <div class="container-fluid">
      <div class="az-content-body">

        <div class="az-dashboard-one-title">
          <div>
            <h2 class="az-dashboard-title">Hi, welcome back!</h2>
            <p class="az-dashboard-text">Your web analytics dashboard template.</p>
          </div>
          <div class="az-content-header-right">
            <div class="media">
              <div class="media-body">
                <label>Start Date</label>
                <h6>Oct 10, 2018</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="media-body">
                <label>End Date</label>
                <h6>Oct 23, 2018</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <div class="media">
              <div class="media-body">
                <label>Event Category</label>
                <h6>All Categories</h6>
              </div><!-- media-body -->
            </div><!-- media -->
            <a href="" class="btn btn-purple">Export</a>
          </div>
        </div><!-- az-dashboard-one-title -->

        <div class="az-dashboard-nav">
          <nav class="nav">
            <a class="nav-link active" data-toggle="tab" href="#">Overview</a>
            <a class="nav-link" data-toggle="tab" href="#">Audiences</a>
            <a class="nav-link" data-toggle="tab" href="#">Demographics</a>
            <a class="nav-link" data-toggle="tab" href="#">More</a>
          </nav>

          <nav class="nav">
            <a class="nav-link" href="#"><i class="far fa-save"></i> Save Report</a>
            <a class="nav-link" href="#"><i class="far fa-file-pdf"></i> Export to PDF</a>
            <a class="nav-link" href="#"><i class="far fa-envelope"></i>Send to Email</a>
            <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
          </nav>
        </div>
















































        <div class="row row-sm mg-b-20">


          <div class="col-lg-12 ht-lg-100p">
            <div class="card card-dashboard-one">
              <div class="card-body">



                        <div id="map"></div>




              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->


        </div><!-- row -->










































      </div><!-- az-content-body -->
    </div>
  </div><!-- az-content -->

  <div class="az-footer ht-40">
    <div class="container ht-100p pd-t-0-f">
      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
    </div><!-- container -->
  </div><!-- az-footer -->













































































  
 <script>  
        
        var map = L.map('map').setView([7.7690754,38.7486156], 8.5), drawnItems = L.featureGroup().addTo(map);
        var osm = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                        maxZoom: 20        
                        });
                        osm.addTo(map);
                        var terrainLayer = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/terrain/{z}/{x}/{y}.png', {
                            maxZoom: 18,
                            subdomains: 'abcd',
                            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                            bounds: [
                                [7, 42.5],
                                [8.5, 35]
                                ]
                                });
                         //terrainLayer.addTo(map);
                        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });                    
                        // googleStreets.addTo(map);
                        var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });
                        // googleHybrid.addTo(map);
                        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });
                        //googleSat.addTo(map);
                        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            });
                        //googleStreets.addTo(map);
                        drawnItems = L.featureGroup().addTo(map);
        L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');
                img.src = '../assets/images/hawassauniversity.jpg';      
                img.style.width = '100px';
                return img;
            },
            onRemove: function(map) {
            }
        });
        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        }
        L.control.watermark({ position: 'bottomright' }).addTo(map);
        
        
        var fullscreen = L.control.fullscreen({
          position: 'topleft', 
          title: 'Show me the fullscreen !',
          titleCancel: 'Exit fullscreen mode',
          content: null,
          forceSeparateButton: true, 
          forcePseudoFullscreen: true,
          fullscreenElement: false 
          }).addTo(map);
        
        var metroicon = L.icon({
            iconUrl: '../assets/images/metriology3.png',
            iconSize: [8,8],
        });
        var coord =	L.control.coordinates({
              position:"bottomleft",
              decimals:2,
              decimalSeperator:",",
              labelTemplateLat:"Latitude: {y}",
              labelTemplateLng:"Longitude: {x}"
            }).addTo(map);
        
        var browserPrint = L.browserPrint(map,{debug:false, cancelWithEsc: true});
           var c = L.control.browserPrint({
            printModes: [
                L.BrowserPrint.Mode.Landscape(),
                L.BrowserPrint.Mode.Landscape('A4',{margin: 0, title: 'Header / Footer', header: {
                    enabled: true,
                    text: "<span></span>",
                    size: "10mm",
                    overTheMap: false,
                },
                footer: {
                    enabled: true,
                    text: "<span></span>",
                    size: "10mm",
                    overTheMap: false,
                }
               }), L.BrowserPrint.Mode.Custom("A4", {title: "Select area (Custom)"})]
              }, browserPrint).addTo(map);
        
        var osmGeocoder = new L.Control.OSMGeocoder({placeholder: 'Search location...'});
            map.addControl(osmGeocoder);
        
        var zsboundary = <?php echo str_replace(']"',']',str_replace('"[',"[",$final_data)); ?>;
            var bStyle = {
                weight: 1,
                opacity: 0.85,
                fillOpacity: 0,
                color: 'red',
                dashArray: '4'
                       }; 
        var bdlayer = L.geoJson(zsboundary, {style:bStyle}).addTo(map);    
        
        var woredas = <?php echo str_replace(']"',']',str_replace('"[',"[",$finalworeda_data));?>;
          function woredastyle(feature) {
            return {
                    weight: 0.1,
                    fillOpacity: 0,
                    color: 'black'
            };
          }        
            var lang =L.geoJSON(woredas, {style: woredastyle,
          onEachFeature: function (feature, layer) {
            layer.bindPopup('<div>'+"Woreda Name: "+feature.properties.name+'</div>' + '<div>'+"Woreda Region: "+ feature.properties.Region+'</div>' + '<div>'+"Woreda code: "+feature.properties.code+'</div>');
          }
        }).addTo(map);
        
        var lakes = <?php echo str_replace(']"',']',str_replace('"[',"[",$finallake_data));?>;
          function lakestyle(feature) {
            return {
                    opacity: 0,
                    fillOpacity: 1,
                    fillColor: '#9CC0F9'
            };
          }        
            var lang =L.geoJSON(lakes, {style: lakestyle,
          onEachFeature: function (feature, layer) {
            layer.bindPopup('<div>'+feature.properties.name+'</div>');
          }
        }).addTo(map);
        
        var metro = {
                    "type": "FeatureCollection",
                    "features": [{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[0]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[0]?> ",
                            "code": "<?php echo $mscode[0]?>",
                            "number": "<?php echo $msnum[0]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[1]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[1]?> ",
                            "code": "<?php echo $mscode[1]?>",
                            "number": "<?php echo $msnum[1]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[2]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[2]?> ",
                            "code": "<?php echo $mscode[2]?>",
                            "number": "<?php echo $msnum[2]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[3]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[3]?> ",
                            "code": "<?php echo $mscode[3]?>",
                            "number": "<?php echo $msnum[3]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[4]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[4]?> ",
                            "code": "<?php echo $mscode[4]?>",
                            "number": "<?php echo $msnum[4]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[5]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[5]?> ",
                            "code": "<?php echo $mscode[5]?>",
                            "number": "<?php echo $msnum[5]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[6]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[6]?> ",
                            "code": "<?php echo $mscode[6]?>",
                            "number": "<?php echo $msnum[6]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[7]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[7]?> ",
                            "code": "<?php echo $mscode[7]?>",
                            "number": "<?php echo $msnum[7]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[8]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[8]?> ",
                            "code": "<?php echo $mscode[8]?>",
                            "number": "<?php echo $msnum[8]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[9]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[9]?> ",
                            "code": "<?php echo $mscode[9]?>",
                            "number": "<?php echo $msnum[9]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[10]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[10]?> ",
                            "code": "<?php echo $mscode[10]?>",
                            "number": "<?php echo $msnum[10]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[11]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[11]?> ",
                            "code": "<?php echo $mscode[11]?>",
                            "number": "<?php echo $msnum[11]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[12]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[12]?> ",
                            "code": "<?php echo $mscode[12]?>",
                            "number": "<?php echo $msnum[12]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[13]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[13]?> ",
                            "code": "<?php echo $mscode[13]?>",
                            "number": "<?php echo $msnum[13]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[14]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[14]?> ",
                            "code": "<?php echo $mscode[14]?>",
                            "number": "<?php echo $msnum[14]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[15]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[15]?> ",
                            "code": "<?php echo $mscode[15]?>",
                            "number": "<?php echo $msnum[15]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[15]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[15]?> ",
                            "code": "<?php echo $mscode[15]?>",
                            "number": "<?php echo $msnum[15]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[16]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[16]?> ",
                            "code": "<?php echo $mscode[16]?>",
                            "number": "<?php echo $msnum[16]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[17]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[17]?> ",
                            "code": "<?php echo $mscode[17]?>",
                            "number": "<?php echo $msnum[17]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[18]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[18]?> ",
                            "code": "<?php echo $mscode[18]?>",
                            "number": "<?php echo $msnum[18]?>"
                        }
                    },{
                        "type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [<?php echo $msdata[19]?>]
                        },
                        "properties": {
                            "name": " <?php echo $msnname[19]?> ",
                            "code": "<?php echo $mscode[19]?>",
                            "number": "<?php echo $msnum[19]?>"
                        }
                    }]
                };
               
        function metrology (feature, layer) {
            layer.bindPopup('<div> '+"Station Name : " + feature.properties.name +'<br/>' +"Station Number : "+ feature.properties.number +'<br/>'+ "Station Code : "+ feature.properties.code + '</div>' );
           }
          metrologystation = L.geoJson( metro, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {icon: metroicon });
            },
            onEachFeature: metrology}).addTo(map);
        var soils = <?php echo str_replace(']"',']',str_replace('"[',"[",$finalsoil_data));?>;
           function getColor(d) {
                return d > 96 ? '#PD0026' :
                    d > 92 ? '#E3FA1C' :
                    d > 87 ? '#FC4E2A' :
                    d > 82 ? '#4D2A19' :
                    d > 76 ? '#BNB24C' :
                    d > 72 ? '#DED976' :
                    d > 66 ? '#BM0326' :
                    d > 62 ? '#ND0426' :
                    d > 56 ? '#CD3026' :
                    d > 51 ? '#L20026' :
                    d > 46 ? '#JD3026' :
                    d > 42  ? '#7161EF' :
                    d > 36  ? '#HD9026' :
                    d > 33  ? '#BD0226' :
                    d > 26  ? '#ce0026' :
                    d > 21  ? '#ff0026' :
                    d > 16  ? '#1F0D45' :
                    d > 11  ? '#xDf026' :
                    d > 6  ? '#aDj026' :
                    d > 1  ? '#BDy026' :
                                '#VSD000';
            }
        
            function style(feature) {
            return {
                fillColor: getColor(feature.properties.density),
                weight: 0.8,
                opacity: 1,
                color: 'white',
                fillOpacity: 0.7
              };
        }
        function highlightFeature(e) {
            var layer = e.target;
        
            layer.setStyle({
                weight:0.8,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });
        
            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }
            info.update(layer.feature.properties);
        }
        function resetHighlight(e) {
            info.update();
            geojson.resetStyle(e.target);
        }
            var soilgeojson;
            soilgeojson = L.geoJson(soils);
        
            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }
        
            function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }
        soilgeojson = L.geoJson(soils, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);
        
        var info = L.control();
            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };
        info.update = function (props) {
                this._div.innerHTML = '<h4>Soil Type</h4>' +  (props ?
                    '<b>' + props.name + '</b><br />'
                    : 'Hover over a soil');
            };
            info.addTo(map);
        
        var schoolStyleDefault = {
            radius: 2,
            fillColor: "#772004",
            color: "#000",
            weight: 0,
            opacity: 1,
            fillOpacity: 0.9
        };
        function onEachSiren(feature, layer) {
          
            layer.bindTooltip('<div class="infopop">School : '+ feature.properties.SC_TYPE+'</div>');}
        schoolayer = L.geoJson(schooldata, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, schoolStyleDefault);
                },
            onEachFeature: onEachSiren}).addTo(map);
        
        var healthStyleDefault = {
            radius: 2,
            fillColor: "#E23512",
            color: "#000",
            weight: 0,
            opacity: 1,
            fillOpacity: 0.9
        };
        
        function onEachHf(feature, layer) {
            layer.bindTooltip('<div class="infopop">Health Facility : '+ feature.properties.HF_TYPE+'</div>');
           }
            Hflayer = L.geoJson(healthfacility, {
            pointToLayer: function (feature, latlng) {
                return L.circleMarker(latlng, healthStyleDefault);
                },
            onEachFeature: onEachHf}).addTo(map);
        
        var mounticon = L.icon({
            iconUrl: '../assets/images/yellowmountain.png',
            iconSize: [10,9.5],
        });
        var mountain= L.geoJson(calnatural, {filter: mountain,
            pointToLayer: function (feature, latlng,) {
                return L.marker(latlng, {icon: mounticon });
            },
            onEachFeature: function(feature, layer) {
          layer.bindTooltip( feature.properties.CN_NAME);
          }
        }).addTo(map); 
             function mountain(calnatural) {
          if (calnatural.properties.CN_TYPE === "Mountain") return true
        }
        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[0] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[0] ?> <br> Average Supply:<?php echo $Avsupp[0]?> <br> EFR: <?php echo $efrdata[0]?> <br> Total Demand:<?php echo $totdem[0]?> <br> Remaining Flow:<?php echo $rem[0]?>")
                        
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[1] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[1] ?> <br> Average Supply:<?php echo $Avsupp[1]?> <br> EFR: <?php echo $efrdata[1]?> <br> Total Demand:<?php echo $totdem[1]?> <br> Remaining Flow:<?php echo $rem[1]?>")
                       
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[2] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[2] ?> <br> Average Supply:<?php echo $Avsupp[2]?> <br> EFR: <?php echo $efrdata[2]?> <br> Total Demand:<?php echo $totdem[2]?> <br> Remaining Flow:<?php echo $rem[2]?>")
                       
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[3] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[3] ?> <br> Average Supply:<?php echo $Avsupp[3]?> <br> EFR: <?php echo $efrdata[3]?> <br> Total Demand:<?php echo $totdem[3]?> <br> Remaining Flow:<?php echo $rem[3]?>")
                        
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[4] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[4] ?> <br> Average Supply:<?php echo $Avsupp[4]?> <br> EFR: <?php echo $efrdata[4]?> <br> Total Demand:<?php echo $totdem[4]?> <br> Remaining Flow:<?php echo $rem[4]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[5] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[5] ?> <br> Average Supply:<?php echo $Avsupp[5]?> <br> EFR: <?php echo $efrdata[5]?> <br> Total Demand:<?php echo $totdem[5]?> <br> Remaining Flow:<?php echo $rem[5]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[6] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[6] ?> <br> Average Supply:<?php echo $Avsupp[6]?> <br> EFR: <?php echo $efrdata[6]?> <br> Total Demand:<?php echo $totdem[6]?> <br> Remaining Flow:<?php echo $rem[6]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[7] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[7] ?> <br> Average Supply:<?php echo $Avsupp[7]?> <br> EFR: <?php echo $efrdata[7]?> <br> Total Demand:<?php echo $totdem[7]?> <br> Remaining Flow:<?php echo $rem[7]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[8] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[8] ?> <br> Average Supply:<?php echo $Avsupp[8]?> <br> EFR: <?php echo $efrdata[8]?> <br> Total Demand:<?php echo $totdem[8]?> <br> Remaining Flow:<?php echo $rem[8]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[9] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[9] ?> <br> Average Supply:<?php echo $Avsupp[9]?> <br> EFR: <?php echo $efrdata[9]?> <br> Total Demand:<?php echo $totdem[9]?> <br> Remaining Flow:<?php echo $rem[9]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[10] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[10] ?> <br> Average Supply:<?php echo $Avsupp[10]?> <br> EFR: <?php echo $efrdata[10]?> <br> Total Demand:<?php echo $totdem[10]?> <br> Remaining Flow:<?php echo $rem[10]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[11] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[11] ?> <br> Average Supply:<?php echo $Avsupp[11]?> <br> EFR: <?php echo $efrdata[11]?> <br> Total Demand:<?php echo $totdem[11]?> <br> Remaining Flow:<?php echo $rem[11]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[12] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[12] ?> <br> Average Supply:<?php echo $Avsupp[12]?> <br> EFR: <?php echo $efrdata[12]?> <br> Total Demand:<?php echo $totdem[12]?> <br> Remaining Flow:<?php echo $rem[12]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[13] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[13] ?> <br> Average Supply:<?php echo $Avsupp[13]?> <br> EFR: <?php echo $efrdata[13]?> <br> Total Demand:<?php echo $totdem[13]?> <br> Remaining Flow:<?php echo $rem[13]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[14] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[14] ?> <br> Average Supply:<?php echo $Avsupp[14]?> <br> EFR: <?php echo $efrdata[14]?> <br> Total Demand:<?php echo $totdem[14]?> <br> Remaining Flow:<?php echo $rem[14]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[15] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[15] ?> <br> Average Supply:<?php echo $Avsupp[15]?> <br> EFR: <?php echo $efrdata[15]?> <br> Total Demand:<?php echo $totdem[15]?> <br> Remaining Flow:<?php echo $rem[15]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[16] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[16] ?> <br> Average Supply:<?php echo $Avsupp[16]?> <br> EFR: <?php echo $efrdata[16]?> <br> Total Demand:<?php echo $totdem[16]?> <br> Remaining Flow:<?php echo $rem[16]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[17] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[17] ?> <br> Average Supply:<?php echo $Avsupp[17]?> <br> EFR: <?php echo $efrdata[17]?> <br> Total Demand:<?php echo $totdem[17]?> <br> Remaining Flow:<?php echo $rem[17]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[18] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[18] ?> <br> Average Supply:<?php echo $Avsupp[18]?> <br> EFR: <?php echo $efrdata[18]?> <br> Total Demand:<?php echo $totdem[18]?> <br> Remaining Flow:<?php echo $rem[18]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[19] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[19] ?> <br> Average Supply:<?php echo $Avsupp[19]?> <br> EFR: <?php echo $efrdata[19]?> <br> Total Demand:<?php echo $totdem[19]?> <br> Remaining Flow:<?php echo $rem[19]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[20] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[20] ?> <br> Average Supply:<?php echo $Avsupp[20]?> <br> EFR: <?php echo $efrdata[20]?> <br> Total Demand:<?php echo $totdem[20]?> <br> Remaining Flow:<?php echo $rem[20]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[21] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[21] ?> <br> Average Supply:<?php echo $Avsupp[21]?> <br> EFR: <?php echo $efrdata[21]?> <br> Total Demand:<?php echo $totdem[21]?> <br> Remaining Flow:<?php echo $rem[21]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[22] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[22] ?> <br> Average Supply:<?php echo $Avsupp[22]?> <br> EFR: <?php echo $efrdata[22]?> <br> Total Demand:<?php echo $totdem[22]?> <br> Remaining Flow:<?php echo $rem[22]?>")
                        var riverlayer = L.geoJSON([{
                                        "type": "LineString",
                                        "coordinates": [<?php echo $riverdata[23] ?>]
                                    }] , {style:{"color":"#9CC0F9","weight": 3}}).addTo(map)
                        .bindPopup("River Name : <?php echo $riv[23] ?> <br> Average Supply:<?php echo $Avsupp[23]?> <br> EFR: <?php echo $efrdata[23]?> <br> Total Demand:<?php echo $totdem[23]?> <br> Remaining Flow:<?php echo $rem[23]?>")  
        var agriculturalland;
        var BuiltAreas;
        var Grassland;
        var tree;
        var Shrub;
        
        var agriStyle = {
                    weight: 1,
                    opacity: 0.85,
                    fillOpacity: 0.8,
                    color: '#4E6E33',
                    dashArray: '4'
                };
            var agrilayer = L.geoJson(agriculturalland, {style:agriStyle}).addTo(map);    
           
            var builtStyle = {
                    weight: 1,
                    opacity: 0.85,
                    fillOpacity: 0.8,
                    color: '#838980',
                    dashArray: '4'
                };
            var builtlayer = L.geoJson(BuiltAreas, {style:builtStyle}).addTo(map);    
           
            var grassStyle = {
                    weight: 1,
                    opacity: 0.85,
                    fillOpacity: 0.8,
                    color: '#9FBC8A',
                    dashArray: '4'
                };
            var grasslayer = L.geoJson(grassland, {style:grassStyle}).addTo(map);    
           
            var treeStyle = {
                    weight: 1,
                    opacity: 0.85,
                    fillOpacity: 0.8,
                    color: '#27341E',
                    dashArray: '4'
                };
            var treelayer = L.geoJson(tree, {style:treeStyle}).addTo(map);    
          
            var shrub = {
                    weight: 1,
                    opacity: 0.85,
                    fillOpacity: 0.8,
                    color: '#909050',
                    dashArray: '4'
                };
            var shrublayer = L.geoJson(Shrub, {style:shrub}).addTo(map);    
          
        var baseMaps = {
                    "OSM": osm,
                    "Terrain": terrainLayer,
                    "Sattelite": googleSat,
                    "Hybrid": googleHybrid,
                    "GoogleStreets": googleStreets,
                };
                var overlayMaps = {
                    'drawlayer': drawnItems,
                    "metrologystation":metrologystation,
                    "soils":soilgeojson,
                    "Agricultural area":agrilayer,
                    "Built areas":builtlayer,
                    "Shrub":shrublayer,
                    "Trees":treelayer,
                    "Grass Land":grasslayer,
                    "School":schoolayer,
                    "Health Facility":Hflayer,
                    "Mountain":mountain,
                };
                var control = L.control.layers(baseMaps, overlayMaps, {
                    collapsed: false
                       }).addTo(map);
                map.addControl(new L.Control.Draw({
                    edit: {
                        featureGroup: drawnItems,
                        poly: {
                            allowIntersection: false
                        }
                    },
                    draw: {
                        polygon: {
                            allowIntersection: false,
                            showArea: true
                        }
                    }
                       }));
        
                   var _round = function(num, len) {
                    return Math.round(num * (Math.pow(10, len))) / (Math.pow(10, len));
                      };
                   var strLatLng = function(latlng) {
                    return "(" + _round(latlng.lat, 6) + ", " + _round(latlng.lng, 6) + ")";
                     };
        
                                 var getPopupContent = function(layer) {
                            if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
                                return strLatLng(layer.getLatLng());
                            } else if (layer instanceof L.Circle) {
                                var center = layer.getLatLng(),
                                    radius = layer.getRadius();
                                return "Center: " + strLatLng(center) + "<br />" +
                                    "Radius: " + _round(radius, 2) + " m";
                            } else if (layer instanceof L.Polygon) {
                                var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                                    area = L.GeometryUtil.geodesicArea(latlngs);
                                return "Area: " + L.GeometryUtil.readableArea(area, true);
                            } else if (layer instanceof L.Polyline) {
                                var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
                                    distance = 0;
                                if (latlngs.length < 2) {
                                    return "Distance: N/A";
                                } else {
                                    for (var i = 0; i < latlngs.length - 1; i++) {
                                        distance += latlngs[i].distanceTo(latlngs[i + 1]);
                                    }
                                    return "Distance: " + _round(distance, 2) + " m";
                                }
                            }
                            return null;
                            };
        
                        map.on(L.Draw.Event.CREATED, function(event) {
                            var layer = event.layer;
                            var content = getPopupContent(layer);
                            if (content !== null) {
                                layer.bindPopup(content);
                            }
                            drawnItems.addLayer(layer);
                            });
        
                        map.on(L.Draw.Event.EDITED, function(event) {
                            var layers = event.layers,
                                content = null;
                            layers.eachLayer(function(layer) {
                                content = getPopupContent(layer);
                                if (content !== null) {
                                    layer.setPopupContent(content);
                                }
                            });
                        });
                            ;
        </script>         



























  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/ionicons/ionicons.js"></script>
  <script src="../lib/jquery.flot/jquery.flot.js"></script>
  <script src="../lib/jquery.flot/jquery.flot.resize.js"></script>
  <script src="../lib/chart.js/Chart.bundle.min.js"></script>
  <script src="../lib/peity/jquery.peity.min.js"></script>

  <script src="../assets/js/azia.js"></script>
  <script src="../assets/js/chart.flot.sampledata.js"></script>
  <script src="../assets/js/dashboard.sampledata.js"></script>
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>

</body>

</html>