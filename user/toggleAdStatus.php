<?php require 'partials/hd.php'; 

// var_dump($_GET);
$item_id = (int) $_GET['item_id'];


$sql_1 = "SELECT status FROM ad_table WHERE id=?";
$stmt_1 = mysqli_prepare($connection, $sql_1);
mysqli_stmt_bind_param($stmt_1, 's', $item_id);
mysqli_stmt_execute($stmt_1);  
$rs_1 = mysqli_stmt_get_result($stmt_1);
$n_row = mysqli_num_rows($rs_1);  

if ($n_row>0) {
    $row = mysqli_fetch_assoc($rs_1);
    $old_status = $row['status'];

    if ($old_status=='inactive') {
        $new_status='active';
    } else {
        $new_status='inactive';
    }

    // update the ad table
    $sql = "UPDATE ad_table SET status=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $new_status,$item_id);
    mysqli_stmt_execute($stmt);
    $row = mysqli_stmt_affected_rows($stmt);

        if ($row>0) {
            echo json_encode([
                'status'    => 'success',
                'ad_status' => $new_status,
                'comment'   => 'Ad status updated successfully'
            ]);
        } else if ($row==0) {
            echo json_encode([
                'status'    => 'failed',
                'ad_status' => $old_status,
                'comment'   => 'Ad status was not updated'
            ]);
        }
 } else {
    echo json_encode([
        'status'    => 'failed',
        'ad_status' => $new_status,
        'comment'   => 'Ad not found!'
    ]);
 }