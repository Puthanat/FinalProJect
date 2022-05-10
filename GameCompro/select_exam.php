<?php 
    require_once('server.php');
    $id=$_POST['id'];
    $outp='';
    $sql="SELECT * FROM question WHERE Q_ID = $id";
    $query=mysqli_query($conn,$sql);
    $outp.="<div class='table table-responsive'>
    <table class='table table-bordered'>";
    while($row=mysqli_fetch_array($query)){
            $outp.='<tr><td width="30%"><label>คำถาม</label></td>
                      <td width="100%">'.$row['Q_Name'].'</td>
                  </tr>';
            $outp.='<tr><td width="30%"><label>คำตอบข้อ 1</label></td>
                        <td width="100%">'.$row['Q_a'].'</td>
                  </tr>';
            $outp.='<tr><td width="30%"><label>คำตอบข้อ 2</label></td>
                        <td width="100%">'.$row['Q_b'].'</td>
                  </tr>';
            $outp.='<tr><td width="30%"><label>คำตอบข้อ 3</label></td>
                        <td width="100%">'.$row['Q_c'].'</td>
                  </tr>';  
            $outp.='<tr><td width="30%"><label>คำตอบข้อ 4</label></td>
                        <td width="100%">'.$row['Q_d'].'</td>
                  </tr>';
             $outp.='<tr><td width="30%"><label>คำตอบที่ถูก</label></td>
                        <td width="100%">'.$row['Q_answer'].'</td>
                  </tr>';             

}
$outp.="</table></div>";
echo $outp;
?>