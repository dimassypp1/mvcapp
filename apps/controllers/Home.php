<?php

class Home extends Controller{    

    private $dt;
    private $df;
    public function __construct() {
        $this->dt = $this->loadModel("barang"); //object
        $this->df = $this->loadModel("daftarBarang");
    }

    public function index() {
        echo "anda memanggil action index \n";
    }
    public function home($data1, $data2) {
        echo "anda memanggil action home dengan data1 = $data1 dan data2 = $data2 \n";
    }

    public function lihatData($id){
        $data = $this->df->getDataById($id);

        $this->loadView('templates/header',['title' => 'Detail Barang']);
        $this->loadView('home/detailBarang',$data);
        $this->loadView('templates/footer');
    }

    public function listBarang(){
        $this->loadView('home/listBarang');

        // foreach ($this->df->getDataAll() as $item) {
        //     echo $item["id"] . " " . $item["nama"] . " " . $item["qty"];
        //     echo "<br />";
        // }

        $data = $this->df->getDataAll();
        $this->loadView('templates/header',['title' => 'List Barang']);
        $this->loadView('home/listBarang',$data);
        $this->loadView('templates/footer');
    }

    public function insertBarang(){
        if (!empty($_POST)) {
            if ($this->df->tambahBarang($_POST)) {
                header("Location: ".BASE_URL."index.php?r=home/listBarang");
                exit;
            }
        }

        $this->loadView('templates/header',['title' => 'Insert Barang']);
        $this->loadView('home/insert');
        $this->loadView('templates/footer');
    }

    public function updateBarang() {
        $data = $this->df->getDataById($_GET['id']);

        if (!empty($_POST)) {
            if ($this->df->updateBarang($_POST)) {
                header("Location: ".BASE_URL."index.php?r=home/listBarang");
                exit;
            }
        }

        $this->loadView('templates/header',['title' => 'Update Barang']);
        $this->loadView('home/update',$data);
        $this->loadView('templates/footer');
    }

    public function deleteBarang() {
        $data = $this->df->getDataById($_GET['id']);

        if ($this->df->deleteBarang($_POST)) {
            header("Location: ".BASE_URL."index.php?r=home/listBarang");
            exit;
        }
    }
}