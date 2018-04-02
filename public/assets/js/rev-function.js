jQuery(document).ready(function() {  

   jQuery("#slider1").revolution({
      sliderType:"standard",
      sliderLayout:"auto",
      delay:9000,
      gridwidth:1530,
      mouseScrollNavigation:"off",
      dottedOverlay:"twoxtwo",
      onHoverStop:"off",
      gridheight:800,
      navigation: {

            touch:{
                 touchenabled:"off",
                 swipe_treshold : 75,
                 swipe_min_touches : 1,
                 drag_block_vertical:false,
                 swipe_direction:"horizontal"
                },
            arrows: {
                 style:"",
                 enable:true,
                 rtl:false,
                 hide_onmobile:false,
                 hide_onleave:false,
                 hide_delay:200,
                 hide_delay_mobile:1200,
                 hide_under:767,
                 hide_over:9999,
                  tmp: '',
                 left : {
                        container:"slider",
                        h_align:"left",
                        v_align:"center",
                        h_offset:45,
                        v_offset:0,
                 },
                 right : {
                        container:"slider",
                        h_align:"right",
                        v_align:"center",
                        h_offset:45,
                        v_offset:0
                 }
              },                            
            bullets:{
                 style:"",
                 enable:true,
                 container:"slider",
                 rtl:false,
                 hide_onmobile:false,
                 hide_onleave:false,
                 hide_delay:200,
                 hide_delay_mobile:1200,
                 hide_under:500,
                 hide_over:9999,
                 tmp:"", 
                 direction:"horizontal",
                 space:8,       
                 h_align:"center",
                 v_align:"bottom",
                 h_offset:0,
                 v_offset:20
            },           

       },
            visibilityLevels:[1240,1024,778,480],
            gridwidth:1140,
            gridheight:800,           
            shadow:0,
            spinner:"off",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            disableProgressBar: "on",
            debugMode:false,
                fallbacks: {
                simplifyAll:"off",
                nextSlideOnWindowFocus:"off",
                disableFocusListener:false,
            }                                 

    });

    // ONE PAGE SLIDER
    jQuery("#slider2").revolution({
      sliderType:"standard",
      sliderLayout:"auto",
      delay:9000,
      gridwidth:1530,
      mouseScrollNavigation:"off",
      dottedOverlay:"twoxtwo",
      onHoverStop:"off",
      gridheight:800,
      navigation: {

            touch:{
                 touchenabled:"off",
                 swipe_treshold : 75,
                 swipe_min_touches : 1,
                 drag_block_vertical:false,
                 swipe_direction:"horizontal"
                },
            arrows: {
                 style:"",
                 enable:true,
                 rtl:false,
                 hide_onmobile:false,
                 hide_onleave:false,
                 hide_delay:200,
                 hide_delay_mobile:1200,
                 hide_under:767,
                 hide_over:9999,
                  tmp: '',
                 left : {
                        container:"slider",
                        h_align:"left",
                        v_align:"center",
                        h_offset:45,
                        v_offset:0,
                 },
                 right : {
                        container:"slider",
                        h_align:"right",
                        v_align:"center",
                        h_offset:45,
                        v_offset:0
                 }
              },                            
            bullets:{
                 style:"",
                 enable:true,
                 container:"slider",
                 rtl:false,
                 hide_onmobile:false,
                 hide_onleave:false,
                 hide_delay:200,
                 hide_delay_mobile:1200,
                 hide_under:500,
                 hide_over:9999,
                 tmp:"", 
                 direction:"horizontal",
                 space:8,       
                 h_align:"center",
                 v_align:"bottom",
                 h_offset:0,
                 v_offset:20
            },           

       },
            visibilityLevels:[1240,1024,778,480],
            gridwidth:1140,
            gridheight:800,           
            shadow:0,
            spinner:"off",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            hideThumbsOnMobile:"off",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            disableProgressBar: "on",
            debugMode:false,
                fallbacks: {
                simplifyAll:"off",
                nextSlideOnWindowFocus:"off",
                disableFocusListener:false,
            }                                 

    });          
});

