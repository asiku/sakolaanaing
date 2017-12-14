<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function GetTgl(){
      date_default_timezone_set('Asia/Jakarta');
      return date('d-m-Y H:i:s');
    }

    public function GetTglE(){
      date_default_timezone_set('Asia/Jakarta');
      return date('Y-m-d');
    }

    public function GetTgltb(){
      date_default_timezone_set('Asia/Jakarta');
      return date('Y-m');
    }

    public function GetAbsen(){

      $tgl=$this->GetTglE();

      $rsth=DB::select('SELECT SUM(hadir)AS toth FROM tb_absensi WHERE DATE(tgl_absen)
      =:tgl_absen', ['tgl_absen' => $tgl]);

      $rsta=DB::select('SELECT SUM(alfa)AS tota FROM tb_absensi WHERE DATE(tgl_absen)
      =:tgl_absen', ['tgl_absen' => $tgl]);

      $rsts=DB::select('SELECT SUM(sakit)AS tots FROM tb_absensi WHERE DATE(tgl_absen)
      =:tgl_absen', ['tgl_absen' => $tgl]);

      $rsti=DB::select('SELECT SUM(izin)AS toti FROM tb_absensi WHERE DATE(tgl_absen)
      =:tgl_absen', ['tgl_absen' => $tgl]);

      $tmp= array_merge($rsth,$rsta,$rsts,$rsti);
      return json_encode($tmp);


    }


public function Lst_presensi($nis){
      $tgl=$this->GetTgltb();
      // $cek=DB::table('tb_absensi')->whereDate('tgl_absen',$tgl)->where('nis',$nis)->get();
      $cek=DB::table('tb_absensi')->whereDate('tgl_absen','like','%'.$tgl.'%')->where('nis',$nis)->get();
      return json_encode($cek);
}

    public function Cekabsen_cs(){
      // $tgl=$this->GetTglE();
      // $cek=DB::table('tb_absensi')->where('Date(tgl_absen)  ',$tgl)
      // ->where('nis',$nis)->get();
         $cek=DB::table('v_cknf')->get();

      return json_encode($cek);
    }


}
