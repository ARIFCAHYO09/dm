<?php
require 'vendor/autoload.php';

use Phpml\Classification\NaiveBayes;

// $samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5]];
// $labels = ['a', 'b', 'c'];

// $classifier = new NaiveBayes();
// $classifier->train($samples, $labels);
// echo $classifier->predict([1, 5, 1]);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table, th, td {
  			border: 1px solid black;
		}
	</style>
</head>
<body>
<?php include "config.php"; ?>
<a href="mining.php">mining</a>
<table>
	<tr>
		<th>no</th>
		<th>waktu posting</th>
		<th>kehangatan berita</th>
		<th>yoast seo</th>
		<th>jumlah kata</th>
		<th>kategori</th>
		<th>jumlah label</th>
		<th>jumlah viewer 6 jam pertama</th>
		<th>klasifikasi jumlah viewer</th>
	</tr>
	<?php
	$sql = "SELECT * FROM mytable";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) {
        echo "<tr>".
        "<td>".$row["No"]."</td>".
        "<td>".$row["Waktu_Posting"]."</td>".
        "<td>".$row["Kehangatan_Berita"]."</td>".
        "<td>".$row["Yoast_SEO"]."</td>".
        "<td>".$row["Jumlah_kata"]."</td>".
        "<td>".$row["Kategori"]."</td>".
        "<td>".$row["Jumlah_Label"]."</td>".
        "<td>".$row["Jumlah_Viewer_6_jam_pertama"]."</td>".
        "<td>".$row["Klasifikasi_Jumlah_Viewer"]."</td>"
        ."<tr>";
    }
	?>
</table>
</body>
</html>
<br>
