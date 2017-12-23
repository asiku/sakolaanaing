<!-- 3ndcommit -->

@extends('template')

@section('sisi')
@include('sidebar')
@stop

@section('main')

<div class="c-absen">
  <div class="d-absen">

   <div class="c-caritgl">
     <ul class="ulcari">
       <li> <input type="text" id="txttgl">
         <span id="button-6"><img class="cariimg" src="{{asset('gbrs/cari.png')}}" alt="buledhadir">
         </span></li>
       <!-- <li><img  src="{{asset('gbrs/panahbawah.png')}}" alt="buledhadir"></li> -->
       <li><span class="caribulan"></span><img class="buledimg" src="{{asset('gbrs/panahbawah.png')}}" alt="buledhadir"></li>
     </ul>
   </div>

  <div class="c-profile">

    <div id="fotoprofile">
    <img id="i-fotoprofile" src="{{asset('gbrs/ayana.jpg')}}" alt="buledhadir">
    </div>

    <ul>
      <li ><img class="buledprofiles" src="{{asset('gbrs/buledprofile.png')}}" alt="buledhadir">
        <span id="hd">Hadir</span></li>
      <li id="na"></li>
      <li id="np"></li>
      <li id="le"></li>
    </ul>
  </div>

  <div class="c-tablepresensi">
    <div class="tablepresensix">
    </div>
  </div>

<div class="c-totalpresensi">
  <ul>
    <li><span id="jalfa"></span></li>
    <li><span id="jizin"></span></li>
    <li><span id="jsakit"></span></li>
    <li><span id="jhadir"></span></li>
  </ul>
</div>

  </div>
</div>
<div id="dialog-confirm" title="Cari Data Presensi">
  <p><span class="ui-icon  ui-icon-calculator" style="float:left; margin:12px 12px 20px 0;">
  </span>Pilih Bulan dan Tahun untuk Mencari Data Presensi di Bulan dan Tahun Tersebut!</p>
  <!-- <div id="dtbln">

  </div>
   -->
  <select name="cbulan" id="cbulan"></select>
  <select name="cyear" id="cyear"></select>

</div>
@stop
