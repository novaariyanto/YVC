<?php
	include('public/fcm.php');
	include('public/language.php'); 
?>

<?php

	$sql_query = "SELECT * FROM tbl_category ORDER BY cid DESC";
	$result = mysqli_query($connect, $sql_query);

 ?>

	<!-- START CONTENT -->
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          	<div class="container">
            	<div class="row">
              		<div class="col s12 m12 l12">
               			<h5 class="breadcrumbs-title">Manage Category</h5>
		                <ol class="breadcrumb">
		                  <li><a href="dashboard.php">Dashboard</a>
		                  </li>
		                  <li><a class="active">Manage Category</a>
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
		        	<div align="right"><a href="add-category.php" class="btn waves-effect waves-light indigo">Add New Category</a></div>
		        		
		        		<div class="card-panel">



		<table id="table_category" class="responsive-table display" cellspacing="0">		         
			<thead>
				<tr>
					<th class="hide-column"><div align="right">Category ID</div></th>
					<th><div align="right">No.</div></th>
					<th><div align="right">Category Name</div></th>
					<th><div align="right">Category Image</div></th>
					<th><div align="right">Action</div></th>
				</tr>
			</thead>   

			<tbody>
				<?php 
					$i = 1;
					while($data = mysqli_fetch_array($result)) {
				?>

	            <tr>
	            	<td class="hide-column"><div align="right"><?php echo $data['cid'];?></div></td>
	            	<td>
	            	<div align="right">
	            		<?php
		                    echo $i;
		                    $i++;
		                ?>
		            </div>
	            	</td>
	                <td><div align="right"><?php echo $data['category_name'];?></div></td>
	            	<td><div align="right"><img src="upload/category/<?php echo $data['category_image'];?>" height="54px" width="54px"/></div></td> 
	                <td>
	                <div align="right">
						<a href="edit-category.php?id=<?php echo $data['cid'];?>" >
	                      <i class="mdi-editor-mode-edit"></i>
	                    </a>

	                    <a href="delete-category.php?id=<?php echo $data['cid'];?>" onclick="return confirm('Are you sure want to delete this category?')" >
	                      <i class="mdi-action-delete"></i>
	                    </a>
	                </div>
					</td>
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
