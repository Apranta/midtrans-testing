<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model(['User_m' , 'Penyakit_m' , 'Gejala_m' , 'Basispengetahuan_m']);

    }
	public function hasil($data)
    {
         $total = 0;
         $hasil;
         foreach ($data as $val => $penyakit) {
               $bobot = $this->Penyakit_m->get_row(['id_penyakit' => $val])->bobot;
               $tot = 0;
               foreach ($penyakit as $gejala) {
                  $b_basis = $this->Basispengetahuan_m->get_row(['id_basis' => $gejala])->bobot;
                  $b_gejala = $this->Gejala_m->get_row(['id_gejala' => $this->Basispengetahuan_m->get_row(['id_basis' => $gejala])->id_gejala])->bobot;
                  $p_basis = ($b_basis * $bobot) /  $b_gejala;
                  $tot += $p_basis;
               }
               $hasil[] = [
                  'id_penyakit'   => $val,
                  'hasil'         => $tot,
               ];
               $total = $total + $tot;
         }
              
         foreach ($hasil as $key => $row)
         {
               $vc_array_name[$key] = $row['hasil'];
         }
         array_multisort($vc_array_name, SORT_DESC, $hasil);
         return $hasil;
    }

    public function detail($data)
    {
         $total = 0;
         $html= '';
         $hasil;
         $i=1;
         $html.= '================== Detail Perhitungan =================<br>';
         foreach ($data as $val => $penyakit) {
               $bobot = $this->Penyakit_m->get_row(['id_penyakit' => $val])->bobot;
               $tot = 0;
               $html.= 'Perhitungan ke - ' . $i .'<br> Nama Kerusakan : '.$this->Penyakit_m->get_row(['id_penyakit' => $val])->nama .'<br>';
               $g = 1;
               foreach ($penyakit as $gejala) {
                  $b_basis = $this->Basispengetahuan_m->get_row(['id_basis' => $gejala])->bobot;
                  $b_gejala = $this->Gejala_m->get_row(['id_gejala' => $this->Basispengetahuan_m->get_row(['id_basis' => $gejala])->id_gejala])->bobot;
                  $html .= 'Gejala ke - '. $g . '<br> Nama Gejala = '. $this->Gejala_m->get_row(['id_gejala' => $this->Basispengetahuan_m->get_row(['id_basis' => $gejala])->id_gejala])->nama .'<br>';
                  $p_basis = ($b_basis * $bobot) /  $b_gejala;
                  $html .= 'Hasil Perhitungan = ' . $p_basis .'<br>';
                  $tot += $p_basis;
                  $g++;
               }
               $hasil[] = [
                  'id_penyakit'   => $val,
                  'hasil'         => $tot,
               ];
               $total = $total + $tot;
               $html.= '===================<br> Total Perhitungan = ' . $tot;
               $i++;
         }
              
         foreach ($hasil as $key => $row)
         {
               $vc_array_name[$key] = $row['hasil'];
         }
         array_multisort($vc_array_name, SORT_DESC, $hasil);
         return $html;
    }
}