<?php
	include_once('functions.php'); 
?>

<?php

	$sql_query = "SELECT * FROM tbl_gallery p, tbl_category c WHERE p.cat_id = c.cid ORDER BY id DESC";
	$result = mysqli_query($connect, $sql_query);

 ?>

	<!-- START CONTENT -->
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          	<div class="container">
            	<div class="row">
              		<div class="col s12 m12 l12">
               			<h5 class="breadcrumbs-title">Manage Video</h5>
		                <ol class="breadcrumb">
		                  <li><a href="dashboard.php">Dashboard</a>
		                  </li>
		                  <li><a class="active">Manage Video</a>
		                  </li>
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
		        	<div align="right"><a href="add-video.php" class="btn waves-effect waves-light indigo">Add New Video</a></div>
		        		
		        		<div class="card-panel">



		<table id="table_channel" class="responsive-table display" cellspacing="0">		         
			<thead>
				<tr>
					<th class="hide-column"><div align="right">ID</div></th>
					<th><div align="right">No.</div></th>
					<th width="45%"><div align="right">Video Title</div></th>
					<th><div align="right">Video Image</div></th>
					<th><div align="right">Video Type</div></th>
					<th><div align="right">Category</div></th>
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
	                <td><div align="right"><?php echo $data['video_title'];?></div></td>

	            	<td><div align="right">
	            		<?php
							if ($data['video_type'] == 'youtube') {			
				      	?>
				      		<img src="https://img.youtube.com/vi/<?php echo $data['video_id'];?>/mqdefault.jpg" height="54px" width="72px"/>
				      	<?php } else { ?>
	            			<img src="upload/<?php echo $data['video_thumbnail'];?>" height="54px" width="72px"/>
	            		<?php } ?>
	            	</div></td>

	            	<td><div align="right"><?php echo $data['video_type'];?></div></td>
	            	<td><div align="right"><?php echo $data['category_name'];?></div></td>
	                <td><div align="right">
						<a href="edit-video.php?id=<?php echo $data['id'];?>">
							<i class="mdi-editor-mode-edit"></i>
						</a>
						<a href="delete-video.php?id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure want to delete this video?')" >
							<i class="mdi-action-delete"></i>
						</a>
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
					
				