<?php
// Inisialisasi variabel untuk menyimpan nilai input dan error
$nama = $email = $nomor = $paket = $tanggal = $waktu = "";
$namaErr = $emailErr = $nomorErr = $paketErr = $tanggalErr = $waktuErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    $nama = $_POST["nama"];
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // Validasi Email
    $email = $_POST["email"];
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    }

    // Validasi Nomor Telepon
    $nomor = $_POST["nomor"];
    if (empty($nomor)) {
        $nomorErr = "Nomor Telepon wajib diisi";
    } elseif (!ctype_digit($nomor)) {
        $nomorErr = "Nomor Telepon harus berupa angka";
    }

    // Validasi Jenis Paket
    $paket = $_POST["paket"];
    if (empty($paket)) {
        $paketErr = "Jenis Paket wajib dipilih";
    }

    // Validasi Tanggal
    $tanggal = $_POST["tanggal"];
    if (empty($tanggal)) {
        $tanggalErr = "Tanggal wajib diisi";
    }

    // Validasi Waktu
    $waktu = $_POST["waktu"];
    if (empty($waktu)) {
        $waktuErr = "Waktu wajib dipilih";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Form Booking</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="nomor">Nomor Telepon:</label>
                <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
                <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="paket">Pilih Jenis Paket:</label>
                <select id="paket" name="paket">
                    <option value="     " <?php echo ($paket == "     ") ? "selected" : ""; ?>>     </option>
                    <option value="Selfphoto" <?php echo ($paket == "Selfphoto") ? "selected" : ""; ?>>Selfphoto</option>
                    <option value="Graduation" <?php echo ($paket == "Graduation") ? "selected" : ""; ?>>Graduation</option>
                    <option value="Group Photo" <?php echo ($paket == "Group Photo") ? "selected" : ""; ?>>Group Photo</option>
                    <option value="Family Photo" <?php echo ($paket == "Family Photo") ? "selected" : ""; ?>>Family Photo</option>
                    <option value="Photobox" <?php echo ($paket == "Photobox") ? "selected" : ""; ?>>Photobox</option>
                    <option value="Prewedding Photo" <?php echo ($paket == "Prewedding Photo") ? "selected" : ""; ?>>Prewedding Photo</option>
                    <option value="Couple Photo" <?php echo ($paket == "Couple Photo") ? "selected" : ""; ?>>Couple Photo</option>
                    <option value="Maternity" <?php echo ($paket == "Maternity") ? "selected" : ""; ?>>Maternity</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal">Pilih Tanggal Booking:</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>">
                <span class="error"><?php echo $tanggalErr ? "* $tanggalErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="waktu">Pilih Waktu:</label>
                <select id="waktu" name="waktu">
                    <option value="     " <?php echo ($waktu == "     ") ? "selected" : ""; ?>>     </option>
                    <option value="09.00" <?php echo ($waktu == "09.00") ? "selected" : ""; ?>>09.00</option>
                    <option value="09.30" <?php echo ($waktu == "09.30") ? "selected" : ""; ?>>09.30</option>
                    <option value="10.00" <?php echo ($waktu == "10.00") ? "selected" : ""; ?>>10.00</option>
                    <option value="10.30" <?php echo ($waktu == "10.30") ? "selected" : ""; ?>>10.30</option>
                    <option value="11.00" <?php echo ($waktu == "11.00") ? "selected" : ""; ?>>11.00</option>
                    <option value="11.30" <?php echo ($waktu == "11.30") ? "selected" : ""; ?>>11.30</option>
                    <option value="12.00" <?php echo ($waktu == "12.00") ? "selected" : ""; ?>>12.00</option>
                    <option value="12.30" <?php echo ($waktu == "12.30") ? "selected" : ""; ?>>12.30</option>
                </select>
            </div>

            <div class="button-container">
                <button type="submit">Submit Data</button>
            </div>
        </form>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$paketErr && !$tanggalErr && !$waktuErr) { ?>
    <div class="container">
        <h3>Data Booking:</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="20%">Nama</th>
                        <th width="20%">Email</th>
                        <th width="15%">Nomor Telepon</th>
                        <th width="15%">Jenis Paket</th>
                        <th width="30%">Tanggal Booking</th>
                        <th width="15%">Waktu Booking</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $paket; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $waktu; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</body>

</html>