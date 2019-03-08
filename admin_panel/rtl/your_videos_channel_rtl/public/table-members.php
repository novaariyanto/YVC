<?php
	include('public/fcm.php');
?>

<?php

  //user role
	$roles = array(
		'100' => 'Super Admin',
		'101' => 'Admin',
		'102' => 'Moderator',
	);

	$sql_query = "SELECT * FROM tbl_user ORDER BY id DESC";
	$result = mysqli_query($connect, $sql_query);

 ?>

 <?php

	if (isset($_GET['id'])) {

        $sql = 'SELECT * FROM tbl_user WHERE id=\''.$_GET['id'].'\'';
        $result = mysqli_query($connect, $sql);

        Delete('tbl_user','id='.$_GET['id'].'');

        header("location: members.php");
        exit;

    }

 ?>

	<!-- START CONTENT -->
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          	<div class="container">
            	<div class="row">
              		<div class="col s12 m12 l12">
               			<h5 class="breadcrumbs-title">Manage Users</h5>
		                <ol class="breadcrumb">
		                  <li><a href="dashboard.php">Dashboard</a></li>
		                  <li><a class="active">Manage Users</a></li>
		                </ol>
              		</div>
            	</div>
          	</div>
        </div>
        <!--breadcrumbs end-->

        <!--start container-->
        <div class="container">
          	<div class="section">
				<div class="row">
		        	<div class="col s12 m12 l12">
		        	<div align="right"><a href="add-member.php" class="btn waves-effect waves-light indigo">Add New User</a></div>

		        		<div class="card-panel">



		<table id="table_category" class="responsive-table display" cellspacing="0">
			<thead>
				<tr>
					<th class="hide-column"><div align="right">User ID</div></th>
					<th><div align="right">No.</div></th>
					<th><div align="right">Name</div></th>
					<th><div align="right">Email</div></th>
					<th><div align="right">Action</div></th>
				</tr>
			</thead>

			<tbody>
				<?php
					$i = 1;
					while($data = mysqli_fetch_array($result)) {
				?>
	            <tr>
	            	<td class="hide-column"><div align="right"><?php echo $data['id'];?></div></td>
	            	<td><div align="right">
	            		<?php
		                    echo $i;
		                    $i++;
		                ?>
	            	</div></td>
	                <td><div align="right"><?php echo $data['username'];?></div></td>
	                <td><div align="right"><?php echo $data['email'];?></div></td>
	                <td><div align="right">
						<a href="edit-member.php?id=<?php echo $data['id']; ?>">
							<i class="mdi-editor-mode-edit"></i>
						</a>
						
						<?php
							if ($data['id'] == 1) {

							} else {
						?>
							<a href="members.php?id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure want to delete this user?')" >
				                <i class="mdi-action-delete"></i>
				            </a>
						<?php
							}
						?>

					</div></td>
	            </tr>

	            <?php } ?>
			</tbody>

		</table>

				    </div>
						</div>
					</div>
				</div>
			</div>
		</div>

</section>
