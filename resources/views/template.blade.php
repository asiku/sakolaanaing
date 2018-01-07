<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-width,initial-scale=1">
    <title> Schooll Kiosk </title>
<!-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"> -->
<!-- <link rel="stylesheet" href="{{ asset('jquerys/jquery-ui.css') }}"> -->
<link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"> -->


<!-- <script src="{{asset('jquerys/jquery-1.12.4.js')}}"></script>
<script src="{{asset('jquerys/jquery-ui.js')}}"></script> -->
<!-- <link rel="stylesheet" href="{{ asset('jquery-ui-1.12.1/jquery-uis.css') }}"> -->
<!-- <script src="{{asset('jquery-ui-1.12.1/jquery-1.12.4.js')}}"></script> -->
<!-- <script src="{{asset('js/jquery_3_2_1.min.js')}}"></script> -->
<!-- <script src="{{asset('jquery-ui-1.12.1/external/jquery/jquery.js')}}"></script>
<script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script> -->




<style type="text/css">

@font-face {
  font-family: Ubuntu;
  src: url('{{ asset('fonts/Ubuntu-Light.ttf') }}');
}

@font-face {
  font-family: FontAwesome;
  src: url('{{ asset('fonts/fontawesome-webfont.ttf') }}');
}


@font-face {
  font-family: Montserrat;
  src: url('{{ asset('fonts/Montserrat-Thin.ttf') }}');
}

@font-face {
  font-family: Barlow Condensed;
  src: url('{{ asset('fonts/BarlowCondensed-Medium.ttf') }}');
}

@font-face {
  font-family: 'Baloo Bhaina';
  src: url('{{ asset('fonts/BalooBhaina-Regular.ttf') }}');
}

/*@font-face {
  font-family: Chunkfive;
  src: url('{{ asset('fonts/Chunkfive.otf') }}');
}*/
.titlepresen{font-family: 'Ubuntu';font-size: 14px;}
#dtgl{font-family: 'Baloo Bhaina';}

/*aside span{
font-family: 'Barlow Condensed';
}*/

header h2 { font-family: 'Montserrat';}

header h2 > span{
    font-family: Montserrat;
}

nav{
  font-family: Barlow Condensed;
}

#hd{
  font-family: 'Ubuntu';font-size: 24px;
  color: #BEDB39;
  font-weight: bold;
}
.c-profile li{font-family: 'Ubuntu';font-size: 14px;
color: #FFF; line-height: 1.5em;
     height: auto; }
#tablepresensi{ font-family: 'Ubuntu';color:#FFF;width: 100%;text-align: center;
border-collapse: collapse;}
#tablepresensi tr:nth-child(even){background-color: #5F778C;}
/*#tablepresensi tr:nth-child(odd){background-color: #9AB6CF;}*/
#tablepresensi th{padding-top: 8px;padding-bottom: 8px;font-size: 14px;
  }
#tablepresensi tr{font-size: 14px;}
#th-or{color: #FD7400;}
.th-p{color:#A6BCCF;}
#tablepresensi tr:hover {background-color: #BEDB39;cursor: pointer;}
/*#c-totalpresensi li{font-family: 'Ubuntu';}*/
</style>

<!-- <script>
    $(function() {
       $( "#button-6" ).button({
          icons: {
             primary: "ui-icon-locked"
          },
          text: false
       });

    });
 </script> -->


  </head>
  <body>

<div id="fullpage">
  @include('navbar')
  @yield('sisi')
  @yield('main')
  @include('footer')
</div>
<!-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> -->
<!-- <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script> -->
<script src="{{asset('js/jquery-ui-1.12.1/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui-1.12.1/jquery-ui.js')}}"></script>


<script type="text/javascript">

var monthNames = ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"
];

function settitlebulan(){

var d = new Date();
document.getElementsByClassName("caribulan")[0].innerHTML=monthNames[d.getMonth()]
+" "+d.getFullYear();

  }

