<?php
class Control_Update_Stok
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getStok(int $idBahan): ?int
    {
        $stmt = $this->db->prepare(
            "SELECT stok FROM data_bahan_baku WHERE id_bahan = ?"
        );
        $stmt->execute([$idBahan]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row === false ? null : (int) $row['stok'];
    }


    private function updateStokDB(int $idBahan, int $jumlahTambah): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE data_bahan_baku SET stok = stok + ? WHERE id_bahan = ?"
        );
        return $stmt->execute([$jumlahTambah, $idBahan]);
    }


    public function updateStok(int $idBahan, int $jumlahTambah): string
    {
        $stokLama = $this->getStok($idBahan);


        if ($stokLama === null) {
            return "Input stok tidak valid";
        }


        if ($jumlahTambah <= 0) {
            return "Input stok tidak valid";
        }

        $stokBaru = $stokLama + $jumlahTambah;

        if (!$this->updateStokDB($idBahan, $jumlahTambah)) {
            return "Input stok tidak valid";
        }

        return "Stok berhasil diperbarui (stok baru: {$stokBaru})";
    }
}


if (PHP_SAPI === 'cli' && realpath($argv[0]) === __FILE__) {

    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE TABLE data_bahan_baku (
                    id_bahan INTEGER PRIMARY KEY,
                    nama_bahan TEXT,
                    stok INTEGER)");
    $pdo->exec("INSERT INTO data_bahan_baku VALUES (1, 'Mie Kwetiau', 20)");

    $ctrl = new Control_Update_Stok($pdo);

    echo "Stok awal           : " . $ctrl->getStok(1) . PHP_EOL;
    echo "Tambah 10 (valid)   : " . $ctrl->updateStok(1, 10) . PHP_EOL;   
    echo "Tambah 0 (invalid)  : " . $ctrl->updateStok(1, 0) . PHP_EOL;    
    echo "Tambah -5 (invalid) : " . $ctrl->updateStok(1, -5) . PHP_EOL;   
    echo "Bahan id 99         : " . $ctrl->updateStok(99, 5) . PHP_EOL;   
    echo "Stok akhir          : " . $ctrl->getStok(1) . PHP_EOL;
}