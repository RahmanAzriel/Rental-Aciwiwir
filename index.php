<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>Rental Motor</title>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="text-center  d-flex justify-content-center m-5 w-75 h-100 rounded">
            <div class="border w-50 m-5 rounded border-secondary">
                <form action="" method="post" class="m-5">
                    <div class="">
                        <h2>Jasa Rental Aciwiwir</h2>
                        <label for="nama"><p>Masukkan nama</p></label><br>
                        <input type="text" name="nama" id="nama" class="w-100 rounded form-control" required><br>
                    </div>
                    <div class="">
                        <label for="waktu"><p>Masukan Waktu Penyewaan</p></label><br>
                        <input type="number" name="waktu" id="waktu" class="w-100 form-control p-2" required><br>
                    </div>
                    <select name="motor" id="motor" placeholder="pilih motor" class=" form-select mt-2 mb-3 p-1 w-100 text-center rounded border">
                        <option value="beat">Honda Beat</option>
                        <option value="vario">Honda Vario</option>
                        <option value="nmax">Nmax</option>
                        <option value="xmax">Xmax</option>
                    </select><br>
                    <select name="member" id="member" class=" form-select p-1  w-100 text-center rounded border"> 
                        <option value="member">Member</option>
                        <option value="nonmember">Non Member</option>
                    </select><br>
                    <input type="submit" name="sewa" value="Sewa" class="mt-2 w-100 p-2 rounded border-1 btn-primary btn text-light">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['sewa'])) {
    $nama = $_POST['nama'];
    $waktu = $_POST['waktu'];
    $motor = $_POST['motor'];
    $member = $_POST['member']; 
    class mtr
    {
        public $waktu;
        public $motor;
        protected $beat = 15000;
        protected $vario = 43000;
        protected $nmax = 57000;
        protected $xmax = 68000;

        function __construct($motor, $waktu)
        {
            $this->motor = $motor;
            $this->waktu = intval($waktu);
        }

        function harga()
        {
            switch ($this->motor) {
                case "beat":
                    $hasil = $this->waktu * $this->beat;
                    break;
                case "vario":
                    $hasil = $this->waktu * $this->vario;
                    break;
                case "nmax":
                    $hasil = $this->waktu * $this->nmax;
                    break;
                case "xmax":
                    $hasil = $this->waktu * $this->xmax;
                    break;
                default:
                    $hasil = 0;
            }
            return $hasil;
        }
    }

    $a = new mtr($motor, $waktu);
    class sewa extends mtr
    {
        private $nama;
        private $member;
        function __construct($motor, $waktu, $nama, $member)
        {
            parent::__construct($motor, $waktu);
            $this->nama = $nama;
            $this->member = $member;
        }
        function beli()
        {
            $dsc = ($this->member == 'member') ? 5 / 100 : 0;//diskon member
            $total = $this->harga() - ($this->harga() * $dsc);//harga diskon
            $total_formatted = number_format($total, 0, ',', '.');//harga ke rupiah

            echo "<div class='d-flex justify-content-center text-center' >";
            echo "<div class= 'border rounded w-50 p-3'>";
            echo "<h2>Struk Pelanggan</h2> ";
            echo "Pelanggan : " . $this->nama . "<br>";
            echo "Anda Menyewa Motor Ber Tipe " . $this->motor . " Dengan Durasi " . $this->waktu . " jam<br> Harga Total Yang Harus Di Keluarkan Sebesar Rp. " . $total_formatted . "<br>";
            echo "</div>";
            echo "</div>";
        }
    }

    // objek proses sewa
    $buy = new sewa($motor, $waktu, $nama, $member);
    //proses beli
    $buy->beli();
}
?>