function fillthn(){
  var start_year = new Date().getFullYear();

  for (var i = start_year; i > start_year - 10; i--) {
    $('#cyear').append('<option value="' + i + '">' + i + '</option>');
  }

  for(var y=0;y<monthNames.length;y++){
    $('#cbulan').append('<option value="' + monthNames[y] + '">' + monthNames[y] + '</option>');
  }
}

function setImgpr(n,st){
  var img="";
  if (n===1&&st==="h"){
  img="<img  src=" + "{{asset('gbrs/buledhadir.png')}}" + " alt=hadir>";
  }
  else if (n===1&&st==="s") {
  img="<img  src=" + "{{asset('gbrs/buledsakit.png')}}" + " alt=alfa>";
  }
  else if (n===1&&st==="i") {
  img="<img  src=" + "{{asset('gbrs/buledizin.png')}}" + " alt=alfa>";
  }

  else if (n===1&&st==="a") {
  img="<img  src=" + "{{asset('gbrs/buledalfa.png')}}" + " alt=alfa>";
  }

  return  img;
}

function gTbp(ns){

// console.log( "{{url('lst_pr')}}" + "/" + ns);
  // console.log("{{url('lst_pr')}}");
  $.ajax({

    url: "{{url('lst_pr')}}" + "/" + ns,
    success: function( response ) {

      // console.log('list: '+response);


      var t = JSON.parse(response);
  // console.log('jml:'+t.length);
  //     console.log("inmilah: "+t[0].nis);
      // masalah bug slowly  view
      var data=$.map(t,function(ign,index) {

         var hd=t[index].hadir;
         var hs=t[index].sakit;
         var hi=t[index].izin;
         var ha=t[index].alfa;



        return "<tr>" +"<td>"+t[index].tgl_absen+ "</td>" +
        "<td>"+t[index].terlambat+ "</td>" +
        // "<td>"+t[index].hadir+ "</td>" +
        "<td>"+ setImgpr(t[index].hadir,"h") + "</td>" +
        // "<td>"+t[index].sakit+ "</td>" +
        "<td>"+setImgpr(t[index].sakit,"s")+ "</td>" +
        // "<td>"+t[index].izin+ "</td>" +
        "<td>"+setImgpr(t[index].izin,"i")+ "</td>" +
        // "<td>"+t[index].alfa+ "</td>"
        "<td>"+setImgpr(t[index].alfa,"a") + "</td>"
         +"</tr>";
      });


        // console.log("data: "+data);

     var datas= data.toString().replace(/,/g,"");

      var tb="<table id=tablepresensi>";
      var tb1 ="<tr><th><span id=th-or>Tanggal absen</span></th><th><span class=th-p>Terlambat</span></th><th><span class=th-p>Hadir</span></th><th><span class=th-p>Sakit</span></th>";
      var tb2="<th><span class=th-p>Izin</span></th><th><span class=th-p>Alfa</span></th></tr>";
      var tbclose="</table>"

      document.getElementsByClassName("tablepresensix")[0].innerHTML=tb+tb1+tb2+datas+tbclose;
      data=null;

      // t[0]['nis']

      //
      //  document.getElementById("np").innerHTML=t[0]['nis'];
      //  document.getElementById("na").innerHTML=t[0]['nama'];
      //  document.getElementById("le").innerHTML=t[0]['tk'];

    }
  });

}

function gNp(){
  //
  $.ajax({

    url: "{{url('cekpr')}}",
    success: function( response ) {

      console.log('np: '+response);
      // = JSON.parse(response)
      let t= JSON.parse(response) ;
console.log("nilai t:"+t);
console.log( t == "");

      if ( t == "") {
        document.getElementById("hd").innerHTML="";
        document.getElementById("np").innerHTML="";
        document.getElementById("na").innerHTML="";
        document.getElementById("le").innerHTML="";

        document.getElementById("np").setAttribute("value","");
        document.getElementById("na").setAttribute("value","");
        document.getElementById("le").setAttribute("value","");
      }
      else {
        document.getElementById("hd").innerHTML="Hadir";
        // document.getElementById("np").value="bak";
        // document.getElementById("na").value=t[0]['nama'];
        // document.getElementById("le").value=t[0]['tk'];

        document.getElementById("np").innerHTML=t[0]['nis'];
        document.getElementById("na").innerHTML=t[0]['nama'];
        document.getElementById("le").innerHTML=t[0]['tk'];

        document.getElementById("np").setAttribute("value",t[0]['nis']);
        document.getElementById("na").setAttribute("value",t[0]['nama']);
        document.getElementById("le").setAttribute("value",t[0]['tk']);
       // tingalikeun tabel

      }

    }

  });


}

