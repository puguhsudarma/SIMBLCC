<?php
/**
*
*/
class update_setting_c extends CI_controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('update_setting_m');
  }

  function index()
  {
    # code...
    $tmp = $this->update_setting_m->ambil_data();
    $data = array('lanjut'=> $tmp);
    $this->load->view('update_setting', $data);

  }

  function update_data()
  {
    $waktu_mulai_lomba = $this->input->post['waktu_mulai_lomba'];
    $data = array('attr_setting' => $waktu_mulai_lomba);
    $this->update_setting_m->update($data, 1);

    $waktu_selesai_lomba = $this->input->post['waktu_selesai_lomba'];
    $data = array('attr_setting' => $waktu_selesai_lomba);
    $this->update_setting_m->update($data, 2);

    $banyak_soal_sma = $this->input->post['banyak_soal_sma'];
    $data = array('attr_setting' => $banyak_soal_sma);
    $this->update_setting_m->update($data, 3);

    $banyak_soal_smp = $this->input->post['banyak_soal_smp'];
    $data = array('attr_setting' => $banyak_soal_smp);
    $this->update_setting_m->update($data, 4);

    $banyak_soal_sd = $this->input->post['banyak_soal_sd'];
    $data = array('attr_setting' => $banyak_soal_sd);
    $this->update_setting_m->update($data, 5);

    $waktu_lomba = $this->input->post['waktu_lomba'];
    $data = array('attr_setting' => $waktu_lomba);
    $this->update_setting_m->update($data, 6);

    $header_web = $this->input->post['header_web'];
    $data = array('attr_setting' => $header_web);
    $this->update_setting_m->update($data, 7);

    $tema_web = $this->input->post['tema_web'];
    $data = array('attr_setting' => $tema_web);
    $this->update_setting_m->update($data, 8);

    $nilai_benar = $this->input->post['nilai_benar'];
    $data = array('attr_setting' => $nilai_benar);
    $this->update_setting_m->update($data, 9);

    $nilai_salah = $this->input->post['nilai_salah'];
    $data = array('attr_setting' => $nilai_salah);
    $this->update_setting_m->update($data, 10);

    $nilai_tidak_jawab = $this->input->post['nilai_tidak_jawab'];
    $data = array('attr_setting' => $nilai_tidak_jawab);
    $this->update_setting_m->update($data, 11);

    redirect(site_url().'update_setting_c');
  }


}

?>
