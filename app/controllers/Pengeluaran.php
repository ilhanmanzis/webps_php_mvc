<?php

class Pengeluaran extends Controller{
    public function index(){
     if(isset($_SESSION['admin'])){
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaranToday();

            $this->view('template/header',$data);
            $this->view('pengeluaran/index', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    public function create(){
        if(isset($_SESSION['admin'])){
            if($this->model('Pengeluaran_model')->createDataPengeluaran($_POST)>0){
                Flasher::setFlash('Data Pengeluaran', 'berhasil','ditambahkan','success');
                header('location:' . BASEURL . '/pengeluaran');
            exit;
            }else{
                Flasher::setFlash('Data Pengeluaran', 'gagal','ditambahkan','danger');
                header('location:' . BASEURL . '/pengeluaran');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }


    //menghapus data pengeluaran
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Pengeluaran_model')->deleteDataPengeluaran($id)>0){
                Flasher::setFlash('Data Pengeluaran', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/pengeluaran');
                exit;
            }else{
                Flasher::setFlash('Data Pengeluaran', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/pengeluaran');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }
        //mengambil data untuk update pengeluaran
    public function getpengeluaran(){
        if(isset($_SESSION['admin'])){
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getPengeluaran($_POST['id_pengeluaran']);
            $data['device'] = $this->model('Device_model')->getAllDevice();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $this->view('pengeluaran/update',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }


    //update data pengeluaran
    public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Pengeluaran_model')->updateDataPengeluaran($_POST)>0){
                Flasher::setFlash('Data Pengeluaran', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/pengeluaran');
            exit;
            }else{
                Flasher::setFlash('Data Pengeluaran', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/pengeluaran');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }



}

?>