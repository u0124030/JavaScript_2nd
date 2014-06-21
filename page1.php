<?
	$filename="photo.txt";

	if(isset($_GET[temp]) && $temp == 'add'){
		for($i=0; $i<count($nme); $i++){
			$pho = $_FILES[nme][name][$i];
			if($pho!=""){
				$check =strrchr($pho,".");
				if($check == ".jpg" || $check == ".jpeg" || $check == ".png"){
					$pho = "Img".date("Ymdhis").$i.$check;
					
					move_uploaded_file($_FILES[nme][tmp_name][$i],"image/".$pho);
					$file=fopen($filename,"a+");
					fwrite($file,$pho."\r\n");
										
					switch($check){
						case ".jpg":
							$img = imagecreatefromjpeg("image/".$pho);
							break;
						case ".jpeg":
							$img = imagecreatefromjpeg("image/".$pho);
							break;
						case ".png":
							$img = imagecreatefrompng("image/".$pho);
							break;
					}
					
					list($img_w,$img_h)=getimagesize("image/".$pho);
					$t = min($img_w,$img_h);
					$newimg = imagecreatetruecolor(80,80);
					imagecopyresized($newimg,$img,0,0,0,0,80,80,$t,$t);
					
					switch($check){
						case ".jpg":
							imagejpeg($newimg,"simage/s".$pho);
							break;
						case ".jpeg":
							imagejpeg($newimg,"simage/s".$pho);
							break;
						case ".png":
							imagepng($newimg,"simage/s".$pho);
							break;
					}
					
					imagedestroy;						
				}else{
					echo "<script>alert('非圖片檔案格式')</script>";
					echo "<script>history.back()</script>";
				}
			}
		}
		fclose;
		
		echo "<script>alert('新增成功')</script>";
		echo "<script>location.replace('page1.php')</script>";
		
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
<form action="?temp=add" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="400">
            <tr>
              <td><strong>相片新增</strong></td>
            </tr>
        </table>
        <div id="more">
        	<table width="400">
                <tr>
                    <td>相片上傳：</td>
                    <td><input type="file" name="nme[]"></td>
                </tr>
            </table>
        </div>
        <table width="400">
            <tr>
              <td>
              	<input type="button" name="button4" id="button4" value="新增欄位" onClick="increase()">
                <input type="submit" name="button3" id="button3" value="送出">
              </td>
            </tr>
        </table>
    </form>
</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<script src="flycan-menu.js"></script>
<script>
function increase(){
	more.innerHTML=more.innerHTML+'<table width="400"><tr><td>相片上傳：</td><td><input type="file" name="nme[]"></td></tr></table>';
}
</script>

</html>