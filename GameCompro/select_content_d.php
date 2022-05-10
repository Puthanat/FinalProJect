<?php 
    require_once('server.php');
    $id  = $_POST['id'];
    $id2 = $_POST['id1'];
    $id3 = $_POST['id2'];

    $outp='';
    $sql="SELECT * FROM content WHERE Ch_ID = $id AND Co_H = $id2 AND Co_D = $id3";
    $query=mysqli_query($conn,$sql);
    $outp.="<div class='table table-responsive'>
    <table class='table table-bordered'>";
    while($row=mysqli_fetch_array($query)){
            $img  = "css/images/".$row['Co_Picture'];
            $outp.='<tr>
                        <td width="30%" colspan="2"><label>รูปภาพ</label></td>
                  </tr>';
            $outp.='<tr>
                      <td colspan="2" width="100%"><img src="'.$img.'" width="200" style=" display:block; margin-left:auto; margin-right:auto;"></br></td>
                  </tr>';
            $outp.='<tr><td width="30%"><label>ชื่อ</label></td>
                      <td width="100%">'.$row['Co_Name'].'</td>
                  </tr>';
            $outp.='<tr><td width="30%"><label>เนื้อหา</label></td>
                        <td width="100%">'.$row['Co_Description'].'</td>
                  </tr>';
            
}
$outp.="</table></div>";
echo $outp;
?>