<?php 
    header('Content-Type: application/json');

    require_once 'server.php';

    $sqlQuery = "SELECT
    1 AS section,
    A_Section AS title,
    COUNT(A_ID) AS num
    FROM account WHERE A_Role = 'member'
    GROUP BY A_Section";
    $result = mysqli_query($conn, $sqlQuery);
    // $sqlQuery = "SELECT A_USER,A_Name,A_Section,A_Point FROM (SELECT *,row_number() over (PARTITION by `A_Section` ORDER BY `A_Point` DESC) n FROM account) q WHERE n <= 1 AND A_Role = 'member'";
    // $result = mysqli_query($conn, $sqlQuery);
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);
    echo json_encode($data);

?>