function setJmlp(ns){
  $.ajax({

    url: "{{url('getabsenl')}}"+ "/" + ns,
    success: function( response ) {

      // console.log('getabsen:'+response);

      var t = JSON.parse(response);
      console.log('jml absen;'+t[0]['toth']);

       document.getElementById("jhadir").innerHTML="Hadir "+t[0]['toth'];
       document.getElementById("jalfa").innerHTML="Alfa "+t[1]['tota'];
       document.getElementById("jsakit").innerHTML="Sakit "+t[2]['tots'];
       document.getElementById("jizin").innerHTML="Izin "+t[3]['toti'];

    }
  });
}


function setAnim(){
  let b = parseInt($(".f-msg").css("width"));

  if(parseInt($(".f-msg").css("left"))>b){
    $(".f-msg").css({left:0});

  }
// else if (parseInt($(".f-msg").css("left"))==100) {
// alert('hore');
// //   $( ".f-msg" ).animate(
// //     { "left": "200px" }
// //
// //     , "slow" );
//  }
 $( ".f-msg" ).animate(
   { "left": "+=50px" }

   , "slow" );



}

$(document).ready(function () {

fillthn();
settitlebulan();

// var crbln=$( "#dtbln" ).datepicker({
//   changeMonth: true,
//         changeYear: true,
//         showButtonPanel: true,
//         dateFormat: 'MM yy',
//         // onClose: function(dateText, inst) {
//         //     $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
//         // }
// });


    $("#button-6").click(function () {
        $("#txttgl").datepicker("show");
    });

    var dialog =$( "#dialog-confirm" ).dialog({
       autoOpen: false,
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Ok": function() {
          var yr = $('#cyear').find(":selected").text();
          var bl = $('#cbulan').find(":selected").text();
document.getElementsByClassName("caribulan")[0].innerHTML=bl + " " + yr
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });




$(".buledimg").click(function () {
dialog.dialog( "open" );
});

// $("#txtbln").datepicker({
//   changeMonth: true,
//   changeYear: true,
//   showButtonPanel: true,
//   dateFormat: 'MM yy',
//   onClose: function(dateText, inst) {
//     $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
//     }
// });


$( "#txttgl" ).datepicker({
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true,
      // showOn: "button",
      // buttonImage: "{{asset('gbrs/search.png')}}",
      // buttonImageOnly: true,
      // buttonText: "Select date",
      // altField: "#txttgl"

});



function getcalcabsen() {

  $.ajax({

    url: "{{url('getabsen')}}",
    success: function( response ) {

      // console.log('getabsen:'+response);

      var t = JSON.parse(response);

       document.getElementById("jmlhadir").innerHTML=t[0]['toth'];
       document.getElementById("jmlalfa").innerHTML=t[1]['tota'];
       document.getElementById("jmlsakit").innerHTML=t[2]['tots'];
       document.getElementById("jmlizin").innerHTML=t[3]['toti'];

      // console.log('alfa'+t[1]['tota']);
      // console.log('sakit'+t[2]['tots']);
      // console.log('izin'+t[3]['toti']);

      //teangan eta budak nu absen
      gNp();

      gTbp(document.getElementById("np").getAttribute('value'));
      setJmlp(document.getElementById("np").getAttribute('value'));
    }
  });

}


setInterval(function(){

 setAnim();

    getcalcabsen();

    $.ajax({
      url: "{{url('gettgl')}}",
      success: function( response ) {
        var tgl=response.substring(0,10);
        var jam=response.substring(11, 19);
          document.getElementById("dtgl").innerHTML= '<p>'+tgl+'<br><span>'+jam+'</span></p>';


      }
    });
},1000);
});
</script>

  </body>
</html>
