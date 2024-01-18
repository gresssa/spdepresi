<?php
date_default_timezone_set('Asia/Jakarta');
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sistem_pakar_depresi");

if ($conn -> connect_errno){
	echo "Failed to connect to MySQL:" . $conn -> connect_error;
	exit();
}
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
};
?>
