
// store form HTML markup in a JS variable
// var formTemplate = $('#form-template form')[0];



$(document).ready( function() {

    

// handle clicks on the "Click me" button
$('.purchase-btn').click(function () {

  var datetimeslot = $(this).attr('date-timeslot');
  var date = $(this).attr('date');
  var timeslot = $(this).attr('timeslot');
  
  $('input[name="date-timeslot"]').val(datetimeslot);
  $('input[name="date"]').val(date);
  $('input[name="timeslot"]').val(timeslot);

  var formTemplate = $('#form-template').clone()[0];
  formTemplate.style.display='block';
  $('#form-template').remove();


// prepare SweetAlert configuration
var swalConfig = {
  title: 'Rezervace',
  content: formTemplate,
  // type: "input",
  showLoaderOnConfirm: false,
  // showCancelButton: true,
  focusConfirm: false,
// type: 'info',

  buttons: ["Zrušit", "Potvrdit"],

closeOnConfirm: false,
            closeOnCancel: false,
    closeModal: false,


  // confirmButtonText: 'x',
  //   '<i class="fa fa-thumbs-up"></i> Great!',
  // confirmButtonAriaLabel: 'Thumbs up, great!',
  // cancelButtonText:
  //   '<i class="fa fa-thumbs-down"></i>xx',
  // cancelButtonAriaLabel: 'Thumbs down'

};

  swal(swalConfig).then((result) => {
    $('.invalid-feedback').remove();
    $('input').removeClass('invalid');


    if(result){
    // alert(result)
    // console.log(result);


      setTimeout(function () {
      swal.stopLoading();
    }, 200);



     var errors = {
        user: 'Username is invalid',
        email: 'E-mail is invalid',
        phone: 'Phone is invalid'
      };

      var fields = '';
      $.each(errors, function(key, value) {
        if($('input[name="' + key + '"]').val() == ''){
          $('input[name="' + key + '"]').addClass('invalid').after('<div class="invalid-feedback">' + value + '</div>');
          fields = 1;
        }
      });

      if(fields != 1){

      // $('input[name="date-timeslot"]').val(datetimeslot);
        $.post( "/includes/plugins/layla-reservations/ajax.php", {
          user: $('input[name="user"]').val(),
          date: $('input[name="date"]').val(),
          datetimeslot: $('input[name="date-timeslot"]').val(),
          timeslot: $('input[name="timeslot"]').val()
        })
        .done(function( data ) {


        swal(
          'Těšíme se na Vás!',
          'Podrobnosti o rezervaci termínu jsme Vám poslali na e-mail.',
          'success'
        );

        $('.activeDay').click();

        $('input.invalid').removeClass('invalid');
        $('.invalid-feedback').remove();

        formTemplate.style.display='none';
        $( formTemplate ).appendTo( "body" );

        });
        
        }else{

          $('button[date-timeslot="'+datetimeslot+'"]').click();

        }
      

      }else{
        $('.invalid-feedback').remove();
        formTemplate.style.display='none';
        $( formTemplate ).appendTo( "body" );
      }


      }).catch(function () {  

 
return false;

    
      });




});

});

