function success(position) {
    var s = document.querySelector('#status');

    if (s.className == 'success') {
        return;
    }

    s.innerHTML = "Você foi localizado!";
    s.className = 'success';

    var mapcanvas = document.createElement('div');
        mapcanvas.id = 'mapcanvas';
        mapcanvas.style.height = '400px';
        mapcanvas.style.width = '560px';

    document.querySelector('article').appendChild(mapcanvas);

    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    var myOptions = {
        zoom: 15,
        center: latlng,
        mapTypeControl: false,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title:"Você está aqui!"
    });

}

function error(msg) {
    var s = document.querySelector('#status');
        s.innerHTML = typeof msg == 'string' ? msg : "falhou";
        switch( msg.code ) {
            case 1:
            alert('permissao negada pelo usuario');
            break;

        case 2:
            alert('ao foi possivel alcancar os satelites GPS');
            break;

        case 3:
           alert('a requisicao demorou demais para retornar');
            break;

        case 0:
            alert('ocorreu um erro desconhecido...');
            break; 

        }
        s.className = 'fail';
}

if (navigator.geolocation) {
    var geoOptions = {
        enableHighAccuracy: true,
        timeout: 30000,
        maximumAge: 3000
    };
    navigator.geolocation.watchPosition(success, error, geoOptions);
} else {
    error('Seu navegador não suporta <b style="color:black;background-color:#ffff66">Geolocalização</b>!');
}