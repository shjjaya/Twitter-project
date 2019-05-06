
TweenMax.from(".peoplegroup",5.5, {opacity:0, scale:0, ease:Bounce.easeOut});

// Wrap every letter in a span
$('.ml6 .letters').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml6 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: function(el, i) {
      return 50 * i;
    }
  }).add({
    targets: '.ml6',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });



  // Wrap every letter in a span
$('.ml2').each(function(){
  $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 1050,
    delay: function(el, i) {
      return 70*i;
    }
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 2000
  });






$(document).ready(function(){

   var $sm = 480;
   var $md = 768;

   function resizeThis() {
      $imgH = $('.middle img').width();
      if ($(window).width() >= $sm) {
         $('.left,.right,.section').css('height', $imgH);
      } else {
         $('.left,.right,.section').css('height', 'auto');
      }
   }

   resizeThis();

   $(window).resize(function(){
      resizeThis();
   });

   $(window).scroll(function() {
      $('.section').each(function(){
         var $elementPos = $(this).offset().top;
         var $scrollPos = $(window).scrollTop();

         var $sectionH = $(this).height();
         var $h = $(window).height();
         var $sectionVert = (($h/2)-($sectionH/4));


         if (($elementPos - $sectionVert) <= $scrollPos && ($elementPos - $sectionVert) + $sectionH > $scrollPos) {
            $(this).addClass('animate');
         } else {
            $(this).removeClass('animate');
         }
      });
   });

   $('.btn-primary').click(function(){

   });
});

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
