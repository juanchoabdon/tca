/*
 *  Document   : fe_contact.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Contact Page in Frontend
 */

var FeContact = function() {
    // Init Contact Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSignIn = function(){
        jQuery('.js-validation-fe-contact').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).after(error);
            },
            highlight: function(e) {
                jQuery(e).removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).prev().removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'fe-contact-name': {
                    required: true,
                    minlength: 2
                },
                'fe-contact-email': {
                    required: true,
                    email: true
                },
                'fe-contact-subject': {
                    required: true
                },
                'fe-contact-message': {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                'fe-contact-name': 'Please provide at least your first name',
                'fe-contact-email': 'Please enter your valid email address to be able to reach you back',
                'fe-contact-subject': 'Please select where woul you like to send your message',
                'fe-contact-message': 'What would you like to say?'
            }
        });
    };

    // Init Contact Map, for more examples you can check out https://hpneo.github.io/gmaps/
    var initMapContact = function(){
        if ( jQuery('#js-map-fe-contact').length ) {
            new GMaps({
                div: '#js-map-fe-contact',
                lat: 37.840,
                lng: -122.500,
                zoom: 13,
                disableDefaultUI: true,
                scrollwheel: false
            }).addMarkers([
                {lat: 37.840, lng: -122.500, title: 'Marker #1', animation: google.maps.Animation.DROP, infoWindow: {content: 'Company LTD'}}
            ]);
        }
    };

    return {
        init: function () {
            // Init Contact Form Validation
            initValidationSignIn();

            // Init Contact Map
            initMapContact();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ FeContact.init(); });