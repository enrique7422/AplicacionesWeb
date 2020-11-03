
var txtLatitud = document.getElementById("txtLatitud"); 
var txtLongitud = document.getElementById("txtLongitud"); 

var jkfjd = document.get
var map = L.map('mapid').setView([23.7369202, -99.1409509], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


map.doubleClickZoom.disable()

var marker = L.marker([23.7369202, -99.1409509]).addTo(map)
.bindPopup('Seleccione Un Punto De Ubicación.<br> ¡Estoy Aqui!.')
.openPopup();

L.marker;

function onMapClick(e) {
    map.removeLayer(marker);
    marker = new L.Marker(e.latlng, {draggable:true});
    map.addLayer(marker);
        
    marker.bindPopup("<b>Aqui Estoy!</b><br/>Latitud: "+e.latlng.lat+"<br/>Longitud: "+e.latlng.lng).openPopup();
    txtLatitud.value = e.latlng.lat;
    txtLongitud.value = e.latlng.lng;      
}

map.on('click', onMapClick);


