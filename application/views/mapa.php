<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Google Maps API v3: Criando um mapa personalizado</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>resources/css/estilo.css">
    </head>
 
    <body>
        <div id="mapa" style="height: 500px; width: 700px">
        </div>
        
       <script type="text/javascript" src="<?php echo base_url()?>resources/js/jquery.min.js"></script>
 
        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        <!-- Caixa de informação -->
        <script type="text/javascript" src="<?php echo base_url()?>resources/js/infobox.js"></script>
        
        <!-- Agrupamento dos marcadores -->
       <script type="text/javascript" src="<?php echo base_url()?>resources/js/markerclusterer.js"></script>
 
        <!-- Arquivo de inicialização do mapa -->
        <script type="text/javascript" src="<?php echo base_url()?>resources/js/mapa.js"></script>
    </body>
</html>