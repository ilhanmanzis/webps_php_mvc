<?php

class Device extends Controller{
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['device'] = $this->model('Device_model')->getAllDevice();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $this->view('template/header',$data);
            $this->view('device/index', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    public function getdevice(){
        if(isset($_SESSION['admin'])){
            $data = $this->model('Device_model')->getDevice($_POST['id_device']);
            $this->view('device/update',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }

    //menambahkan data
    public function create(){
        if(isset($_SESSION['admin'])){
            if($this->model('Device_model')->createDataDevice($_POST)>0){
                Flasher::setFlash('Data Device', 'berhasil','ditambahkan','success');
                header('location:' . BASEURL . '/device');
                exit;
            }else{
            Flasher::setFlash('Data Device', 'gagal','ditambahkan','danger');
            header('location:' . BASEURL . '/device');
            exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //menghapus data
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Device_model')->deleteDataDevice($id)>0){
                Flasher::setFlash('Data Device', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/device');
                exit;
            }else{
                Flasher::setFlash('Data Device', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/device');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //update data
    public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Device_model')->updateDataDevice($_POST)>0){
                Flasher::setFlash('Data Device', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/device');
                exit;
            }else{
                Flasher::setFlash('Data Device', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/device');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>