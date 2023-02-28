<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/goikham.php';?>
<?php include '../classes/menu.php';?>

<?php include_once '../helper/format.php';?>
<?php 
$pd= new goikham();
$fm= new Format();
if(!isset($_GET['gkid']) || $_GET['gkid'] == NULL){
    // echo "<script> window.location = 'catlist.php' </script>";
    
}else {
    $id = $_GET['gkid']; // Lấy catid trên host
    $delgoikham = $pd -> del_goikham($id); // hàm check delete Name khi submit lên
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách gói khám  </h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên gói khám </th>	
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$pdList= $pd->show_goikham();
			if($pdList){
				$i=0;
				while ($result = $pdList->fetch_assoc()){
                   $i++;
		
			?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['Tengoikham'] ?></td>
					<td><a href="gkedit.php?gkid=<?php echo $result['Id_goikham']?>">Edit</a> ||  <a href="?gkid=<?php echo $result['Id_goikham'] ?>">Delete</a></td>
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
