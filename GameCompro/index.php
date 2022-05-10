<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
      <link rel="stylesheet" href="css/manubar2.css">
      <link rel="stylesheet" href="css/style2.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/manubar2.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
      <!-- datatable lib -->
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
      </script>
</head>

<body>

  <?php 
  include('navbar2.php'); 
  require_once('server.php');
  $data = array();
  $sql = "SELECT * FROM account WHERE A_Role = 'member' ORDER BY A_Point DESC LIMIT 10";
  // $sql = "SELECT * FROM account WHERE A_Role = 'member' ORDER BY A_Point DESC";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;  
  }
  $sql2 = "SELECT A_User,A_Name,A_Section,A_Point FROM (SELECT *,row_number() over (PARTITION by `A_Section` ORDER BY `A_Point` DESC) n FROM account) q WHERE n <= 1 AND A_Role = 'member' AND A_Section BETWEEN 1 AND 10";
  $result2 = mysqli_query($conn,$sql2);
  while($row2 = mysqli_fetch_assoc($result2)){
    $data2[] = $row2;  
  }
  $sql3 = "SELECT A_User,A_Name,A_Section,A_Point FROM (SELECT *,row_number() over (PARTITION by `A_Section` ORDER BY `A_Point` DESC) n FROM account) q WHERE n <= 1 AND A_Role = 'member' AND A_Section BETWEEN 11 AND 20";
  $result3 = mysqli_query($conn,$sql3);
  while($row3 = mysqli_fetch_assoc($result3)){
    $data3[] = $row3;  
  }
  // echo '<pre>'; 
  // print_r($data2);
  // echo '</pre>';
  ?>
  <div class="wrapper">
    <div class="main-container">
      <div class="card">
        <div>
          <section>
            <h5>RANKING</h5>
            <table class="content-table">
              <thead>
                <tr>
                  <th width="40%">รหัสนักศึกษา</th>
                  <th width="10%">SECTION</th>
                  <th width="10%">คะแนน</th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = '';
                $max = 0;
                $index = 0;
                foreach($data as $row){
                    if($max==0){
                      $max = $row['A_Point'];
                    }
                    if($row['A_Point'] <= $max){
                      $index++;
                    }
                    if($index >=1){
                      $no = "<img src='css/images/n1.png' width='20' height='20'>";
                    }
                    if($index >=2){
                      $no = "<img src='css/images/n2.png' width='20' height='20'>";
                    }
                    if($index >=3){
                      $no = "<img src='css/images/n3.png' width='20' height='20'>";
                    }   
                    if($index >=4){
                      $no = "<img src='css/images/n4.png' width='20' height='20'>";
                    }
                    if($index >=5){
                      $no = "<img src='css/images/n5.png' width='20' height='20'>";
                    }
                    if($index >=6){
                      $no = "<img src='css/images/n6.png' width='20' height='20'>";
                    }
                    if($index >=7){
                      $no = "<img src='css/images/n7.png' width='20' height='20'>";
                    }
                    if($index >=8){
                      $no = "<img src='css/images/n8.png' width='20' height='20'>";
                    }
                    if($index >=9){
                      $no = "<img src='css/images/n9.png' width='20' height='20'>";
                    }
                    if($index >=10){
                      $no = "<img src='css/images/n10.png' width='20' height='20'>";
                    }      
                ?>
                <tr>
                  <td><?php echo $row['A_User'];?></td>
                  <td><?php echo $row['A_Section'];?></td>
                  <td><?php echo $row['A_Point'];?></td>
                  <td><?php echo $no;?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </section>
          <div class="block-1">
            <h5>TOP SECTION</h5>
          <aside>
          <table class="content-table">
              <thead>
                <tr>
                  <th width="40%">รหัสนักศึกษา</th>
                  <th width="10%">SECTION</th>
                  <th width="10%">คะแนน</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach($data2 as $row){      
                ?>
                <tr>
                  <td><?php echo $row['A_User'];?></td>
                  <td><?php echo $row['A_Section'];?></td>
                  <td><?php echo $row['A_Point'];?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </aside>
          <abbr>
          <table class="content-table">
              <thead>
                <tr>
                  <th width="40%">รหัสนักศึกษา</th>
                  <th width="10%">SECTION</th>
                  <th width="10%">คะแนน</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach($data3 as $row){      
                ?>
                <tr>
                  <td><?php echo $row['A_User'];?></td>
                  <td><?php echo $row['A_Section'];?></td>
                  <td><?php echo $row['A_Point'];?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </abbr>
          </div>
          <div class="clearfix"></div>
          <footer>
            <div class="chart-container">
              <canvas id="graphCanvas"></canvas>
            </div>
          </footer>
          
		
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
    integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function () {
      showGraph();
    });

    function showGraph() {
      $.post('datachart.php', function (data) {
        console.log(data);
        let num = [];
        let Section = [];

        for (let i in data) {
          Section.push('SEC '+data[i].title);
          num.push(data[i].num);
        }
        let chartdata = {
          labels: Section,
          datasets: [{
            label: "จำนวน",
            backgroundColor: [
              'Red',
              'Orange',
              'Yellow',
              'Green',
              'Blue',
              'purple',
              'brown',
              'silver',
              'pink',
              'rgba(245, 102, 179)',
              'rgba(75, 12, 19)',
              'rgba(54, 16, 235)',
              'rgba(153, 102, 5)',
              'rgba(201, 203, 207)',
              'rgba(255, 99, 13)',
              'rgba(255, 19, 64)',
              'rgba(255, 205, 86)',
              'rgba(75, 92, 19)',
              'rgba(5, 162, 235)',
              'rgba(53, 102, 25)'
            ],
            borderColor: [
              'Red',
              'Orange',
              'Yellow',
              'Green',
              'Blue',
              'purple',
              'brown',
              'silver',
              'pink',
              'rgba(245, 102, 179)',
              'rgba(75, 12, 19)',
              'rgba(54, 16, 235)',
              'rgba(153, 102, 5)',
              'rgba(201, 203, 207)',
              'rgba(255, 99, 13)',
              'rgba(255, 19, 64)',
              'rgba(255, 205, 86)',
              'rgba(75, 92, 19)',
              'rgba(5, 162, 235)',
              'rgba(53, 102, 25)'
            ],
            hoverBackgroundColor: '#CCCCCC',
            hoverBorderColor: '#666666',
            data: num
          }]
        };
        Chart.defaults.font.size = 14;
        let graphTarget = $('#graphCanvas');  
        let barGraph = new Chart(graphTarget,{
          type: 'bar',
          data: chartdata,
          options: {
            maintainAspectRatio : false,
            responsive: true,
            plugins: {
              legend: {
                labels: {
                  font: {
                        size: 18,                        
                    },
                    color: 'rgb(255, 255, 255)'
                }
              },
              title: {
                display: true,
                color : '#0080FE',
                text: 'STUDENTS SECTION',
                font: {
                    family: 'th sarabun new',
                    size: 32,
                    style: 'bold',
                    lineHeight: 1.2                       
                    },
                padding: {
                    top: 10,
                    bottom: 10
                }
              }
            },
            scales: {
              x: {
                grid:{
                  display:false
                },
        display: true,
        title: {
          display: true,
          text: 'SECTION',
          color: '#0080FE',
          font: {
            family: 'th sarabun new',
            size: 20,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 10, left: 0, right: 0, bottom: 0}
        }
      },
              y: {
                beginAtZero:true,
                grid:{
                  display:false
                },
                min: 0,
                max: 20,
                display: true,
                title: {
                  display: true,
                  text: 'NUMBER OF PEOPLE',
                  color: '#0080FE',
                  font: {
                    family: 'th sarabun new',
                    size: 16,
                    weight: 'bold',
                    lineHeight: 1.2,
                  },
                  padding: {top: 10, left: 0, right: 0, bottom: 0}
                }
              }
            }
          },
        });
      })
    }
  </script>
</body>

</html>