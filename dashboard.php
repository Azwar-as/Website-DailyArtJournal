<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM articles ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

$username_login = $_SESSION['username'] ;

$stmt = $conn->prepare("SELECT username,foto FROM user WHERE username = ? LIMIT 1");
$stmt->bind_param("s",$username_login);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if(isset($_POST['simpan_profile'])){
    $newUsername = trim($_POST['username']?? '');
    $newPass = trim($_POST['gantiPass']?? '');
    $newFoto = trim($_POST['gantiFoto']?? '');
}

$nama = $user['username'] ?? $username_login;
$foto = $user['foto'] ?? '';

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows; 
$jumlah_gallery = $hasil2->num_rows;
?>
<div class="text-center">
    <div>
        <h1 class="text-muted">Selamat Datang</h1>
        <h2 class="fw-bold"><?= $nama?></h2>
        <div class="w-20">
            <img width="230rem" class="img-fluid rounded rounded-circle"
                src="<?= $foto !== '' ? "img/".$foto : "img/default_profile.jpeg" ?>">
        </div>
    </div>
</div>
<!-- Introduction dashboard End-->

<div class="row row-cols-1 row-cols-md-6 justify-content-center pt-4">
    <div class="col ">
        <div class="card border border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_article; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border border-dark mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_article ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>