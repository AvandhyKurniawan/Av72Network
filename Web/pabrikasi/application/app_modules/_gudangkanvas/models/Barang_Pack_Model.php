<?php
class Barang_Pack_Model extends CI_Model 
{
    public function get($where = NULL){
        if(!empty($where)){
            return $this->db->get_where("produk_aneka_macam", $where)->result_array();
        } else {
            return $this->db->get_where("produk_aneka_macam", ['deleted'=>'FALSE'])->result_array();
        }
    }

    public function getDataAwal($kd_produk){
        if(!empty($kd_produk)){
            $result = $this->db->get_where("transaksi_produk_aneka_macam", ['deleted'=>'FALSE','kd_pack'=>$kd_produk, 'keterangan_history'=>'DATA AWAL']);
            return $result->row();
        } else {
            return false;
        }
    }
    public function getDatatable($where = NULL){
        $this->datatables->select("*");
        $this->datatables->from("produk_aneka_macam");
        if(!empty($where)){
            $this->datatables->where($where);
        } else {
            $this->datatables->where(['deleted'=>'FALSE']);
        }
        return $this->datatables->generate();
    }

    public function update($where, $data){
        if(empty($where) && $data){
            return false;
        } else {
            return $this->db->update('produk_aneka_macam', $data, $where);
        }
    }

    public function getIdTransaksi($where){
        if(!empty($where)){
            return $this->db->get_where('transaksi_produk_aneka_macam', $where)->row();
        } else {
            return false;
        }
    }

    public function updateStokDataAwalAneka($param, $idTransaksi, $newData){
        $this->db->trans_begin();
        $this->db->set("jumlah_berat","jumlah_berat + ".$param["jumlah_berat"], FALSE);
        $this->db->set("stock","stock + ".$param["jumlah_kirim"], FALSE);
        $this->db->where("kd_produk",$param["kd_pack"]);
        $this->db->update("produk_aneka_macam");
    
        if($this->db->get_where('transaksi_produk_aneka_macam', ['deleted'=>'FALSE', 'keterangan_history'=>'DATA AWAL', 'kd_pack'=>$param['kd_pack']])->num_rows() > 0){
            $this->db->set("jumlah_berat",$newData["jumlahBeratBaru"]);
            $this->db->set("jumlah_kirim",$newData["jumlahKirimBaru"]);
            $this->db->set("id_user",$param["idUser"]);
            $this->db->where("id_transaksi",$idTransaksi);
            $this->db->update("transaksi_produk_aneka_macam");
        } else {
            $this->db->insert('transaksi_produk_aneka_macam', $param);
        }
        if($this->db->trans_status()===FALSE){
          $this->db->trans_rollback();
          return FALSE;
        }else{
          $this->db->trans_commit();
          return TRUE;
        }
      }
}

?>