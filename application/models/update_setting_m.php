<?php

class update_setting_m extends CI_model{
    public function ambil_data(){
      $this->db->select('*');
      $this->db->from('sbc_setting');
      return $this->db->get()->result_array();
    }

    public function update($data, $id){
      $this->db->where('id_setting='.$id);
      $this->db->update('sbc_setting', $data);
    }
}