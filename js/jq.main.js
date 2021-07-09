$(function(){

  //header stick to top and change style when scroll down
  const headerStick = function(){
    const hdTop = $("header").offset().top;

    $(window).scroll(function(){
      const scroll = $(window).scrollTop();
      if(scroll >= hdTop){
        $("header").css({
          position:"fixed",
          top:0,
          width:"100%"
        });
        $("header").addClass("stick");
      } else {
        $("header").css({position:"static"});
        $("header").removeClass("stick");
      }
    });
  }
  headerStick();

  //Light Slider Function Code
  $(".slider").lightSlider({
    item: 1,
    controls: true,
    prevHtml: '<i class="fa fa-angle-left"></i>',
    nextHtml: '<i class="fa fa-angle-right"></i>',
  });
  

  

});