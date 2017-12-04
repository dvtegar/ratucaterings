<?php 
	include"../inc/config.php"; 
	validate_admin_not_login("login.php");
	
	
	if(!empty($_GET)){
		if($_GET['act'] == 'delete'){
			
			$q = mysql_query("delete from user WHERE id='$_GET[id]'");
			if($q){ alert("Success"); redir("user.php"); }
		}  
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'create'){
		if(!empty($_POST)){
			extract($_POST); 
			$password = md5($password);
			$q = mysql_query("insert into user Values(NULL,'$nama','$email','$telephone','$alamat','$password','$status')");
			if($q){ alert("Success"); redir("user.php"); }
		}
	}
	if(!empty($_GET['act']) && $_GET['act'] == 'edit'){
		if(!empty($_POST)){
			extract($_POST); 
			$password = md5($password);
			$q = mysql_query("update user SET nama='$nama',email='$email',telephone='$telephone',alamat='$alamat',password='$password',status='$status' where id=$_GET[id]") or die(mysql_error());
			if($q){ alert("Success"); redir("user.php"); }
		}
	}
	
	
	include"inc/header.php";
	
?> 
	
	<div class="container">
		<?php
			$q = mysql_query("select*from user");
			$j = mysql_num_rows($q);
		?>
		<h4>Daftar user Masuk (<?php echo ($j>0)?$j:0; ?>)</h4>
		<a class="btn btn-sm btn-primary" href="user.php?act=create">Add Data</a>
		<hr>
		<?php
			if(!empty($_GET)){
				if($_GET['act'] == 'create'){
				?>
					<div class="row col-md-6">
					<form action="" method="post" enctype="multipart/form-data">
						<label>Nama</label><br>
						<input type="text" class="form-control" name="nama" required><br>
						<label>Email</label><br>
						<input type="email" class="form-control" name="email" required><br>
						<label>Telephone</label><br>
						<input type="text" class="form-control" name="telephone" required><br>
						<label>Alamat</label><br>
						<input type="text" class="form-control" name="alamat" required><br>
						<label>Password</label><br>
						<input type="password" class="form-control" name="password" required><br>
						<label>Status</label><br> 
						
						<select name="status" required class="form-control"> 
							<option value="user">User</option> 
							<option value="admin">Admin</option> 
						</select><br>
						<input type="submit" name="form-input" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
				if($_GET['act'] == 'edit'){
					$data = mysql_fetch_object(mysql_query("select*from user where id='$_GET[id]'"));
				?>
					<div class="row col-md-6">
					<form action="user.php?act=edit&&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
						<label>Nama</label><br>
						<input type="text" class="form-control" name="nama" value="<?php echo $data->nama; ?>" required><br>
						<label>Email</label><br>
						<input type="email" class="form-control" name="email" value="<?php echo $data->email; ?>" required><br>
						<label>Telephone</label><br>
						<input type="text" class="form-control" name="telephone" value="<?php echo $data->telephone; ?>" required><br>
						<label>Alamat</label><br>
						<input type="text" class="form-control" name="alamat" value="<?php echo $data->alamat; ?>" required><br>
						<label>Password</label><br>
						<input type="password" class="form-control" name="password" required><br>
						<label>Status</label><br>
						<select name="status" required class="form-control"> 
						 
								<option value="<?php echo $data->status; ?>"><?php echo $data->status; ?></option>
								<option value="user">User</option> 
								<option value="admin">Admin</option> 
						</select><br>
						<input type="submit" name="form-edit" value="Simpan" class="btn btn-success">
					</form>
					</div>
					<div class="row col-md-12"><hr></div>
				<?php	
				} 
			}
		?>
		
		<table class="table table-striped table-hove"> 
			<thead> 
				<tr> 
					<th>#</th> 
					<th>Nama</th> 
					<th>Email</th> 
					<th>Telephone</th> 
					<th>Alamat</th> 
					<th>Status</th> 
					<th>*</th> 
				</tr> 
			</thead> 
			<tbody> 
				

			
			
		<?php while($data=mysql_fetch_object($q)){ ?> 
				<tr> 
					<th scope="row"><?php echo $no++; ?></th> 
					<td><?php echo $data->nama ?></td> 
					<td><?php echo $data->email ?></td> 
					<td><?php echo $data->telephone ?></td> 
					<td><?php echo $data->alamat ?></td> 
					<td><?php echo $data->status ?></td> 
					<td>
						<a class="btn btn-sm btn-success" href="user.php?act=edit&&id=<?php echo $data->id ?>">Edit</a>
						<a class="btn btn-sm btn-danger" href="user.php?act=delete&&id=<?php echo $data->id ?>">Delete</a>
					</td> 
				</tr>
		<?php } ?>
			</tbody> 
		</table> 
    </div> <!-- /container -->
	
<?php include"inc/footer.php"; ?>