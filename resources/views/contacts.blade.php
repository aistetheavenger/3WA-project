@extends('layouts.app')

@section('content')
<style>
  #map {
    width: 100%;
    height: 400px;
  }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 panel-body text-justify">
            <div class="text-center header">Contact Us</div>
                <p>When the evening comes, restaurant Apple Forest fills with refined tastes and aromas and warm conversations. This is a place for those who look for inspiration in novelties, improvisation and pleasure.</p>

                <p>An exceptional, small restaurant does have a reason for being here, in Gedimino pr.50. Why? Visit us and we will tell you the magic story of this place.</p>

            <div class="panel-body text-center">
                <strong>Apple Forest</strong>
                <address>
                    <p>Gedimino pr.50, 03151, Vilnius</p>
                    <p>Lithuania</p>
                    <p class="tel">+44 (0)XXXX XXXXXX</p>
                </address>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                    <div id="map" class="map">
            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var uluru = {lat: 48.874650, lng: 2.325336};
        var map = new google.maps.Map(document.getElementById('map'), {

        zoom: 4,
        center: uluru
        });
        var marker = new google.maps.Marker({
        position: uluru,
        map: map
        });
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLKwNlkMTvs-P1vOVN-xU5AeykrG0RyWU&callback=initMap">
</script>
@endsection
