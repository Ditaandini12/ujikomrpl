<!DOCTYPE html>
<html>
	<head>
		<title>register masyarakat</title>
			<link rel="stylesheet" href="../css/register.css" type="text/css">

<style>
	input[type=text] , select {
	    width: 100%;
	    padding: 12px 20px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	    }
	input[type=submit] {
	    width: 10%;
	    background-color: #4CAF50;
	    color: white;
	    padding: 14px 20px;
	    margin: 8px 0;
	    border: none;
	    border-radius: 4px;
	    cursor: pointer;
	    }
	input[type=submit] hover {
	    background-color: #45a049;
	    }
	div {
	    border-radius: 5px;
	    background-color: #F2f2f2;
	    padding: 20px;
	    }
	.kotakform { 
	    width: 80%;
	    margin: 20px auto 20px auto;
	    }
	h1 {
	    text-align: center;
	    margin: 80px auto 0 auto;
	    }
</style>
	</head>

	<body background="iki.jpg">
		<h1>Form Register </h1> 
			<div class ="kotakform">
				<form method="POST">

					<label for="nik">NIK</label>
						<input type="text"id="nik"name="nik"placeholder="Masukan NIK anda" required>

					<label for="nama">Nama</label>
						<input type="text"id="nama"name="nama"placeholder="Masukan nama anda" required>

					<label for="username">Username</label>
						<input type="text"id="username"name="username"placeholder="Masukan username anda" required>
						
					<label for="password">Password</label>
						<input type="text"id="password"name="password"placeholder="Masukan password anda" required>
						
					<label for="telp">Telepon</label>
						<input type="text"id="telp"name="telp"placeholder="Masukan no telepon anda" required>
					
						<input  type="submit" name="Submit" value="Submit">
				</form>

			<?php
				include "conn/koneksi.php";
				if(isset($_POST['Submit'])){	
				$nik		=$_POST['nik'];
				$nama		=$_POST['nama'];
				$username	=$_POST['username'];
				$password	=md5($_POST['password']);
				$telp		=$_POST['telp'];
				
				$ceknik	=mysqli_num_rows (mysqli_query($koneksi, "SELECT nik FROM masyarakat WHERE nik='$_POST[nik]'"));
				
				if($ceknik > 0) {
				?>
					<script language="JavaScript">
						alert('NIK sudah di gunakan...');
						document.location='registerr.php';
					</script>
				<?php
				}
					
				else{
					$insert =mysqli_query($koneksi, "INSERT INTO masyarakat (nik, nama, username, password, telp) VALUES ('$nik', '$nama', '$username', '$password', '$telp')");
					?>
						<script language="JavaScript">
						alert('Input Data Siswa Berhasil ...');
						document.location='loginm.php';
						</script>
					<?php
					}
				}
			?>

			</div>
		
	</body>
</html>
