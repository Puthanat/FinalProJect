<?php

include('server.php');


$select=$_POST['select'];
$search=$_POST['search'];

if(!empty($search)){
      if($select!=1){
            if(isset($_POST["page"])){
                  $page = $_POST["page"];
                }else{
                  $page = 1;
                }
            $record_show = 7;
            $output ='';
            $offset = ($page - 1) * $record_show;
            $sql_total = "SELECT * FROM account WHERE $select LIKE '%$search%'";
            $query_total = mysqli_query($conn,$sql_total);
            $row_total = mysqli_num_rows($query_total);
            $page_total = ceil($row_total/$record_show);
            $sql="SELECT * FROM account WHERE $select LIKE '%$search%' LIMIT $offset,$record_show";
            $query = mysqli_query($conn,$sql);
      
            $search_data = array();
      
            while($result = mysqli_fetch_assoc($query)){
                  $search_data[] = $result;
            }
            $output .='<nav aria-label="Page navigation example">
                        <ul class="pagination pagination_search justify-content-center">'; 
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
            'search_data'     =>	$search_data,
            'output'		=>	$output,
            );
            echo json_encode($all);
      }else{
            if(isset($_POST["page"])){
                  $page = $_POST["page"];
                }else{
                  $page = 1;
                }
            $record_show = 7;
            $output ='';
            $offset = ($page - 1) * $record_show;
            $sql_total = "SELECT * FROM account WHERE A_User LIKE '%$search%' or A_Name LIKE '%$search%' or A_Lastname LIKE '%$search%' or A_Section LIKE '%$search%'";
            $query_total = mysqli_query($conn,$sql_total);
            $row_total = mysqli_num_rows($query_total);
            $page_total = ceil($row_total/$record_show);
            $sql="SELECT * FROM account WHERE A_User LIKE '%$search%' or A_Name LIKE '%$search%' or A_Lastname LIKE '%$search%' or A_Section LIKE '%$search%' LIMIT $offset,$record_show";
            $query = mysqli_query($conn,$sql);
      
            $search_data = array();
      
            while($result = mysqli_fetch_assoc($query)){
                  $search_data[] = $result;
            }
            $output .='<nav aria-label="Page navigation example">
                        <ul class="pagination pagination_search justify-content-center">';
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
            'search_data'	=>	$search_data,
            'output'		=>	$output,
            );
            echo json_encode($all);
      }
}
?>