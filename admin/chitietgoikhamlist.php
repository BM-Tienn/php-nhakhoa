<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/bacsi.php';?>
<?php include '../classes/chitietgk.php';?>

<?php include_once '../helper/format.php';?>
<?php 
$ctgk= new chitietgk();
$fm= new Format();
if(!isset($_GET['ctgkId']) || $_GET['ctgkId'] == NULL){
    // echo "<script> window.location = 'catlist.php' </script>";
    
}else {
    $id = $_GET['ctgkId']; // Lấy catid trên host
    $delCTGK = $ctgk -> del_ctgk($id); // hàm check delete Name khi submit lên
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách chi tiết gói khám  </h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tên chi tiết gói khám  </th>
					<th>Hình ảnh </th>
					<th>Giá tiền  </th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
			<?php
			
			$ctgkList= $ctgk->show_ctgk();
			if($ctgkList){
				$i=0;
				while ($result = $ctgkList->fetch_assoc()){
                   $i++;
		
			?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['Tenchitietgoikham'] ?></td>
                    <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $result['Giatien'] ?></td>
					
					<td><a href="ctgkedit.php?ctgkId=<?php echo $result['Id_ctgk']?>">Edit</a> ||  <a href="?ctgkId=<?php echo $result['Id_ctgk'] ?>">Delete</a></td>
					

					
					
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
