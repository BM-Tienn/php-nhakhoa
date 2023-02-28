<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/bacsi.php';?>
<?php include '../classes/menu.php';?>

<?php include_once '../helper/format.php';?>
<?php 
$pd= new bacsi();
$fm= new Format();
if(!isset($_GET['bsid']) || $_GET['bsid'] == NULL){
    // echo "<script> window.location = 'catlist.php' </script>";
    
}else {
    $id = $_GET['bsid']; // Lấy catid trên host
    $delBacsi = $pd -> del_bacsi($id); // hàm check delete Name khi submit lên
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách bác sĩ </h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên bác sĩ </th>
					<th>Chức vụ</th>
					<th>Kinh nghiệm </th>
					<th>Địa chỉ </th>
					
					<th>Hình ảnh </th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$pdList= $pd->show_bacsi();
			if($pdList){
				$i=0;
				while ($result = $pdList->fetch_assoc()){
                   $i++;
		
			?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['Hoten'] ?></td>
					<td><?php echo $result['Chucvu'] ?></td>
					
					<td>
					<?php echo $fm->textShorten( $result['Kinhnghiem'],50); ?>
					</td>
					<td><?php echo $result['Diachi'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>

					
					<td><a href="bsedit.php?bsid=<?php echo $result['Id_bacsi']?>">Edit</a> ||  <a href="?bsid=<?php echo $result['Id_bacsi'] ?>">Delete</a></td>
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
