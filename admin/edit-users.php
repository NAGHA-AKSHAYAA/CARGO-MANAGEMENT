<?php include_once('config.php');
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
	$row	=	$db->getAllRecords('user','*',' AND user_id="'.$_REQUEST['editId'].'"');
}

if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
	extract($_REQUEST);
	if($username1==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un1&editId='.$_REQUEST['editId']);
		exit;
	}elseif($username2==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=un2&editId='.$_REQUEST['editId']);
		exit;
	}elseif($useremail==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userpassword==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=upass&editId='.$_REQUEST['editId']);
		exit;
	}elseif($userphone==""){
		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
		exit;
	}
	$data	=	array(
					'first_name'=>$username1,
					'last_name'=>$username2,
					'email'=>$useremail,
					'password'=>$userpassword,
					'phone_number'=>$userphone,
					);
	$update	=	$db->update('user',$data,array('user_id'=>$editId));
	if($update){
		header('location: browse-users.php?msg=rus');
		exit;
	}else{
		header('location: browse-users.php?msg=rnu');
		exit;
	}
}
?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>USER DETAILS</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>


   	<div class="container">

		</div>
		<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un1"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> First Name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un2"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Last Name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="upass"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User password is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="browse-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>
			<div class="card-body">

				<div class="col-sm-6">
					<h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
					<form method="post">
						<div class="form-group">
							<label>First Name <span class="text-danger">*</span></label>
							<input type="text" name="username1" id="username1" class="form-control" value="<?php echo $row[0]['first_name']; ?>" placeholder="Enter first name" required>
						</div>
						<div class="form-group">
							<label>Last Name <span class="text-danger">*</span></label>
							<input type="text" name="username2" id="username2" class="form-control" value="<?php echo $row[0]['last_name']; ?>" placeholder="Enter last name" required>
						</div>
						<div class="form-group">
							<label>User Email <span class="text-danger">*</span></label>
							<input type="email" name="useremail" id="useremail" class="form-control" value="<?php echo $row[0]['email']; ?>" placeholder="Enter user email" required>
						</div>
						<div class="form-group">
							<label>User Password <span class="text-danger">*</span></label>
							<input type="password" name="userpass" id="userpass" class="form-control" value="<?php echo $row[0]['password']; ?>" placeholder="Enter user password" required>
						</div>
						<div class="form-group">
							<label>User Phone <span class="text-danger">*</span></label>
							<input type="tel" name="userphone" id="userphone" maxlength="12" class="form-control" value="<?php echo $row[0]['phone_number']; ?>" placeholder="Enter user phone" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>
