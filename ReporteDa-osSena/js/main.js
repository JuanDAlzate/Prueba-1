$(document).on('ready',function(){
   $('.slider').on('mousedown', function(e){
      var pos=$(e.currentTarget).offset()
         posX=e.pageX-pos.left;
         $('.slider > .progress').css('width',posX='px')

   });
});