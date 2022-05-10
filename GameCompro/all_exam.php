<?php
include('server.php');
if(isset($_POST["page"])){
  $page = $_POST["page"];
}else{
  $page = 1;
}
$id = $_POST["id"];
$record_show = 10;
$output ='';
$offset = ($page - 1) * $record_show;
$sql_total = "SELECT * FROM question WHERE Ch_ID = $id";
$query_total = mysqli_query($conn,$sql_total);
$row_total = mysqli_num_rows($query_total);
$page_total = ceil($row_total/$record_show);

$sql="SELECT * FROM question WHERE Ch_ID = $id LIMIT $offset,$record_show";
$query = mysqli_query($conn,$sql);
$data = array();
while($result = mysqli_fetch_assoc($query)){
      $data[] = $result;
}

$output .='<nav aria-label="Page navigation example">
           <ul class="pagination justify-content-center">';
$output .='<li class="page-item" id="1"><span class="page-link">First</span></li>'; 
if($page > 1){
  $previous = $page - 1;  
  $output .='<li class="page-item" id="'.$previous.'"><span class="page-link">&laquo;</span></li>';
}

for($i=1; $i<=$page_total;$i++){
  $active_class = "";
  if($i == $page){
    $active_class = "active";
  }
  $output .='<li class="page-item '.$active_class.'" id="'.$i.'"><span class="page-link">'.$i.'</span></li>';
}

if($page < $page_total){
  $page++;
  $output .='<li class="page-item" id="'.$page.'"><span class="page-link">&raquo;</span></li>';

}
$output .='<li class="page-item" id="'.$page_total.'"><span class="page-link">Last</span></li>';
$output .='</ul>
           </nav>';
$all = array(
  'data'		=>	$data,
  'output'		=>	$output,
);
echo json_encode($all);
?>