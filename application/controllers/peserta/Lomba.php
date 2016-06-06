<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lomba extends Peserta_Controller {
	//model data
	protected $_model = 'Lomba_Model';
	protected $_nama_model = 'lomba';

	//parameter lcg
	private $a;
	private $c;
	private $m;
	private $z;
	private $x;

	//setting
	private $banyak_soal_sd;
	private $banyak_soal_smp;
	private $banyak_soal_sma;
	private $waktu_mulai_lomba;
	private $waktu_selesai_lomba;
	private $waktu_lomba;

	//param peserta
	private $waktu_mulai_peserta;
	private $waktu_selesai_peserta;
	private $ikuti_lomba_peserta;

	public function __construct(){
		parent::__construct();
		
		//setting load
		$setting = $this->lomba->get_setting();

		$this->banyak_soal_sd  = $setting[4]->value_setting;
		$this->banyak_soal_smp = $setting[3]->value_setting;
		$this->banyak_soal_sma = $setting[2]->value_setting;
		$this->waktu_mulai_lomba = $setting[0]->value_setting;
		$this->waktu_selesai_lomba = $setting[1]->value_setting;
		$this->waktu_lomba = $setting[5]->value_setting;

		//param peserta load
		$param = $this->lomba->get_param_peserta($this->_id_peserta);

		$this->waktu_mulai_peserta = $param[0]->waktu_mulai_peserta;
		$this->waktu_selesai_peserta = $param[0]->waktu_selesai_peserta;
		$this->ikuti_lomba_peserta = $param[0]->ikuti_lomba_peserta;

		$this->data['content_view_location'] = 'peserta/lomba_view';
	}

	public function index(){
		//prepare date
		//waktu lomba
		date_default_timezone_set('Asia/Makassar');
		
		$date_mulai = new DateTime($this->waktu_mulai_lomba);
		$date_selesai = new DateTime($this->waktu_selesai_lomba);
		$date_current = new DateTime('now');

		//waktu sisa peserta
		$mulai_peserta = new DateTime($this->waktu_mulai_peserta);
		$mulai_peserta->add(new DateInterval('PT'.$this->waktu_lomba));
		
		$interval = $date_current->diff($mulai_peserta);
		$time_left = $interval->format('%H:%I:%S');
		$time_left = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $time_left);
		sscanf($time_left, "%d:%d:%d", $hours, $minutes, $seconds);
		$time_seconds = $hours * 3600 + $minutes * 60 + $seconds;
				
		//lomba sudah dibuka ?
		if($date_current > $date_mulai && $date_current < $date_selesai){
			//peserta sudah sempat mengklik tombol start ?
			if($this->ikuti_lomba_peserta && !empty($this->waktu_mulai_peserta)){
				//apakah masih ada sisa waktu ?
				if($date_current <= $mulai_peserta && empty($this->waktu_selesai_peserta)){
					//apakah peserta ada menekan tombol submit ?
					if($this->input->post('submit') == 'Submit Jawaban'){
						$update = array(
							'waktu_selesai_peserta' => $date_current->format('Y-m-d H:i:s')
						);
						$id = array(
							'id_peserta' => $this->_id_peserta
						);
						$this->lomba->update_data_peserta($update, $id);
						$this->lomba->penilaian($this->_id_peserta);
						redirect(site_url('peserta/lomba'));
						exit();
					} else {
						$naskah = $this->lomba->get_naskah_soal($this->_id_peserta);
						$this->data['naskah_soal_jawaban'] = $naskah;
						$this->data['link_submit'] = site_url('peserta/lomba');
						$this->data['seconds_left'] = $time_seconds;
						$this->data['update_link'] = site_url('peserta/lomba/update');
						$this->data['page'] = 'lomba';
					}
				}
			} else {
				if($this->input->post('tombol')=='Mulai Lomba'){
					$this->generate_naskah_soal();
					$update = array(
						'ikuti_lomba_peserta' => 1,
						'waktu_mulai_peserta' => $date_current->format('Y-m-d H:i:s')
					);
					$id = array(
						'id_peserta' => $this->_id_peserta
					);
					$this->lomba->update_data_peserta($update, $id);
					redirect(site_url('peserta/lomba'));
					exit();
				} else {
					$this->data['page'] = 'dibuka';
					switch($this->_tingkat_sekolah_peserta){
						case 1 : $nama_tingkat = 'Sekolah Dasar'; break;
						case 2 : $nama_tingkat = 'Sekolah Menengah Pertama'; break;
						case 3 : $nama_tingkat = 'Sekolah Menengah Atas / Sekolah Menengah Kejuruan'; break;
					}
					$this->data['tingkatan'] = $nama_tingkat;
					$waktu = substr($this->waktu_lomba, 0,1).':00:00';
					$this->data['waktu_lomba'] = $waktu;
					$this->data['tanggal_lomba']   = $date_mulai->format('Y-m-d H:i:s').' s/d '.$date_selesai->format('Y-m-d H:i:s');
					$this->data['link_mulai_lomba'] = site_url('peserta/lomba');	
				}
			}
		} else if(!($date_current > $date_mulai && $date_current < $date_selesai) && !($this->ikuti_lomba_peserta)){
			$this->data['page'] = 'ditutup';
			$this->data['mulai_lomba']   = $date_mulai->format('Y-m-d H:i:s');
			$this->data['selesai_lomba'] = $date_selesai->format('Y-m-d H:i:s');
		}

		if($this->ikuti_lomba_peserta && empty($this->waktu_selesai_peserta) && !($date_current <= $mulai_peserta)){
			$update = array(
				'waktu_selesai_peserta' => $date_current->format('Y-m-d H:i:s')
			);
			$id = array(
				'id_peserta' => $this->_id_peserta
			);
			$this->lomba->update_data_peserta($update, $id);
			$this->lomba->penilaian($this->_id_peserta);
			redirect(site_url('peserta/lomba'));
			exit();
		}

		//hasil lomba peserta yang sudah selesai
		if($this->ikuti_lomba_peserta && !empty($this->waktu_selesai_peserta)){
			$this->data['page'] = 'selesai';
		}

		//and here we go.... LOCK AND LOADED...
		$this->load->view($this->_layout, $this->data);
	}

	public function update(){
		if($this->input->post('valid') == 'kodevalid'){
			$clause = array(
				'id_soal_peserta_tmp' => $this->input->post('id_soal_tmp'),
				'id_peserta' => $this->_id_peserta
			);
			$data = array(
				'jawaban_peserta' => $this->input->post('jawaban')
			);

			$this->lomba->update_jawaban($data, $clause);
		}
	}

	private function generate_naskah_soal(){
		$this->generate_Parameter_LCG();
	
		//SOAL	
		//get soal from database
		$soal_x = $this->lomba->get_soal(array('id_tingkat_sekolah_soal' => $this->_tingkat_sekolah_peserta));
		
		//attach random each row
		foreach($soal_x as &$data){
			$this->z = $this->_lcg_discrete($this->a, $this->c, $this->m, $this->z);
			$this->x = $this->_lcg_continue($this->z, $this->m);
			$data->random = $this->x;
		}
		unset($data);

		//order by random asc
		$soal_x = $this->array_orderby($soal_x, 'random', SORT_ASC);
		
		//cut to limit row
		$limit = 0;
		if($this->_tingkat_sekolah_peserta == 1){
			$limit = $this->banyak_soal_sd;
		} else if($this->_tingkat_sekolah_peserta == 2){
			$limit = $this->banyak_soal_smp;
		} else if($this->_tingkat_sekolah_peserta == 3){
			$limit = $this->banyak_soal_sma;
		}

		if(count($soal_x)<$limit){
			$limit = count($soal_x);
		}

		$k=0;
		foreach($soal_x as $data){
			$soal[$k] = $data;
			$id_soal[] = $data->id_soal;
			$k++;
			if($k==$limit){
				break;
			}
		}
		unset($soal_x);
		unset($data);

		//JAWABAN
		//get jawaban from database
		$this->generate_Parameter_LCG();
		$jawaban = $this->lomba->get_jawaban($id_soal);
		foreach($jawaban as &$data){
			$this->z = $this->_lcg_discrete($this->a, $this->c, $this->m, $this->z);
			$this->x = $this->_lcg_continue($this->z, $this->m);
			$data->random = $this->x;
		}
		unset($data);
		$jawaban = $this->array_orderby($jawaban, 'random', SORT_ASC);
		
		//store soal and jawaban to database
		foreach($soal as &$data){
			unset($data->id_tingkat_sekolah_soal);
			unset($data->random);
			$data->id_peserta = $this->_id_peserta;
			$data->jawaban_peserta = 0;
		}
		unset($data);

		foreach($jawaban as &$data){
			unset($data->id_soal_jawaban);
			unset($data->random);
			$data->id_peserta = $this->_id_peserta;
		}
		unset($data);

		//STORE TO DATABASE
		$stored = $this->lomba->insert_to_tmp($soal, $jawaban);
			
		return $stored;
	}

	private function _lcg_discrete($a, $c, $m, $z){
		return ((($a*$z)+$c)%$m);
	}

	private function _lcg_continue($z, $m){
		return ($z/$m);
	}

	private function array_orderby(){
		$args = func_get_args();
		$data = array_shift($args);
		foreach ($args as $n => $field) {
			if (is_string($field)) {
				$tmp = array();
				foreach ($data as $key => $row)
					$tmp[$key] = $row->{$field};
				$args[$n] = $tmp;
			}
		}
		$args[] = &$data;
		call_user_func_array('array_multisort', $args);
		return array_pop($args);
	}

	//fungsi generate bilangan prima
	private function bilangan_prima($n = 100){
		$prima = array();
		$k = 0;
		for($i=1;$i<=$n;$i++){
			$a = 0;
			for($j=1;$j<=$i;$j++){
				if($i % $j == 0){
					$a++;
				}
			}
			if($a == 2){
				$prima[$k] = $i;
				$k++;
			}
		}
		return $prima;
	}

	//fungsi untuk generate parameter lcg
	private function generate_Parameter_LCG(){
		//A
		$this->a = 1+(4*rand(1,25));
		
		//C	
		$prima = $this->bilangan_prima();
		$rand_prima = array_rand($prima);
		$this->c = $prima[$rand_prima];

		//M
		$b = rand(2,10);
		$this->m = pow(2, $b);
		
		//Z
		$MinMax = array(
			"Min" => min($this->a, $this->c, $this->m),
			"Max" => min($this->a, $this->c, $this->m)
		);
		$this->z = rand($MinMax["Min"], $MinMax["Max"]);
	}
}
