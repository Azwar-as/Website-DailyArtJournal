<?php
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

$username_login = $_SESSION['username'];

$stmt = $conn->prepare("SELECT username, foto FROM user WHERE username=? LIMIT 1");
$stmt->bind_param("s", $username_login);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$nama = $user['username'] ?? $username_login;
$foto = $user['foto'] ?? '';

?>


<form action="" method="post" enctype="multipart/form-data">
    <label for="user">Username</label>
    <input type="text" name="user" id="user" class="form-control mb-4 mt-2 py-2" value="<?= $nama; ?>"
        placeholder="Username" readonly>

    <label for="gantiPass">Ganti Password</label>
    <input type="password" name="gantiPass" id="gantiPass" class="form-control mb-4 py-2"
        placeholder="Tuliskan Password Baru,Jika Ingin Mengganti Password Saja">

    <label for="gantiFoto">Ganti Foto Profile</label>
    <input type="file" name="gantiFoto" id="gantiFoto" class="form-control mb-4 py-2" accept="image/*">

    <label>Foto Profile Saat Ini</label><br>
    <img src="img/<?=$foto !== '' ? $foto : "default_profile.png";?>" id="fotoSaatIni" alt="foto profile saat ini"
        style="width:120px;height:120px;object-fit:cover;border-radius:50%;">

    <div class="text-center my-3 d-grid">
        <button type="submit" name="simpan_profile" class="btn btn-dark">Simpan</button>
    </div>
</form>
<?php 
include "upload_foto.php";

if(isset($_POST['simpan_profile'])){
    $username_login=$_SESSION['username'];

    $stmt = $conn->prepare("SELECT foto,username FROM user WHERE username=? LIMIT 1");
    $stmt->bind_param('s',$username_login);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $fotoLama = $data['foto'] ?? '';
    $stmt->close();

    $sukses = true;

    $newPass = trim($_POST['gantiPass']?? '');
    if($newPass !== ''){
        $passHash = md5($newPass);
        $stmt = $conn->prepare('UPDATE user SET password=? WHERE username=?');
        $stmt->bind_param("ss",$passHash,$username_login);
        $sukses = $stmt->execute() && $sukses;
        $stmt->close();
    }

    if(isset($_FILES['gantiFoto']) && $_FILES['gantiFoto']['name'] !== ''){
        $cek = upload_foto($_FILES['gantiFoto']);
    
        if(!$cek['status']){
            echo "<script>alert('".$cek['message']."');</script>";
        }else{
            $fotoBaru = $cek['message'];
            if ($fotoLama !== '' && file_exists("img/" . $fotoLama)) {
                unlink("img/" . $fotoLama);
            }
            $stmt = $conn->prepare("UPDATE user SET foto=? WHERE username=?");
            $stmt->bind_param("ss", $fotoBaru, $username_login);
            $sukses = $stmt->execute() && $sukses;
            $stmt->close();
        }
    };
    if ($sukses) {
        echo "<script>alert('Profile berhasil diperbarui'); document.location='admin.php?page=profile';</script>";
    } else {
        echo "<script>alert('Profile gagal diperbarui'); document.location='admin.php?page=profile';</script>";
    }
}
?>