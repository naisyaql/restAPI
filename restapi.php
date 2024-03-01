<?php
header('Content-Type: application/json; charset=utf8');

$koneksi = mysqli_connect("localhost","root","","apicrud");

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM order_gofood ";
    $query = mysqli_query($koneksi, $sql);
    $array_data =  array();
    while($data = mysqli_fetch_assoc($query)) {
        $array_data[] = $data;
    }
    echo json_encode($array_data);
}else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $sql = "INSERT INTO order_gofood (username, nama_barang, jumlah, harga) VALUES('$username','$nama_barang','$jumlah','$harga')";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $id = $_GET['id'];
    $sql = "DELETE FROM order_gofood WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $id = $_GET['id'];
    $username = $_POST['username'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    $sql = "UPDATE oder_gofood SET username= '$username', nama_barang='$nama_barang', jumlah='$jumlah', harga='$harga' WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}