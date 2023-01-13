@extends('layout.main')
@section('container')

<form method="POST" action="{{ url('karcis') }}">
    @csrf
    <button type="submit" class="btn btn-primary" onClick="take_snapshot()">Klik Ini</button>
</form>

<a href="{{ url('/in') }}" type="submit" class="btn btn-primary mb-1">Kendaraan Masuk</a>


<div id="my_camera"></div>
<div>
    <img style="float:left;display:block; width:50%" src="{{ asset('img/Frame1.png') }}" alt="">
    {{-- <video autoplay="true" id="video-webcam" width="50%" style="float:right;"> 
        klo gk muncul berarti webnya gk support cam
    </video> --}}
</div>
{{-- <script type="text/javascript">
    var video = document.querySelector("#video-webcam");

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    function handleVideo(stream) {
        video.srcObject = stream;
    }

    function videoError(e) {
        alert("izinin buat open cam")
    }
</script> --}}

<!-- CSS -->
<style>
 #my_camera{
     width: 50%;
     /* height: 50%; */
     /* border: 1px solid black; */
     float:right;
}
</style>

{{-- <input type=button value="Take Snapshot" > --}}
 
<div id="results"></div>
 
<!-- Webcam.min.js -->
<script type="text/javascript" src="{{ asset('js/webcam.js') }}"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
 Webcam.set({
     width: 440,
     height: 440,
     image_format: 'jpeg',
     jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

function take_snapshot() {
 
   // take snapshot and get image data
   Webcam.snap( function(data_url) {
       // display results in page
       document.getElementById('results').innerHTML = 
        '<img src="'+data_url+'"/>';
    } );
}
</script>


@endsection 