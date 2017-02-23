/**
 * Created by heiglandreas on 30.07.14.
 */
(function($){
    $.fn.orgHeiglGeolocation = function(){

        return this.map(function(){
            var input = $('[name="' + $(this).attr('name') + '"]');
            var lll = input.val().match(/([-]?\d{1,2}(\.\d+)?)\D+?([-]?\d{1,3}(\.\d+)?)/);
            if (! lll) {
                lll = [0,0,0,0,0];
            }
            var ll = {'lat':lll[1],'lng':lll[3]};
            var wrapper = $('#' + $(this).attr('name').replace(/[\[\]]/g,'_') + '_wrapper');
            var mapDiv  = wrapper.find('.map').first();
            var mds = mapDiv.identify()[0];
            $(this).css({display:'none'});
            mapDiv.css({width:'100%',height:'200px'});
            /** global: L */
            var map = L.map(mds);

            var openstreetmap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>',
                maxZoom: 18
            });

            var opencyclemap = L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>',
                maxZoom: 18
            });

            var shading = L.tileLayer('http://tiles.openpistemap.org/landshaded/{z}/{x}/{y}.png', {
                opacity: 0.6
            });
            map.setView(ll, 5)
                .addLayer(openstreetmap);

            L.control.layers({
                'OpenStreetMap' : openstreetmap,
                'OpenCycleMap'  : opencyclemap
            },{
                'Hillshading' : shading
            },{
                'position' : 'bottomleft'
            }).addTo(map);

            // Set a marker to the map
            var marker = L.marker(ll).addTo(map);

            marker.on('move', function(e){
                input.val(e.latlng.lat + ' ' + e.latlng.lng).trigger('change');
            });
            map.on('click', function(e){
                marker.setLatLng(e.latlng);
            })

            return {'map': map, 'marker': marker};
        });

    };
}(jQuery));

(function($){
    var jQuery_anonymousElementCounter = 0;
    $.fn.identify = function() {
        var prefix = 'anonymous_jquery_id';
        return this.map(function () {
            if (this.id) {
                return this.id;
            }
            var id = prefix + '_' + jQuery_anonymousElementCounter++;
            $(this).attr('id', id);
            return id;
        });
    }
})(jQuery);
