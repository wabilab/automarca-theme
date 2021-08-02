import $ from 'jquery';
import * as bootstrap from "bootstrap";
import * as selectric from "selectric";
import * as slick from "slick-carousel"
/* import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks'; */
import { Loader } from "@googlemaps/js-api-loader";
const Modernizr = require("modernizr");

window.mobileAndTabletCheck = function () {
  let check = false;
  (function (a) {
    if (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
        a
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        a.substr(0, 4)
      )
    )
      check = true;
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
};


$(function () {

  $("html").addClass(mobileAndTabletCheck() ? "mobile" : "desktop");

  $("select").selectric();

  // var automarcaSelect = new Selectric('select')

  $(".home-slider").slick({
    lazyLoad: "ondemand",
    slidesToShow: 1,
    dots: true,
    arrows: false,
    infinite: true,
    responsive: [],
  });

  // $('#menu-open-button').on('click', function (e) {
  //   e.preventDefault();
  //   $("#menu-collapse").collapse("toggle");
  // })

  var menuCollapse = document.getElementById("menu-collapse");
  // console.log(menuCollapse);
  menuCollapse.addEventListener("shown.bs.collapse", function () {
    // console.log("QUI");
    $("#menu-open-button").addClass("is-active");
  });

  menuCollapse.addEventListener("hidden.bs.collapse", function () {
    // console.log("QUI");
    $("#menu-open-button").removeClass("is-active");
  });


  var checkFiltersCollapse = function () {
    if (window.innerWidth >= 992) {
      // console.log(window.innerWidth);

      var collapseElementList = [].slice.call(
        document.querySelectorAll(".collapse")
      );

      var collapseList = collapseElementList.map(function (collapseEl) {
        return new bootstrap.Collapse(collapseEl, {
          toggle: (collapseEl.id == 'filter-collapse'),
        });
      });

      var filterCollapse;
      $.each(collapseList, function (idx, collapseEl) {
        // console.log(collapseEl._selector);
        if (collapseEl._selector == "#filter-collapse") {
          collapseEl.show();

          setTimeout(() => {
            collapseEl.dispose();
            $("#filter-title-btn").removeAttr("data-bs-toggle");
            $("#filter-title-btn").removeAttr("data-bs-target");
            $("#filter-title-btn").off("click");
          }, 500);
        }
      });

    } else {
      
      var filterCollapse = document.getElementById("filter-collapse");
      new bootstrap.Collapse(filterCollapse, {
        toggle: false,
      });

    }
  }

  if($('#filter-collapse').length != 0) {
    checkFiltersCollapse();

    $(window).on('resize', function () {
      checkFiltersCollapse();
    });
  }

  if($('#map').length != 0) {

    var data = $('#map').data('branchOfficeData');

    // var branch_office = {
    //   name: "Automarca Spa",
    //   address: "Via Calzavara, 1<br>31057, Silea(TV)",
    //   contact: "info@automarca.it<br>+39 0422 3020",
    //   link: "https://goo.gl/maps/V9zxGJXrEtHYdqRJ7",
    //   center: {
    //     lat: 45.6534101007297,
    //     lng: 12.290490566933483
    //   }
    // }

    // console.log(JSON.stringify(branch_office));
    // console.log(data);

    const loader = new Loader({
      apiKey: "AIzaSyDFw5CdHkrCNR5VDKZzm3u28zJUgHUVT98",
      version: "weekly"
    });

    // m8,16c0,0 6,-5.582 6,-10s-2.686,-6 -6,-6s-6,1.582 -6,6s6,10 6,10zm-3,-11c0,-1.657 1.343,-3 3,-3s3,1.343 3,3s-1.343,3 -3,3s-3,-1.343 -3,-3z

    loader.load().then(() => {

      var pin = {
        path: "m8,16c0,0 6,-5.582 6,-10s-2.686,-6 -6,-6s-6,1.582 -6,6s6,10 6,10zm-3,-11c0,-1.657 1.343,-3 3,-3s3,1.343 3,3s-1.343,3 -3,3s-3,-1.343 -3,-3z",
        fillColor: '#0B2133',
        fillOpacity: 1,
        strokeWeight: 0,
        rotation: 0,
        scale: 5,
        anchor: new google.maps.Point(8, 16),
      }

      map = new google.maps.Map(document.getElementById("map"), {
        center: data.center,
        zoom: 17,
        styles: [{
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }]
          },
          {
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#616161"
            }]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [{
              "color": "#f5f5f5"
            }]
          },
          {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#bdbdbd"
            }]
          },
          {
            "featureType": "landscape.man_made",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ededed"
            }]
          },
          {
            "featureType": "landscape.man_made",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#ededed"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e3e3e3"
            }]
          },
          {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#757575"
            }]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e5e5e5"
            }]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          },
          {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }]
          },
          {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#757575"
            }]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
              "color": "#dadada"
            }]
          },
          {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#616161"
            }]
          },
          {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          },
          {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e5e5e5"
            }]
          },
          {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [{
              "color": "#eeeeee"
            }]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "color": "#bcd9e4"
            }]
          },
          {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
              "color": "#9e9e9e"
            }]
          }
        ]
      });

      var marker = new google.maps.Marker({
        position: map.getCenter(),
        icon: pin,
        map: map,
      });

      const infowindow = new google.maps.InfoWindow({
        content: "<div class='container-fluid'><div class='row'><div class='col-12'><h2 class='title-4'>" + data.name + "</h2><h6 class='title-6'>" + data.branch + "</h2><p style='margin-bottom: 10px'>" + data.address + "</p><p>" + data.contact + "</p><p><a href='" + data.link + "' target='_blank'>apri maps</a></p></div></div></div>",

      });

      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
          shouldFocus: false,
        });
      });


    });
  }

    var filterInput = $('.form-select'),
        radioInput = $('.filterradio'),
        brandInput = $('#brand'),
        modelInput = $('#model'),
        kmInput = $('#km-until'),
        maxPriceInput = $('#max-price'),
        fuelInput = $('#fuel_type'),
        yearInput = $('#year'),
        transmissioninput = $('#transmission'),
        noviceInput = $('#novice-drivers');
    
    filterInput.on('change' , () => {set_filters()});
    noviceInput.on('click' , () => {set_filters()});
    radioInput.on('click' , () =>{set_filters()});

    function set_filters(){
        let filter =  {
            post_type : 'auto-in-vendita',
            filters : { 
              /* tipologia : $('input[name="condition"]:checked').val(), */
              marca : brandInput.val(),
              modello : modelInput.val(),
              maxPrice : maxPriceInput.val(),
              km : kmInput.val(),
              anno : yearInput.val(),
              alimentazione : fuelInput.val(),
              cambio : transmissioninput.val(),
              novice : noviceInput.is(':checked') == true ? true : '',
          }
        }
        get_search_results_count(filter); 
    }

    function get_search_results_count(filterObj){
        console.log(filterObj);
        $.ajax({
        method: "GET",
        data : filterObj,
        url : home_url + '/wp-json/v2/get_search_results_count',
        }).done(function(response){
        console.log(response);
        $('#count-result').html(response);
        })
    }

    var filterSubmit = $('#filter-submit');

    filterSubmit.on('click' ,() => {compile_filter_url()});

    function compile_filter_url(){
        let filter = { 
          /* tipologia : $('input[name="condition"]:checked').val(), */
          query_var : {
            marca : brandInput.val(),
            modello : modelInput.val(),
            alimentazione : fuelInput.val(),
          },
          get_params : {
            maxPrice : maxPriceInput.val(),
            km : kmInput.val(),
            anno : yearInput.val(),
            cambio : transmissioninput.val(),
            novice : noviceInput.is(':checked') == true ? true : '',
          }
        };
        var searchUrl = home_url + '/nuovo/';
        var paramsArr =  [];
        let index = 0;
        for (const [key , value] of Object.entries(filter.query_var)){
            if (value != ''){
              if(filter.query_var.lenght < 2){
                searchUrl += value
              } else if(index == 0){
                searchUrl += value
                index++
              } else {
                searchUrl += '-' + value;
              }
            }
        }
        let params_index = 0;
        for(const [key , value] of Object.entries(filter.get_params)){
          if(value != '' && params_index == 0){
            let newParam = '?' + key + '=' + value;
            paramsArr.push(newParam);
            params_index++;
          }else if(value != ''){
            let newParam = '&' + key + '=' + value;
            paramsArr.push(newParam);
          }
        }
        paramsArr.forEach(el => {
            searchUrl += el;
        });

        window.location.href = searchUrl;
    }

    set_filters();

    $('#reset-search').on('click' ,function(){
      window.location.href = home_url + '/nuovo';
    })
    $('.remove-filter').on('click' , function(){
      switch ($(this).data('type')) {
        case 'marca' :
          brandInput.val('');
          compile_filter_url();
          break;
        case 'model' : 
          modelInput.val('');
          compile_filter_url();
          break;
        case 'alimentazione' : 
            fuelInput.val('');
            compile_filter_url()
            break;
        case 'prezzo' : 
          maxPriceInput.val('');
          compile_filter_url();
          break;
        case 'km' : 
          kmInput.val('');
          compile_filter_url();
          break;
        case 'anno_immatricolazione' : 
            yearInput.val('');
            compile_filter_url();
            break;
      } 
    }
    )

    $('.live-filter').on('change' , () => {compile_filter_url()});

    // CAR IMG SLIDER
    $(".car-img-slider").slick({
      lazyLoad: "ondemand",
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      infinite: true,
      responsive: [],
      asNavFor: '.car-thumb-slider'
    });
    // car-img-slider

    $(".car-thumb-slider").slick({
      lazyLoad: "ondemand",
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      infinite: true,
      responsive: [],
      asNavFor: '.car-img-slider'
    });

});
