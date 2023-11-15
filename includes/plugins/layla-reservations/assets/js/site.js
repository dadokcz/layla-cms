// call this from the developer console and you can control both instances
var calendars = {};

$(document).ready( function() {



  // assuming you've got the appropriate language files,
  // clndr will respect whatever moment's language is set to.
  // moment.lang('ru');

  // here's some magic to make sure the dates are happening this month.
  var thisMonth = moment().format('YYYY-MM');

  var eventArray = [
    { startDate: thisMonth + '-10', endDate: thisMonth + '-14', title: 'Multi-Day Event' },
    { startDate: thisMonth + '-21', endDate: thisMonth + '-23', title: 'Another Multi-Day Event' }
  ];

  // the order of the click handlers is predictable.
  // direct click action callbacks come first: click, nextMonth, previousMonth, nextYear, previousYear, or today.
  // then onMonthChange (if the month changed).
  // finally onYearChange (if the year changed).

  calendars.clndr1 = $('.cal1').clndr({
    events: eventArray,
    // constraints:{
    //   startDate: '2013-11-01',
    //   endDate: '2013-11-15'
    // },
    clickEvents: {
      click: function(target) {
        console.log(target);
        $('.reservations-table').remove();

        if($(target.element).hasClass('inactive')) {
        
          console.log('not a valid datepicker date.');
        
        } else {



          // console.log('VALID datepicker date.');
          var date = $(target.element).attr('attr-date');

          $('.reservations').remove();  
          $('.custom-slots').remove();  
          

          $('.activeDay').removeClass('activeDay');
          
          var index = $(target.element).parent().index()+1;

          $(target.element).parent().parent().find('tr:nth-child('+index+')').after('<tr class="reservations"><td colspan="7"><div class="reservations-table animated flipInX"><h3>Volné Rezervace</h3></div></td></tr>');
          // $(target.element).parent().css('opacity', '0.5');
          var user;

          if(UrlExists("/data/timeslots-"+date+".json")){

              var custom_slots = "-"+date;
          }else{

              var custom_slots = '';
          }


          $.getJSON( "/data/timeslots"+custom_slots+".json", function( data ) {
          var items = [];
          $.each( data, function( key, val ) {

              date_string = key.slice(0, 2) + ":" + key.slice(2);
              date_string = date_string.slice(0, 8) + ":" + date_string.slice(8);
              date_string = date_string.slice(0, 5) + " " + date_string.slice(5);
              date_string = date_string.slice(0, 7) + " " + date_string.slice(7);

              var button_date = date+'-'+key;

              user = get_reservations(''+date+'-'+key+'');
              

              if(user == 0){reservationsList = '<span class="green">Volný termín ('+val+')</span>'; button_disabled = '';}else{reservationsList = user; button_disabled = 'disabled';}
              items.push( "<div class='list' id='" + key + "'><span class='list-time'><i class='fa fa-clock-o'></i> " + date_string + "</span><span class='list-details'>" + reservationsList + "</span><span class='list-actions'><button date-timeslot='"+button_date+"' date='"+date+"' timeslot='"+key+"' class='btn purchase-btn' "+button_disabled+">Rezervovat</button></span></div>" );
              button_disabled = '';

              
          });

          $( "<div>", {
            "class": "reservations-table",
            html: items.join( "" )
          }).appendTo( ".reservations-table" );

          });

          if(custom_slots != ''){

          // DEFAULT SLOTS

          setTimeout(function () {

      
          $.getJSON( "/data/timeslots.json", function( data ) {
          var items2 = [];
          var items_count;
          $.each( data, function( key, val ) {

              date_string = key.slice(0, 2) + ":" + key.slice(2);
              date_string = date_string.slice(0, 8) + ":" + date_string.slice(8);
              date_string = date_string.slice(0, 5) + " " + date_string.slice(5);
              date_string = date_string.slice(0, 7) + " " + date_string.slice(7);

              var button_date = date+'-'+key;

              user = get_reservations(''+date+'-'+key+'');
              

              if(user == 0){reservationsList = '<span class="green">Volný termín ('+val+')</span>'; button_disabled = '';}else{reservationsList = user; button_disabled = 'disabled';}
              if(user != 0){
              items2.push( "<div class='list' id='" + key + "'><span class='list-time'><i class='fa fa-clock-o'></i>" + date_string + "</span><span class='list-details'><i class='fa fa-clock-o'></i>" + reservationsList + "</span><span class='list-actions'><i class='fa fa-clock-o'></i><button date-timeslot='"+button_date+"' date='"+date+"' timeslot='"+key+"' class='btn purchase-btn' "+button_disabled+">Rezervovat</button></span></div>" );
              }
              button_disabled = '';

              
          });

          if(items2.length > 0){
          $( "<div>", {
            "class": "reservations-table reservations-table-customslots",
            html: items2.join( "" )
          }).appendTo( ".reservations-table:first-child" );
            $('.reservations-table').last().prepend('<span class="custom-slots">Rezervace ve slotech</span><br/><br/>');
          }
          });

          }, 200);


          }


function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}


function get_reservations( date){

  $.getScript( "/includes/plugins/layla-reservations/assets/js/script.js", function( data, textStatus, jqxhr ) {
      console.log( "Load was performed." );
    });
    
    
  var mydata = '';
  $.ajax({
    url: "/data/reservation-"+date+".json",
    async: false,
    cache: false,
    dataType: 'json',
    success: function (json) {
      // mydata = json.whatever;
      $.each( json, function( key, val ) {

        if(key.search(" ") > 0){
        var userField = key.split(' ');
        var userLastname = userField[1].charAt(0);
        var user_firstname = userField[0];
        }else{
        var userLastname = key;
        var user_firstname = '';
        }
        mydata += '<div class="red">'+user_firstname+' '+userLastname+'</div>';
      
    });

 
    },
    error: function(xhr, textStatus, errorThrown){
      mydata += 0;
    }
  });

  // alert(mydata);


   return mydata;

  // var line = null;

  // $.getJSON("/data/reservation-"+date+".json", function( data ) {

  //   $.each( data, function( key, val ) {
  //       return key;
  //   });
  // })
  // .fail(function() { return 'no';  })
  // .always(function() {   });
  // return line;
}



          // $.getScript( "js/script.js", function( data, textStatus, jqxhr ) {
          //   console.log( "Load was performed." );
          // });
      

          $(target.element).addClass('activeDay');

        }
      },
      nextMonth: function() {
        console.log('next month.');
        init_past_days();
      },
      previousMonth: function() {
        console.log('previous month.');
        init_past_days();
      },
      onMonthChange: function() {
        console.log('month changed.');
        init_past_days();
      },
      nextYear: function() {
        console.log('next year.');
        init_past_days();
      },
      previousYear: function() {
        console.log('previous year.');
        init_past_days();
      },
      onYearChange: function() {
        console.log('year changed.');
        init_past_days();
      }
    },
    multiDayEvents: {
      startDate: 'startDate',
      endDate: 'endDate'
    },
    showAdjacentMonths: true,
    adjacentDaysChangeMonth: false
  });

  // calendars.clndr2 = $('.cal2').clndr({
  //   template: $('#template-calendar').html(),
  //   events: eventArray,
  //   startWithMonth: moment().add('month', 1),
  //   clickEvents: {
  //     click: function(target) {
  //       console.log(target);
  //     }
  //   }
  // });




function init_past_days(){
  $('.past, .past *').css('cursor', 'default');
  $('.past, .past *').css('background', '#efefef');
  $('.past, .past *').css('color', '#aeaeae');
  $('.past, .past *').css('opacity', '0.8');

  $('.past, .past *').click(function () {
    return false;
  });
  }
  init_past_days();

  // bind both clndrs to the left and right arrow keys
  $(document).keydown( function(e) {
    if(e.keyCode == 37) {
      // left arrow
      calendars.clndr1.back();
      calendars.clndr2.back();
    }
    if(e.keyCode == 39) {
      // right arrow
      calendars.clndr1.forward();
      calendars.clndr2.forward();
    }
  });

});