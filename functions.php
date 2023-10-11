<?php

function koneksi(){
    $condb = mysqli_connect('localhost', 'root', '', 'bukuku');
    return $condb;
}

function query($query){
    $condb = koneksi();
    $result = mysqli_query($condb, $query) or die('Query GAGAL!' . mysqli_error($condb));

        $rows = [];
    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
    }

    return $rows;
}

function tambah($data) {
    $condb = koneksi();

   $judul = mysqli_real_escape_string($condb, htmlspecialchars($data['judul'])); 
   $penulis = mysqli_real_escape_string($condb, htmlspecialchars($data['penulis'])); 
   $penerbit = mysqli_real_escape_string($condb, htmlspecialchars($data['penerbit'])); 
   $kategori = mysqli_real_escape_string($condb, htmlspecialchars($data['kategori'])); 
   $gambar = mysqli_real_escape_string($condb, htmlspecialchars($data['gambar'])); 

$query = "INSERT INTO buku
            VALUES (null, '$judul', '$penulis', '$penerbit', '$kategori', '$gambar')";

mysqli_query($condb, $query) or die('Query GAGAL!' . mysqli_error($condb));

return mysqli_affected_rows($condb);

}

function hapus($id){
    $condb = koneksi();
    mysqli_query($condb, "DELETE FROM buku WHERE id = $id") or die('Query GAGAL!' . mysqli_error($condb));

    return mysqli_affected_rows($condb);
}


function ubah($data){
    $condb = koneksi();
    $id = $data['id'];
   $judul = mysqli_real_escape_string($condb, htmlspecialchars($data['judul'])); 
   $penulis = mysqli_real_escape_string($condb, htmlspecialchars($data['penulis'])); 
   $penerbit = mysqli_real_escape_string($condb, htmlspecialchars($data['penerbit'])); 
   $kategori = mysqli_real_escape_string($condb, htmlspecialchars($data['kategori'])); 
   $gambar = mysqli_real_escape_string($condb, htmlspecialchars($data['gambar'])); 

$query = "UPDATE buku
            SET
            judul = '$judul', 
            penulis = '$penulis',
            penerbit = '$penerbit',
            kategori = '$kategori',
            gambar = '$gambar'
            WHERE id = $id
            ";

mysqli_query($condb, $query) or die('Query GAGAL!' . mysqli_error($condb));

return mysqli_affected_rows($condb);

}



?>