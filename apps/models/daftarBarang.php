<?php

class daftarBarang extends Model{
    private $daftar = [];

    public function __construct() {
    }

    public function getDataAll() {
        $data = [];
        $stmt = "select * from daftarBarang";
        $query = $this->db->query($stmt);
        while ($result = $this->db->fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getDataById($id)  {
        $data = [];
        $stmt = "select * from daftarBarang where id = $id";
        $query = $this->db->query($stmt);
        $data == $this->db->fetch_array($query);
        return $data;
    }

    public function tambahBarang($param) {
        $stmt = "insert into daftarBarang (nama, qty) values (:nama, :qty)";
        $query = $this->db->query($stmt, $param);
        if ($this->db->last_id()>0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateBarang($param) {
        $stmt = "update daftarBarang set nama = :nama, qty = :qty where id = :id";
        $query = $this->db->query($stmt, $param);
        if ($query->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBarang($param) {
        $stmt = "delete from daftarBarang where id = :id";
        $query = $this->db->query($stmt);
        if ($query->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }
}