$(document).ready(function(){


    function success(position) {
    /*
    if (s.className == 'success') {
        return;
    }
*/
        $('#camposEscondidos input[name="latitude_cli_entra"]').val(position.coords.latitude);
        $('#camposEscondidos input[name="longitude_cli_entra"]').val(position.coords.longitude);
        
        $.ajax({
          type: "GET",
          url: "login_controller/atualizarLocalizacao",
          data: { latitude: position.coords.latitude, longitude: position.coords.longitude }
        })
          .done(function( msg ) {
          //  alert( "Data Saved: " + msg );
         // alert(position.coords.latitude);
           //  location.reload(); 
          });

            $.getJSON("http://maps.google.com/maps/api/geocode/json?address="+position.coords.latitude +","+position.coords.longitude+"&sensor=false",function(result){
                 $("#str-endereco").html(result.results[0].formatted_address);
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
});