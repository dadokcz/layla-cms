type = ['','info','success','warning','danger'];


// demo = {
//     initPickColor: function(){
//         $('.pick-class-label').click(function(){
//             var new_class = $(this).attr('new-class');
//             var old_class = $('#display-buttons').attr('data-class');
//             var display_div = $('#display-buttons');
//             if(display_div.length) {
//             var display_buttons = display_div.find('.btn');
//             display_buttons.removeClass(old_class);
//             display_buttons.addClass(new_class);
//             display_div.attr('data-class', new_class);
//             }
//         });
//     },

//     initFormExtendedDatetimepickers: function(){
//         $('.datetimepicker').datetimepicker({
//             icons: {
//                 time: "fa fa-clock-o",
//                 date: "fa fa-calendar",
//                 up: "fa fa-chevron-up",
//                 down: "fa fa-chevron-down",
//                 previous: 'fa fa-chevron-left',
//                 next: 'fa fa-chevron-right',
//                 today: 'fa fa-screenshot',
//                 clear: 'fa fa-trash',
//                 close: 'fa fa-remove'
//             }
//          });
//     },

//     initDocumentationCharts: function(){
//         /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

//         dataDailySalesChart = {
//             labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
//             series: [
//                 [22, 17, 7, 17, 23, 18, 38]
//             ]
//         };

//         optionsDailySalesChart = {
//             lineSmooth: Chartist.Interpolation.cardinal({
//                 tension: 0
//             }),
//             low: 0,
//             high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
//             chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
//         }

//         var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

//         md.startAnimationForLineChart(dailySalesChart);
//     },

//     initDashboardPageCharts: function(){

//         /* ----------==========     Daily Sales Chart initialization    ==========---------- */

//         dataDailySalesChart = {
//             labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S', 'T', 'W', 'T', 'F', 'S', 'S', 'T', 'W', 'T', 'F', 'S', 'S', 'T', 'W', 'T', 'F', 'S', 'S'],
//             series: [
//                 [22, 17, 7, 17, 23, 18, 38, 17, 7, 17, 23, 18, 38, 17, 7, 17, 23, 18, 38, 17, 7, 17, 23, 18, 38]
//             ]
//         };

//         optionsDailySalesChart = {
//             lineSmooth: Chartist.Interpolation.cardinal({
//                 tension: 0
//             }),
//             low: 0,
//             high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
//             chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
//         }

//         var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

//         md.startAnimationForLineChart(dailySalesChart);



//         /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

//         dataCompletedTasksChart = {
//             labels: ['12am', '3pm', '6pm', '9pm', '12pm', '3am', '6am', '9am'],
//             series: [
//                 [230, 750, 450, 300, 280, 240, 200, 190]
//             ]
//         };

//         optionsCompletedTasksChart = {
//             lineSmooth: Chartist.Interpolation.cardinal({
//                 tension: 0
//             }),
//             low: 0,
//             high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
//             chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
//         }

//         var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

//         // start animation for the Completed Tasks Chart - Line Chart
//         md.startAnimationForLineChart(completedTasksChart);



//         /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

//         var dataEmailsSubscriptionChart = {
//           labels: ['25', '50', '75', '100'],
//           series: [
//             [542, 443, 320, 780]

//           ]
//         };
//         var optionsEmailsSubscriptionChart = {
//             axisX: {
//                 showGrid: false
//             },
//             low: 0,
//             high: 1000,
//             chartPadding: { top: 0, right: 5, bottom: 0, left: 0}
//         };
//         var responsiveOptions = [
//           ['screen and (max-width: 640px)', {
//             seriesBarDistance: 5,
//             axisX: {
//               labelInterpolationFnc: function (value) {
//                 return value[0];
//               }
//             }
//           }]
//         ];
//         var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);

//         //start animation for the Emails Subscription Chart
//         md.startAnimationForBarChart(emailsSubscriptionChart);

//     },

//     initGoogleMaps: function(){
//         var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
//         var mapOptions = {
//           zoom: 13,
//           center: myLatlng,
//           scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
//           styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

//         }
//         var map = new google.maps.Map(document.getElementById("map"), mapOptions);

//         var marker = new google.maps.Marker({
//             position: myLatlng,
//             title:"Hello World!"
//         });

//         // To add the marker to the map, call setMap();
//         marker.setMap(map);
//     },

// 	showNotification: function(from, align){
//     	color = Math.floor((Math.random() * 4) + 1);

//     	$.notify({
//         	icon: "notifications",
//         	message: "Welcome to <b>Material Dashboard</b> - a beautiful freebie for every web developer."

//         },{
//             type: type[color],
//             timer: 4000,
//             placement: {
//                 from: from,
//                 align: align
//             }
//         });
// 	}

// }



if( $("input[type=file].with-preview").length ){
    $("input.file-upload-input").MultiFile({
        list: ".file-upload-previews"
    });
}







$(".setvisibility").click(function() {

    var _this = $(this);
    var visibility = _this.attr("data-visibility");
    var id = _this.attr("data-id");
    var data_slug = _this.attr("data-slug");
    var post_type = _this.attr("data-post-type");

    if(visibility == 1){var setvisibility = 0}else{var setvisibility = 1}

    $.ajax({
        method: "GET",
        url: "./includes/sort-data.php",
        dataType: "html",
        data: { data_visibility: visibility, data_id: id, post_type: post_type, data_slug: data_slug },
        success: function(results){
            if(visibility == 1){
            _this.css('opacity',1);
            }else{
            _this.css('opacity',0.5);
            }
            // alert(results);
        },
        error : function (e) {
            console.log(e);
        }
    });
    
    _this.attr("data-visibility", setvisibility);

    return false;

});



$(".deletePhoto").click(function() {


    var _this = $(this);
    var post = _this.attr("attr-post");
    var file = _this.attr("attr-file");
    var post_type = _this.attr("post-type");


    $.ajax({
        method: "GET",
        url: "functions.php",
        dataType: "html",
        data: { delete_photo: file, post: post, post_type: post_type },
        success: function(results){
            _this.parent().hide();
            // alert(results);
        },
        error : function (e) {
            console.log(e);
        }
    });

    return false;

});


$(".addCover a").click(function() {

    var _this = $(this);
    var post = _this.attr("attr-post");
    var file = _this.attr("attr-file");

    $.ajax({
        method: "GET",
        url: "functions.php",
        dataType: "html",
        data: { add_cover_photo: file, post: post },
        success: function(results){
            $('figure').removeClass('cover-active');
            _this.parent().addClass('cover-active');
            // alert(results);
        },
        error : function (e) {
            console.log(e);
        }
    });

    return false;

});

// function motioncontainer(){ 
//     $('#motioncontainer').css('height', vyskaSidebaru+'px !important');
//     $.getScript( "assets/js/motiongallery2.js" );
//     alert(vyskaSidebaru);
// }



// motioncontainer();

    
$(document).ready(function() {

    var vyskaSidebaru = $('.sidebar-wrapper').height()-50;
    $('#motioncontainer, #motiongallery').height(vyskaSidebaru);

    // $('.sidebar-wrapper').css('overflow', 'scroll !important');


    $("#motioncontainer a").click(function() {



    });



});








