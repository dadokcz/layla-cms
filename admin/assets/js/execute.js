
// demo.initDashboardPageCharts();


$( ".theme-list" ).click(function() {

  swal({
    title: $(this).attr('swal-title'),
    text: $(this).attr('swal-text'),
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: $(this).attr('swal-ok'),
    cancelButtonText: $(this).attr('swal-cancel'),
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
     
      $(".theme-list").removeClass('theme-selected');
      $('select[name="default_template"]').val($(this).attr("data-id"));
      $(this).addClass('theme-selected');

      return true;
    // result.dismiss can be 'cancel', 'overlay',
    // 'close', and 'timer'
    } else if (result.dismiss === 'cancel') {
      return false;
    }
  });


});


sortable_posts();

function sortable_posts(){
$("table.pages tbody").sortable({
  // group: 'simple_with_animation',
  // pullPlaceholder: false,
  // animation on drop
          handle:'.sort',
          // axis:'y',

  update: function (event, ui) {
		  	
        // $(ui.item).find('td').first().html(ui.item.index()+1);

			  
            $.get( "includes/sort-data.php", { slug: $(ui.item).attr('row-slug'), id: $(ui.item).attr('row-id'), sort: ui.item.index()+1, post_type: $(ui.item).attr('row-posttype') } );

            }

});


$("#blocks").sortable({
  // group: 'simple_with_animation',
          axis:'y',

  update: function (event, ui) {

            // $(ui.item).attr('row-sort', ui.item.index());

            var menu;
            // var i = 1;
            $('.sidebar-wrapper .ui-sortable li').each(function( index ) {

              if($(this).attr('row-id') != null){
                menu += $(this).attr('row-id')+"-"+index+",";
              }

              // menus[i]['sort'] = ui.item.index();
            });
            // alert(menu);




            
            $.get( "includes/sort-data.php", { menu: menu } );




            }

});

}


function ArrayToURL(array) {
  var pairs = [];
  for (var key in array)
    if (array.hasOwnProperty(key))

      pairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(array[key]));
  return pairs.join('&');
}





function confirm(title, desc, yes, no){
  swal({
    title: text,
    text: desc,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: yes,
    cancelButtonText: no,
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      swal(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
      return true;
    // result.dismiss can be 'cancel', 'overlay',
    // 'close', and 'timer'
    } else if (result.dismiss === 'cancel') {
      return false;
    }
  })
}




$('.confirmation').click(function(e) {
  
e.preventDefault(); // Prevent the href from redirecting directly
var linkURL = $(this).attr("href");
var title = $(this).attr("swal-title");
var text = $(this).attr("swal-text");
var confirm = $(this).attr("swal-confirm");
var cancel = $(this).attr("swal-cancel");

  swal({
    title: title,
    text: text,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: confirm,
    cancelButtonText: cancel,
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false,
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      // swal(
      //   'Deleted!',
      //   'Your file has been deleted.',
      //   'success'
      // );
      warnBeforeRedirect(linkURL);
      // return true;
    // result.dismiss can be 'cancel', 'overlay',
    // 'close', and 'timer'
    } else if (result.dismiss === 'cancel') {
      return false;
    }
  })



});




 function warnBeforeRedirect(linkURL) {
    // swal({
    //   title: title, 
    //   text: text, 
    //   type: "warning",
    //   confirmButtonText: confirm,
    //   cancelButtonText: cancel,
    //   showCancelButton: true
    // }, function() {
    //   // Redirect the user
    //   // window.location.href = linkURL;
    // });
    
      window.location.href = linkURL;
  }



$( 'a' ).on( 'click', function() {
  // alert('x');
        // setTimeout(function (this) {
        // window.location.href = this.href;
      // }, 3000);

   

  // window.location.href = this.href;
    // $.getScript( '/admin/assets/js/demo.js', function( data, textStatus, jqxhr ) {
    //     // do some stuff after script is loaded
    // } );
    //  $.getScript( '/admin/assets/js/filemanager.js', function( data, textStatus, jqxhr ) {
    //     // do some stuff after script is loaded
    // } );

} );




