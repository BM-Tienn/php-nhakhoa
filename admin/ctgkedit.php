<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/goikham.php';  ?>
<?php include '../classes/chitietgk.php';  ?> 

<?php
    // gọi class category
    $ctgk = new chitietgk();
    if(!isset($_GET['ctgkId']) || $_GET['ctgkId'] == NULL){
        echo "<script> window.location = 'chitietgoikhamlist.php' </script>";
        
    }else {
        $id = $_GET['ctgkId']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateCTGK = $ctgk -> update_ctgk($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa chi tiết gói khám  </h2>
        <?php 
            if(isset($updateCTGK)){
                echo $updateCTGK;
            }
         ?>
         <?php 
         $get_ctgk_by_id = $ctgk->getctgkbyId($id);
         if($get_ctgk_by_id){
            while ($result_ctgk = $get_ctgk_by_id->fetch_assoc()) {
                # code...
            
          ?>   
        <div class="block">
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <tr>
                    <td>
                        <label>Gói khám</label>
                    </td>
                    <td>
                        <select id="select" name="goikham">
                            <option>Lựa chọn gói khám </option>
                            <?php 
                            $goikham = new goikham();
                            $goikhamlist = $goikham->show_goikham();
                            if($goikhamlist){
                                while ($result = $goikhamlist->fetch_assoc()){
                            
                             ?>
                            <option 
                            <?php 
                            if($result['Id_goikham']==$result_ctgk['Id_goikham'])
                                { echo 'selected'; }
                             ?>    
                            value=" <?php echo $result['Id_goikham'] ?> "> <?php echo $result['Tengoikham'] ?></option>
                            
                            <?php 
                            }
                             }
                             ?>
                        </select>
                    </td>
                </tr>
               
                <tr>
                    <td>
                        <label>Tên chi tiết gói khám  </label>
                    </td>
                    <td>
                        <input name="Tenchitietgoikham" value="<?php echo $result_ctgk['Tenchitietgoikham'] ?>" type="text" class="medium" />
                    </td>
                </tr>
    
                <tr>
                    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_ctgk['image'] ?>" width="100"><br>
                        <input name="image" type="file" />
                    </td>
                </tr>
                
                
                
                
                <tr>
                    <td>
                        <label>Giá tiền   </label>
                    </td>
                    <td>
                        <input name="Giatien" value="<?php echo $result_ctgk['Giatien'] ?>" type="text" class="medium" />
                    </td>
                </tr>
            
                
                

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
            }
            }
             ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


