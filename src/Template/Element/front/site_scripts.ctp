<?php
use Cake\Core\Configure;
?>
<!-- Vendor -->
<?php
echo $this->Html->script([
    '/vendor/jquery/jquery.min.js',
    '/vendor/jquery.appear/jquery.appear.min.js',
    '/vendor/jquery.easing/jquery.easing.min.js',
    '/vendor/jquery-cookie/jquery-cookie.min.js',
    '/vendor/bootstrap/js/bootstrap.min.js',
    '/vendor/common/common.min.js',
    '/vendor/jquery.validation/jquery.validation.min.js',
    '/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js',
    '/vendor/jquery.gmap/jquery.gmap.min.js',
    '/vendor/jquery.lazyload/jquery.lazyload.min.js',
    '/vendor/isotope/jquery.isotope.min.js',
    '/vendor/owl.carousel/owl.carousel.min.js',
    '/vendor/magnific-popup/jquery.magnific-popup.min.js',
    '/vendor/vide/vide.min.js',
    '/vendor/jquery.countdown/jquery.countdown.min.js',
]);
?>

<!-- Theme Base, Components and Settings -->
<?php
echo $this->Html->script([
    '/js/theme.js'
]);
?>

<!-- Current Page Vendor and Views -->
<?php
echo $this->Html->script([
    '/vendor/rs-plugin/js/jquery.themepunch.tools.min.js',
    '/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js'
]);
?>

<!-- Current Page Vendor and Views -->
<?php
echo $this->Html->script([
    '/js/views/view.contact.js'
]);
?>

<!-- Demo -->
<?php
echo $this->Html->script([
    '/js/demos/demo-church.js'
]);
?>

<!-- Theme Custom -->
<?php
echo $this->Html->script([
    '/js/custom.js'
]);
?>

<?php
echo $this->Html->script([
    '/js/chat.js'
]);
?>

<!-- Theme Initialization Files -->
<?php
echo $this->Html->script([
    '/js/theme.init.js'
]);
?>

<?php //echo $this->Html->script('/assets/javascripts/ui-elements/examples.lightbox.js'); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhdicLqasajKoDX4ZNY6fsIFn8FkZx0Tg"></script>
<script>

    /*
     Map Settings

     Find the Latitude and Longitude of your address:
     - http://universimmedia.pagesperso-orange.fr/geo/loc.htm
     - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

     */

    // Map Markers
    var company_name = '<?php echo Configure::read('companyName'); ?>';
    var company_address = '<?php echo Configure::read('companyAddress'); ?>';
    var mapMarkers = [{
        address: company_address,
        html: "<strong>" + company_name + "</strong><br>Bangladesh <br><br><a href='#' onclick='mapCenterAt({latitude: 51.505106, longitude: -0.138329, zoom: 16}, event)'>[+] zoom here</a>",
        icon: {
            image: "img/demos/church/others/pin.png",
            iconsize: [28, 35],
            iconanchor: [28, 35]
        }
    }];

    // Map Initial Location
    var initLatitude = 51.505106;
    var initLongitude = -0.138329;

    // Map Extended Settings
    var mapSettings = {
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true
        },
        scrollwheel: false,
        markers: mapMarkers,
        latitude: initLatitude,
        longitude: initLongitude,
        zoom: 14
    };

    // Map Center At
    var mapCenterAt = function(options, e) {
        e.preventDefault();
        $('#googlemaps').gMap("centerAt", options);
    }

    // Custom Init Map
    var initMapAt = function(options, e) {
        e.preventDefault();
        $('#googlemaps').animate({
            height: 350
        }, 300, function(){
            setTimeout(function(){
                $('.custom-view-our-location').animate({
                    bottom: '-160px'
                }, 300);
            }, 1000);

            var map = $('#googlemaps').gMap(mapSettings),
                mapRef = $('#googlemaps').data('gMap.reference');

            // Styles from https://snazzymaps.com/
            var styles = [{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"simplified"},{"color":"#e94f3f"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"gamma":"0.50"},{"hue":"#ff4a00"},{"lightness":"-79"},{"saturation":"-86"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"hue":"#ff1700"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"poi","elementType":"all","stylers":[{"color":"#e74231"},{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#4d6447"},{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"color":"#f0ce41"},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"color":"#363f42"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#231f20"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#6c5e53"}]},{"featureType":"transit","elementType":"all","stylers":[{"color":"#313639"},{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.text","stylers":[{"hue":"#ff0000"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"simplified"},{"hue":"#ff0000"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#0e171d"}]}];

            var styledMap = new google.maps.StyledMapType(styles, {
                name: 'Styled Map'
            });

            mapRef.mapTypes.set('map_style', styledMap);
            mapRef.setMapTypeId('map_style');
        });
    }



</script>