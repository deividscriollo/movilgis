$(function(){
  // When the window has finished loading google map
    // google.maps.event.addDomListener(window, 'load', init);
    var map;
      require([
        "esri/map", "esri/geometry/webMercatorUtils", "dojo/dom", 
        "dojo/domReady!"
      ], function(
        Map, webMercatorUtils, dom
      ) {
        map = new Map("map1", {
      center: [-78.216, 0.328],
      zoom: 12,
      basemap: "streets",
      logo:false
        });
        map.on("load", function() {
          //after map loads, connect to listen to mouse move & drag events
          map.on("mouse-move", showCoordinates);
          map.on("mouse-drag", showCoordinates);
        });

        function showCoordinates(evt) {
          //the map is in web mercator but display coordinates in geographic (lat, long)
          var mp = webMercatorUtils.webMercatorToGeographic(evt.mapPoint);
          //display mouse coordinates
          dom.byId("info").innerHTML = mp.x.toFixed(3) + ", " + mp.y.toFixed(3);
        }
      });
});