<?
	if(isset($_GET[temp]) && $temp == 'edit'){
		$del=$_GET[del];
		$ary=array();
		$ary2=array();
		
		$fname="photo.txt";
		$f=fopen($fname,"r+");
		if($f!=NULL){
			while(!feof($f)){
				$ary[]=fgets($f);
			}
		fclose($f);
		}
		
		for($i=0;$i<count($ary);$i++){
			if($i!=$del){
				$ary2[]=$ary[$i];
			}else{
				unlink("image/".trim($ary[$i]));
				unlink("simage/s".trim($ary[$i]));
			}
		}
		
		$f=fopen($fname,"w");	
		for($j=0;$j<count($ary2);$j++){
			fwrite($f,$ary2[$j]);
		}
		fclose($f);
		
		echo "<script>alert('已刪除')</script>";
		echo "<script>location.replace('page2.php')</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NO.2-JavaScript</title>
<link href="layout.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="BOX">
<h1>Picture Show - NO.4</h1>
<ul>
  <li id="AA"><a href="page1.php">UpLoad Picture</a></li>
  <li id="BB"><a href="page2.php">Picture Edit</a></li>
  <li id="CC"><a href="Slideshow.html">SlideShow</a></li>
  <li id="DD"><a href="index.html">Index</a></li>
</ul>
</div>
<div id="main">
<?
$fname="photo.txt";
if(file_exists($fname)){
	$f=fopen($fname,"r+");
	$ary=array();
	if($f!=NULL){
		while(!feof($f)){
			$ary[]=fgets($f);
		}
	}
	fclose($f);
}
?>
<form id="form2" name="form2" method="post" action="">
    <table width="600">
        <tr>
            <td align="center"><strong>相片</strong></td>
            <td align="center"><strong>編輯</strong></td>
            <td align="center"><strong>相片</strong></td>
            <td align="center"><strong>編輯</strong></td>
            <td align="center"><strong>相片</strong></td>
            <td align="center"><strong>編輯</strong></td>
        </tr>
        <?   
            for($j=0;$j<count($ary);$j+=3){
                echo "<tr>";
                $r=$j;
                while($ary[$r]!="" && $r<$j+3){
        ?>
                <td align="center"><img src="simage/s<?=$ary[$r]?>"></td>
                <td align="center"><input type="button" value="刪除" onClick="confirm('是否刪除?')?location.replace('?temp=edit&del=<?=$r?>'):retrun"></td>
        <?
                    $r++;
                }
                echo "</tr>";
            }
        ?>
    </table>
</form>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<script src="flycan-menu.js"></script>

</html>