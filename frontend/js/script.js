$(document).ready(function () {
    $('.autoWidth').lightSlider({
        autoWidth: true,
        loop: true,
        onSliderLoad: function () {
            $('.autoWidth').removeClass('cS-hidden');
        }
    });


});

$(document).ready( function () {
  $('#frontdatatable').DataTable();
} );
$(document).ready( function () {
  $('#frontdatatable2').DataTable();
} );




$(document).ready(function(){
    $('.gallery-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 5000,
                settings: {
                
                  slidesToShow: 4
                }
              },
            {
                breakpoint: 992,
                settings: {
                
                  slidesToShow: 3
                }
              },
            {
              breakpoint: 768,
              settings: {
               
                slidesToShow: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                dots: true,
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
   
    });
  });


  $(document).ready(function(){
    $('.donator-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        responsive: [
           
            {
                breakpoint: 992,
                settings: {
                
                  slidesToShow: 3
                }
              },
            {
              breakpoint: 768,
              settings: {
               
                slidesToShow: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                dots: true,
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
   
    });
  });


  $(document).ready(function(){
    $('.team-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        responsive: [
           
            {
                breakpoint: 992,
                settings: {
                
                  slidesToShow: 3
                }
              },
            {
              breakpoint: 768,
              settings: {
               
                slidesToShow: 2
              }
            },
            {
              breakpoint: 576,
              settings: {
                dots: true,
                arrows: false,
                slidesToShow: 1
              }
            }
          ]
   
    });
  });


  $(document).ready(function(){
    $(".postcat").change(function(){

      
    var hello = $( ".postcat" ).val();

      if(hello == 'book' || 'বই' ){
        $('.resto').hide();
        $('.etime').hide();
        
      }else if(hello == 'cloth' || 'কাপড়'){
        $('.resto').hide();
        $('.etime').hide();

      } else{
        $('.resto').show();
        $('.etime').show();
      }


    
    });
  });