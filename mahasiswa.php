<?php
class Mahasiswa extends Database
{
    //menampilkan data mahasiswa ke index.php
    public function index()
    {
        $datamahasiswa = mysqli_query($this->koneksi, "select mahasiswa.nim, mahasiswa.nama, dosen.nama as nama_dosen from dosen join mahasiswa on dosen.id = mahasiswa.id_dosen");

        return $datamahasiswa;
    }

    public function create($nim, $nama, $id_dosen)
    {
        mysqli_query($this->koneksi,
            "insert into mahasiswa values (null,'$nim','$nama','$id_dosen')"
        );

    }
    // memilih data mahasiswa yang akan diubah
    public function edit($id)
    {
        $datamahasiswa = mysqli_query($this->koneksi,
            "select * from mahasiswa  where id='$id'"
        );

        return $datamahasiswa;
    }
    // merubah data mahasiswa
    public function update($id, $nim, $nama, $id_dosen)
    {
        mysqli_query(
            $this->koneksi,
            "update mahasiswa set nim='$nim', nama='$nama', id_dosen='$id_dosen' where id='$id'"
        );
    }
    // menampilkan data mahasiswa berdasarkan id
    public function show($id)
    {
        $datamahasiswa = mysqli_query($this->koneksi,
            "select mahasiswa.nim, mahasiswa.nama, dosen.nama as nama_dosen 
            from dosen 
            join mahasiswa on dosen.id = mahasiswa.id_dosen 
            where id='$id'"
        );

        return $datamahasiswa;
    }

    // menghapus data mahasiswa
    public function delete($id)
    {
        mysqli_query($this->koneksi, "delete from mahasiswa where id='$id'"
        );

    }
}
