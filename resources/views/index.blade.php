@extends('layouts.template')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<style>
  html,
  body,
  {
  height: 100%;
  width: 100%;
  }

  #map {
    height: calc(100vh - 56px);
    width: 100%;
    margin: 0;
  }
</style>
@endsection


@section('content')
<div id="map"></div>

<!-- Modal Create Point -->
<div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PointModalLabel">Create Point</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store-point')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fill Point Name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="geom" class="form-label">Geometry</label>
            <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control"
              onchange="document.getElementById('preview-image-point').src= window.URL.createObjectURL(this.files[0])"
              id="image_point" name="image">
          </div>
          <div class="mb3">
            <img src="" alt="Preview" id="preview-image-point" class="img-thumbnail" width="400">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Polyline-->
<div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolylineModalLabel">Create Polyline </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store-polyline')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fill Point Name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="geom" class="form-label">Geometry</label>
            <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control"
              onchange="document.getElementById('preview-image-polyline').src= window.URL.createObjectURL(this.files[0])"
              id="image_polyline" name="image">
          </div>
          <div class="mb3">
            <img src="" alt="Preview" id="preview-image-polyline" class="img-thumbnail" width="400">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Create Polygon-->
<div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolygonModalLabel">Create Polygon </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store-polygon')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Fill Point Name">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="geom" class="form-label">Geometry</label>
            <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control"
              onchange="document.getElementById('preview-image-polygon').src= window.URL.createObjectURL(this.files[0])"
              id="image_polygon" name="image">
          </div>
          <div class="mb3">
            <img src="" alt="Preview" id="preview-image-polygon" class="img-thumbnail" width="400">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
<script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
<script>
  // Map
  var map = L.map('map').setView([-7.794760241050732, 110.36718249219427], 13);

  /* Tile Basemap */
        var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
        });

        var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/ { z } / { y } / { x }', {
            attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{ x }', {
            attribution: 'Tiles & copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIGUGM</a>'

        });

        var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org / ">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        basemap1.addTo(map);

        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4,
        };

        L.control.layers(baseMaps).addTo(map);

  //Basemap
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
/* Function to generate a random color */
function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        /* GeoJSON polygon */
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Foto: <img src='{{ asset('storage/images/') }}/" + feature
                    .properties.image +
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row mt-3'>" +

                    "<a href='{{ url('edit-polygon') }}/" + feature.properties
                    .id +
                    "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

                    "<form action='{{ url('delete-polygon') }}/" + feature
                    .properties.id + "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +

                    "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

                "</form>"

                "</div>"

                ;
                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties
                            .name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);

            /* Load GeoJSON */
        fetch('storage/geojson/yk_admin.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            opacity: 1,
                            color: "black",
                            weight: 0.5,
                            fillOpacity: 0.7,
                            fillColor: getRandomColor(),
                        };
                    },
                    onEachFeature: function(feature, layer) {
                        var content = "Kecamatan: " + feature.properties.kecamatan;
                        layer.on({
                            click: function(e) {
                                // Fungsi ketika objek diklik
                                layer.bindPopup(content).openPopup();
                            },
                            mouseover: function(e) {
                                // Tidak ada perubahan warna saat mouse over
                                layer.bindPopup("Kecamatan " + feature.properties.kecamatan, {
                                    sticky: false
                                }).openPopup();
                            },
                            mouseout: function(e) {
                                // Fungsi ketika mouse keluar dari objek
                                layer.resetStyle(e
                                    .target); // Mengembalikan gaya garis ke gaya awal
                                map.closePopup(); // Menutup popup
                            },
                        });
                    }

                }).addTo(map);
            })
            .catch(error => {
                console.error('Error loading the GeoJSON file:', error);
            });

        });
  /* Digitize Function */
  var drawnItems = new L.FeatureGroup();
  map.addLayer(drawnItems);

  var drawControl = new L.Control.Draw({
    draw: {
      position: 'topleft',
      polyline: true,
      polygon: true,
      rectangle: true,
      circle: false,
      marker: true,
      circlemarker: false
    },
    edit: false
  });

  map.addControl(drawControl);

  map.on('draw:created', function (e) {
    var type = e.layerType,
      layer = e.layer;

    console.log(type);

    var drawnJSONObject = layer.toGeoJSON();
    var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

    console.log(drawnJSONObject);
    console.log(objectGeometry);

    if (type === 'polyline') {
      // set value geometry to input geom
      $("#geom_polyline").val(objectGeometry);

      // show modal
      $("#PolylineModal").modal('show');
    } else if (type === 'polygon' || type === 'rectangle') {
      // set value geometry to input geom
      $("#geom_polygon").val(objectGeometry);

      // show modal
      $("#PolygonModal").modal('show');
    } else if (type === 'marker') {
      // set value geometry to input geom
      $("#geom_point").val(objectGeometry);

      // show modal
      $("#PointModal").modal('show');
    } else {
      console.log('_undefined_');
    }

    drawnItems.addLayer(layer);
  });

  //Marker
  // L.marker([-6.360558923242346, 106.82740596049541]).addTo(map)
  // .bindPopup('Universitas Indonesia')
  // .openPopup();

  /* GeoJSON Point */
  var point = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
						"Deskripsi: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image + "' class='img-thumbnail' alt=''>" +
            "<br>" +

            "<div class='d-flex flex-row mt-2'>" +

                "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

                "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
                '{{ csrf_field() }}' +
                '{{ method_field('DELETE') }}' +

                "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

                "</form>"

                "</div>"

