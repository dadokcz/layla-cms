(function($){
  
    var $container    = $("#container"),
        $blocks    = $("#blocks"),
        heightContainer = $container.outerHeight(),
        scrolledHeight = $container[0].scrollHeight,
        mousePos = 0,
        posY = 0,
        hDiff = ( scrolledHeight / heightContainer ) - 10
    
    $container.mousemove(function(e){
      mousePos = e.pageY - this.offsetTop;
    });
  
    setInterval(function(){
		  $blocks.css({marginTop: - mousePos*hDiff });

	  }, 10);

})(jQuery);
