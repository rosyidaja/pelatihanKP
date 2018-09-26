<?php 
$user_id=$_SESSION['m-id'];

include '../../config/koneksi.php';

$Edinfo = mysqli_query($koneksi, "SELECT * FROM m_user WHERE user_id='$user_id'"); 
$query = mysqli_fetch_assoc($Edinfo);

$user_fnama =$query['user_fnama'];
$user_email =$query['user_email'];
$user_password =$query['user_pwd'];

  // include ('../public/pesan.php'); 
?>

<div class="header-info-acc">
  <h1>My Account</h1> 
</div>
  <div class="space">
   <br/>
  </div>
<div class="set-acc col-sm-5">
	<form action="../../fungsi/edit-info-user.php" method="POST" style="font-size: 15px;">
    <div class="form-group">
      <div class="row">
        <div class="col-sm-3">
          <label>Nama</label>
        </div>
        <div> :</div>
        <div class="col-sm-7">
          <input type="text" id="" class="form-control" name="fnama" value="<?php echo $user_fnama;?>">  
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-sm-3">
          <label>Email</label>
        </div>
        <div> :</div>
        <div class="col-sm-7">
          <input type="email" id="" class="form-control" name="email" value="<?php echo $user_email;?>">  
        </div>
      </div>
    </div>
  
    <div class="form-group">
      <div class="row">
        <div class="col-sm-3">
          <label>Password</label>
        </div>
        <div> :</div>
        <div class="col-sm-7">
          <input type="password" id="" class="form-control" name="password" value="<?php echo $user_password;?>">
        </div>
      </div>
    </div>

    <button type="submit" name="edit-info" class="btn btn-primary"> Edit </button>
  </form>
</div>