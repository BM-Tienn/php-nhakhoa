<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/menu.php';?>
<?php
    // gọi class adminlogin
   $menu = new menu(); 
   if(isset($_GET['delid']) ){
	$id = $_GET['delid']; // Lấy catid trên host
	$Delmenu = $menu ->del_menu($id);
}
       
  
  ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách menu </h2>
                <div class="block"> 
				<?php 
                    if(isset($Delmenu)){
                        echo $Delmenu;
                    }
                 ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php
					 $show_menu = $menu -> show_menu();
					 if($show_menu){
						 $i = 0;
						 while($result = $show_menu-> fetch_assoc()){
							 $i++;
					  
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['tenmenu'] ?></td>
							<td><a href="menuedit.php?menuid=<?php echo $result['Id_menu'];?>">Edit</a> || <a onclick=" return confirm('Are you want to delete')" href="?delid=<?php echo $result['Id_menu']?>">Delete</a></td>
						</tr>
						<?php
					}
				}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

