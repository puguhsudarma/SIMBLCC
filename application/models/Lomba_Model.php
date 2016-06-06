<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lomba_Model extends CI_Model{
	public function get_soal($clause = array()){
		$tabel  = 'sbc_soal';
		//projection
		$this->db->select(array('id_soal', 'id_tingkat_sekolah_soal'));
		if(!empty($clause)){
			$this->db->where($clause);
		}
		return $this->db->get($tabel)->result();
	}

	public function get_jawaban($id_soal){
		$tabel = 'sbc_jawaban';
		//projection
		$this->db->select(array('id_jawaban', 'id_soal_jawaban'));
		$this->db->where_in('id_soal_jawaban', $id_soal);

		return $this->db->get($tabel)->result();
	}

	public function insert_to_tmp($data_soal, $data_jawaban){
		$tabel = 'sbc_soal_peserta_tmp';
		$soal = $this->db->insert_batch($tabel, $data_soal);
		
		$tabel = 'sbc_jawaban_peserta_tmp';
		$jawaban = $this->db->insert_batch($tabel, $data_jawaban);

		return ($soal && $jawaban);
	}

	public function get_setting(){
		$tabel = 'sbc_setting';
		return $this->db->get($tabel)->result();
	}

	public function get_param_peserta($id_peserta){
		$tabel = 'sbc_lomba_peserta';
		$this->db->select(
			array(
				'id_peserta',
				'ikuti_lomba_peserta',
				'waktu_mulai_peserta',
				'waktu_selesai_peserta'
			)
		);
		$this->db->where(array('id_peserta' => $id_peserta));
		$this->db->limit(1);
		return $this->db->get($tabel)->result();
	}

	public function get_naskah_soal($id_peserta){
		//get naskah soal
		$tabel = 'soal_jawaban_tmp_peserta';
		$this->db->where(array('id_peserta' => $id_peserta));
		$row = $this->db->get($tabel)->result_array();

		//modified array
		$id_soal = NULL;
		$k = 0;
		
		foreach($row as $data){
			if($id_soal != $data['id_soal']){
				$n = 0;
				$soal[$k] = array_slice($data, 0, 7);
				$soal[$k]['jawaban'][$n] = array(
					'id_jawaban_peserta_tmp' => 0,
					'id_jawaban' => 0,
					'teks_jawaban' => 'Tidak Menjawab',
					'gambar_jawaban' => '',
					'benar_jawaban' => 0	
				);
				$n++;
				$soal[$k]['jawaban'][$n] = array_slice($data, -5);
				$k++;
			} else if($id_soal == $data['id_soal']){
				$n++;
				$soal[$k-1]['jawaban'][$n] = array_slice($data, -5);
			}
			$id_soal = $data['id_soal'];
		}
	
		return $soal;
	}

	public function update_data_peserta($data, $id_peserta){
		$table = 'sbc_lomba_peserta';
		$this->db->where($id_peserta);
		return $this->db->update($table, $data);
	}

	public function update_jawaban($data, $clause){
		$table = 'sbc_soal_peserta_tmp';
		$this->db->where($clause);
		$this->db->update($table, $data);
	}

	public function penilaian($id_peserta){
		$naskah_soal_jawaban_peserta = $this->get_naskah_soal($id_peserta);

		$banar = 0;
		$salah = 0;
		$tidak = 0;
		foreach($naskah_soal_jawaban_peserta as $soal){
			foreach($soal['jawaban'] as $jawaban){
				if(($jawaban['id_jawaban_peserta_tmp'] == $soal['jawaban_peserta']) && ($soal['jawaban_peserta'] != 0)){
					if($jawaban['benar_jawaban']){
						$benar++;
					} else {
						$salah++;
					}
					break;
				} else if(($soal['jawaban_peserta'] == 0)){
					$tidak++;
					break;
				}
			}
		}

		$data = array(
			'jumlah_benar_jawab_peserta' => $benar,
			'jumlah_salah_jawab_peserta' => $salah,
			'jumlah_tidak_jawab_peserta' => $tidak
		);
		$this->update_data_peserta($data, array('id_peserta' => $id_peserta));
	}
}