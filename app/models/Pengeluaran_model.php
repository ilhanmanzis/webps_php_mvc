<?php

class Pengeluaran_model{
    private $table = 'pengeluaran';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    // melihat semua data pengeluaran
    public function getAllPengeluaran(){
        $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.* FROM ' . $this->table . ',operator,sift WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift ORDER BY id_' . $this->table);
        return $this->db->resultSet();
    }

    // melihat semua data pengeluaran hari ini
    public function getAllPengeluaranToday(){
        $today = date('Y-m-d');
            $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.* FROM ' . $this->table . ',operator,sift WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift AND DATE(' . $this->table . '.tanggal_pengeluaran) = :today  AND '.$this->table.'.id_operator=:operator AND '.$this->table.'.id_sift=:sift ORDER BY id_' . $this->table.' DESC');
            $this->db->bind('today',$today);
            $this->db->bind('operator',$_SESSION['operator']);
            $this->db->bind('sift',$_SESSION['sift']);
            return $this->db->resultSet();
    }


    public function createDataPengeluaran($data){
        //tanggal
        $today = date('Y-m-d');
        // operator
        $operator = $_SESSION['operator'];

        //sift
        $sift = $_SESSION['sift'];

        //admin
        $admin = $_SESSION['admin'];
        
        $query = "INSERT INTO " . $this->table . " VALUES ('', :tanggal_pengeluaran, :nama_pengeluaran, :jumlah_pengeluaran, :id_operator, :id_sift, :id_admin)";
        $this->db->query($query);
        $this->db->bind('tanggal_pengeluaran', $today);
        $this->db->bind('nama_pengeluaran', $data['name_pengeluaran']);
        $this->db->bind('jumlah_pengeluaran', $data['jumlah_pengeluaran']);
        $this->db->bind('id_operator', $operator);
        $this->db->bind('id_sift', $sift);
        $this->db->bind('id_admin', $admin);
        $this->db->execute();
        return $this->db->rowCount();

    }


     //menghapus data pengeluaran
     public function deleteDataPengeluaran($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_Pengeluaran=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getPengeluaran($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pengeluaran=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateDataPengeluaran($data){
        $query = "UPDATE " . $this->table . " SET nama_pengeluaran=:nama_pengeluaran, jumlah_pengeluaran=:jumlah_pengeluaran WHERE pengeluaran.id_pengeluaran=:id_pengeluaran";
        $this->db->query($query);
        $this->db->bind('id_pengeluaran', $data['id_pengeluaran']);
        $this->db->bind('nama_pengeluaran', $data['name_pengeluaran']);
        $this->db->bind('jumlah_pengeluaran', $data['jumlah_pengeluaran']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    // mencari Pengeluaran
    public function cariPengeluaran($data){
        $this->db->query('SELECT ' . $this->table . '.*, operator.*, sift.* FROM ' . $this->table . ',operator,sift WHERE ' . $this->table . '.id_operator = operator.id_operator AND ' . $this->table . '.id_sift = sift.id_sift AND '.$this->table.'.id_operator=:operator AND '.$this->table.'.id_sift=:sift AND '.$this->table.'.tanggal_pengeluaran BETWEEN :awal AND :akhir ORDER BY id_' . $this->table.' DESC');
        $this->db->bind('operator',$data['operator']);
        $this->db->bind('sift',$data['sift']);
        $this->db->bind('awal',$data['awal']);
        $this->db->bind('akhir',$data['akhir']);
        return $this->db->resultSet();
        
    }
    


}

?>