;

      layer.on({
        click: function (e) {
          point.bindPopup(popupContent);
        },
        mouseover: function (e) {
          point.bindTooltip(feature.properties.name);
        },
      });
    },
  });

  $.getJSON("{{ route('api.points') }}", function(data) {
    point.addData(data);
    map.addLayer(point);
  });
  var pendidikan =L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent ="";
    //    "Nama: " + feature.properties.name + "<br>" +
	// 					"Deskripsi: " + feature.properties.description + "<br>" +
    //         "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image + "' class='img-thumbnail' alt=''>" +
    //         "<br>" +

    //         "<div class='d-flex flex-row mt-2'>" +

    //             "<a href='{{ url('edit-point') }}/" + feature.properties.id +
    //             "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

    //             "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
    //             '{{ csrf_field() }}' +
    //             '{{ method_field('DELETE') }}' +

    //             "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

    //             "</form>"

    //             "</div>"

;

      layer.on({
        click: function (e) {
          point.bindPopup(popupContent);
        },
        mouseover: function (e) {
          point.bindTooltip(feature.properties.namobj);
        },
      });
    },
  });

  $.getJSON("http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3Apendidikan1&maxFeatures=50&outputFormat=application%2Fjson", function(data) {
    point.addData(data);
    map.addLayer(point);
    console.log(point)
  });
  /* GeoJSON Polygons */
  var polygons = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" +
        "<br>" +

            "<div class='d-flex flex-row mt-2'>" +

                "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

                "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
                '{{ csrf_field() }}' +
                '{{ method_field('DELETE') }}' +

                "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

                "</form>"

                "</div>"

      ;
      layer.on({
        click: function (e) {
          polygon.bindPopup(popupContent);
        },
        mouseover: function (e) {
          polygon.bindTooltip(feature.properties.name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.polygons') }}", function (data) {
    point.addData(data);
    map.addLayer(point);

  });
  /* GeoJSON Polylines */
  /* GeoJSON Polyline */
  var polyline = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" +
        "<br>" +

            "<div class='d-flex flex-row mt-2'>" +

                "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

                "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
                '{{ csrf_field() }}' +
                '{{ method_field('DELETE') }}' +

                "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

                "</form>"

                "</div>"
      ;
      layer.on({
        click: function (e) {
          polyline.bindPopup(popupContent);
        },
        mouseover: function (e) {
          polyline.bindTooltip(feature.properties.name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.polylines') }}", function (data) {
    point.addData(data);
    map.addLayer(point);
  });
</script>

@endsection
