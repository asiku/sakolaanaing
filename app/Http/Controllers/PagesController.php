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

public function GetTotabsen($nis){
  $tgl=$this->GetTgltb();

  $rsth=DB::table('tb_absensi')->select(DB::raw("sum(hadir) as toth"))
  ->whereDate('tgl_absen','like','%'.$tgl.'%')->where('nis',$nis)->get();

$rsta=DB::table('tb_absensi')->select(DB::raw("sum(alfa) as tota"))
->whereDate('tgl_absen','like','%'.$tgl.'%')->where('nis',$nis)->get();

$rsts=DB::table('tb_absensi')->select(DB::raw("sum(sakit) as tots"))
->whereDate('tgl_absen','like','%'.$tgl.'%')->where('nis',$nis)->get();

$rsti=DB::table('tb_absensi')->select(DB::raw("sum(izin) as toti"))
->whereDate('tgl_absen','like','%'.$tgl.'%')->where('nis',$nis)->get();

// $tmp= array_merge($rsth,$rsta,$rsts,$rsti);
$tmp=array_merge(json_decode($rsth),json_decode($rsta),json_decode($rsts),json_decode($rsti));
// var_dump($rsth);

return json_encode($tmp);

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

public function GetProfile($nis){
  $cek=DB::select('SELECT * FROM v_profile WHERE nis=:nis', ['nis' => $nis]);

  return json_encode($cek);
}

    public function Cekabsen_cs(){
      // $tgl=$this->GetTglE();
      // $cek=DB::table('tb_absensi')->where('Date(tgl_absen)  ',$tgl)
      // ->where('nis',$nis)->get();

      $tgl=$this->GetTglE();
      // $cek=DB::table('v_cknf')->whereDate('Dtgl',$tgl)->get();

      $cek=DB::select('SELECT * FROM v_cknf WHERE DATE(tgl)=:tgl', ['tgl' => $tgl]);

      return json_encode($cek);
    }


}
