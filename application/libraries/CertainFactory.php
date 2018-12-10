<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class CertainFactoryextends MY_Model
{
	public function __construct()
	{
		parent::__construct();

        $this->load->model(['User_m' , 'Penyakit_m' , 'Gejala_m' , 'Basispengetahuan_m']);

    }

    public function hitung($data)
    {
         $hasil;
         $a = $this->session->userdata('cf');
         // echo json_encode($a['cf']);
         foreach ($data as $val => $penyakit) {
            $combineCF=0;
            $CFBefore=0;
            $j=0;
            foreach ($penyakit as $gejala) {
               $cft=0;
               $b_basis = $this->Basispengetahuan_m->get_row(['id_basis' => $gejala]);
               $id_gejala = $b_basis->id_gejala;
               $cft = $b_basis->bobot*$a[$id_gejala]['cfuser'];
               // echo " a = " . json_encode($a[$id_gejala]['cfuser']);
               $j++;
               if($j == 1)
                  $combineCF=$cft;
               else
                  $combineCF =$combineCF + ($cft * (1 - $combineCF));
            }
            $hasil[] = [
               'id_penyakit'  => $val,
               'hasil'        => $combineCF
            ];
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
         $hasil;
         $html='';
         $a = $this->session->userdata('cf');
         $html.= '================== Detail Perhitungan =================<br>';
         $i=1;

         // echo json_encode($a['cf']);
         foreach ($data as $val => $penyakit) {
            $combineCF=0;
            $CFBefore=0;
            $j=0;

            $html.= 'Perhitungan ke - ' . $i .'<br> Nama Kerusakan : '.$this->Penyakit_m->get_row(['id_penyakit' => $val])->nama .'<br>';
            foreach ($penyakit as $gejala) {

               $cft=0;
               $b_basis = $this->Basispengetahuan_m->get_row(['id_basis' => $gejala]);
               $id_gejala = $b_basis->id_gejala;

               $cft = $b_basis->bobot*$a[$id_gejala]['cfuser'];
               // echo " a = " . json_encode($a[$id_gejala]['cfuser']);
               $j++;
               if($j == 1)
                  $combineCF=$cft;
               else
                  $combineCF =$combineCF + ($cft * (1 - $combineCF));
              $html .= 'Gejala ke - '. $j . '<br> Nama Gejala = '. $this->Gejala_m->get_row(['id_gejala' => $id_gejala])->nama .'<br>';

                  $html .= 'Hasil Perhitungan CF-OLD= ' . $combineCF .'<br>';
                  
            }

               $html.= '===================<br> Total Perhitungan = ' . $combineCF;
            $hasil[] = [
               'id_penyakit'  => $val,
               'hasil'        => $combineCF
            ];
         }
         foreach ($hasil as $key => $row)
         {
               $vc_array_name[$key] = $row['hasil'];
         }
         array_multisort($vc_array_name, SORT_DESC, $hasil);
         return $html;
      }
}