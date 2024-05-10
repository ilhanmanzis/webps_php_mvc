<?php

class AllPengeluaran extends Controller{
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);

            $this->view('template/header',$data);
            $this->view('allPengeluaran/index', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

     //get pengeluaran bedasarkan operator dan sift
     public function caripengeluaran(){
        if(isset($_SESSION['admin'])){  
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['operatorById'] = $this->model('Operator_model')->getOperator($_POST['operator']);
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['siftById'] = $this->model('Sift_model')->getSift($_POST['sift']);
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);

            $data['pengeluaran'] = $this->model('Pengeluaran_model')->cariPengeluaran($_POST);
            $this->view('template/header',$data);
            $this->view('allPengeluaran/index', $data);
            $this->view('allPengeluaran/dataCari',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

     //get all pengeluaran
     public function getallpengeluaran(){
        if(isset($_SESSION['admin'])){  
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);

            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();
            $this->view('template/header',$data);
            $this->view('allPengeluaran/index', $data);
            $this->view('allPengeluaran/dataCari',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }


     //update data pengeluaran
     public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Pengeluaran_model')->updateDataPengeluaran($_POST)>0){
                Flasher::setFlash('Data Pengeluaran', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/allpengeluaran');
            exit;
            }else{
                Flasher::setFlash('Data Pengeluaran', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/allpengeluaran');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    
    public function getpengeluaranupdate(){
        if(isset($_SESSION['admin'])){
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getPengeluaran($_POST['id_pengeluaran']);
            $data['device'] = $this->model('Device_model')->getAllDevice();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $this->view('allPengeluaran/update',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }
    
    //menghapus data pengeluaran
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Pengeluaran_model')->deleteDataPengeluaran($id)>0){
                Flasher::setFlash('Data pengeluaran', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/allpengeluaran');
                exit;
            }else{
                Flasher::setFlash('Data pengeluaran', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/allpengeluaran');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
    
}

?>