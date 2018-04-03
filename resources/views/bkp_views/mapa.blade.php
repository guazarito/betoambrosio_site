
<html>

<header>

  <style>
      #mapa{
          width: 50%;
          height: 500px;
          border: 1px solid #ccc;
          margin: auto;
      }
  </style>



</header>

<body onload="loadScript()">
<script>
    function initialize() {

        // Exibir mapa;
        var myLatlng = new google.maps.LatLng(-2.438168, -91.121697);
        var mapOptions = {
            zoom: 3,
            center: myLatlng,
            panControl: false,
            // mapTypeId: google.maps.MapTypeId.ROADMAP
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
        }

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        // Exibir o mapa na div #mapa;
        var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);

        directionsDisplay.setMap(map);

        directionsService.route({
            origin: 'Araraquara, Brazil',
            destination: 'Buenos Aires, Argentina',
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });


        // Estilizando o mapa;
        // Criando um array com os estilos
        var styles = [
            {
                stylers: [
                    { hue: "#41a7d5" },
                    { saturation: 60 },
                    { lightness: -20 },
                    { gamma: 1.51 }
                ]
            },
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [
                    { lightness: 100 },
                    { visibility: "simplified" }
                ]
            },
            {
                featureType: "road",
                elementType: "labels"
            }
        ];

        // crio um objeto passando o array de estilos (styles) e definindo um nome para ele;
        var styledMap = new google.maps.StyledMapType(styles, {
            name: "Mapa Style"
        });

        // Aplicando as configurações do mapa
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');
    }


    // Função para carregamento assíncrono
    function loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDeHb17So0QupSGO_d6b8X-OyvJ32UQehs&sensor=true&callback=initialize";
        document.body.appendChild(script);


    }

</script>
    <div id="mapa">



    </div>

</body>


</html>

