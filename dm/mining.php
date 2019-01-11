<?php
require 'vendor/autoload.php';
use Phpml\Classification\NaiveBayes;
// $samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5]];
// echo "<pre>";
// print_r($samples);
// $labels = ['a', 'b', 'c'];

// $classifier = new NaiveBayes();
// $classifier->train($samples, $labels);
// echo $classifier->predict([1, 5, 1]);
$time_start = microtime(true); 
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
	<center>
		<h1>
			Klasifikasi Naive Bayes
		</h1>
	</center>
<?php include "config.php"; ?>
<a href="index.php">kembali</a>
<a href="mining2.php">mining 2</a>

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
		<th>prediksi klasifikasi jumlah viewer</th>
	</tr>
	<?php
	$sql = "SELECT * FROM mytable";
	
	$result = $conn->query($sql);

	$results = $conn->query($sql);
	$tes=0;
	while($row = $result->fetch_assoc()) {
		$samples[$tes][0]=$row["Waktu_Posting"];
		$samples[$tes][1]=$row["Kehangatan_Berita"];
		$samples[$tes][2]=$row["Yoast_SEO"];
		$samples[$tes][3]=$row["Jumlah_kata"];
		$samples[$tes][4]=$row["Kategori"];
		$samples[$tes][5]=$row["Jumlah_Label"];
		$samples[$tes][6]=$row["Jumlah_Viewer_6_jam_pertama"];
		$labels[$tes] = $row["Klasifikasi_Jumlah_Viewer"];
		$tes=$tes+1;
	}
	$classifier = new NaiveBayes();
	$classifier->train($samples, $labels);
	$akurasi=0;
	while($rows = $results->fetch_assoc()) {
        echo "<tr>".
        "<td>".$rows["No"]."</td>".
        "<td>".$rows["Waktu_Posting"]."</td>".
        "<td>".$rows["Kehangatan_Berita"]."</td>".
        "<td>".$rows["Yoast_SEO"]."</td>".
        "<td>".$rows["Jumlah_kata"]."</td>".
        "<td>".$rows["Kategori"]."</td>".
        "<td>".$rows["Jumlah_Label"]."</td>".
        "<td>".$rows["Jumlah_Viewer_6_jam_pertama"]."</td>".
        "<td>".$rows["Klasifikasi_Jumlah_Viewer"]."</td>";
        
        
        if($rows["Klasifikasi_Jumlah_Viewer"]==$classifier->predict([$rows["Waktu_Posting"], $rows["Kehangatan_Berita"], $rows["Yoast_SEO"],$rows["Jumlah_kata"],$rows["Kategori"],$rows["Jumlah_Label"],$rows["Jumlah_Viewer_6_jam_pertama"]])) {
        	$akurasi=$akurasi+1;
        	echo "<td>".$classifier->predict([$rows["Waktu_Posting"], $rows["Kehangatan_Berita"], $rows["Yoast_SEO"],$rows["Jumlah_kata"],$rows["Kategori"],$rows["Jumlah_Label"],$rows["Jumlah_Viewer_6_jam_pertama"]])."</td>";
        } else {
        	echo "<td style= 'color:red'>".$classifier->predict([$rows["Waktu_Posting"], $rows["Kehangatan_Berita"], $rows["Yoast_SEO"],$rows["Jumlah_kata"],$rows["Kategori"],$rows["Jumlah_Label"],$rows["Jumlah_Viewer_6_jam_pertama"]])."</td>";
        }
        echo "<tr>";
    }
	?>
</table>

    <?php
    echo "jumlah prediksi yang benar : ".$akurasi."<br>"; 
    echo (($akurasi/415)*100)."%"."<br>".
    'Total waktu dalam detik: ' . (microtime(true) - $time_start)."<br>";
    echo memory_get_peak_usage(false). "byte";
    ?>
</body>
</html>
<br>
