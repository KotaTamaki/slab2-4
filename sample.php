<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="sample.css">
  <script src="js/sample.js"></script>
</head>
<body>

<section class="container">
<div class="head">
  Iperf実験
    </div>
   
    <table width="10">
    <form name="form1" action="sample.php" method="post">
    <input class='need' type="text" name="txtA" size="15" placeholder="IP" ><br />
    <input class='need' type="text" name="txtB" size="3" placeholder="回数" ><br />
    <input class='need' type="text" name="txtC" size="10" placeholder="ファイル名" ><br /> 
    <input type="text" name="txtD" size="10" placeholder="オプション(-p,-t,-n...etc)" ><br /> 
    <input type="text" name="txtE" size="10" placeholder="ポート指定" ><br /> 
    
    
    <button type="submit" name="exec">実行</button><br /> 
    <button type="submit" name="reset" type="reset">リセット</button>
    </form>
    <h2>結果</h2>
    <textarea class='textarea1' id="textarea">
    <?php
      if (isset($_POST['exec'])) {
        shell_exec('./rep2-4.sh "'.$_POST['txtA'].'" "'.$_POST['txtB'].'" "'.$_POST['txtC'].'" "'.$_POST['txtD'].'" "'.$_POST['txtE'].'"');
        $filename = $_POST['txtC'];
        
        echo file_get_contents($filename);
        $average=0;
        $file = fopen("{$_POST["txtC"]}", "r");          
        for ($count1 = 0; $count1 < "{$_POST["txtB"]}"; $count1++){
          for ($count2 = 0; $count2 < 9; $count2++){
            // 実行する処理
            fgets($file);
            }  
            $word= fgets($file);
            $average+=(float)mb_substr($word,35,-10);
          }            
        /* ファイルポインタをクローズ */
        fclose($file);
          
        
      }  
    ?>
  	</textarea>
    <h3>平均値</h3>
    <textarea class='textarea2' id="textarea">
    <?php
    if (isset($_POST['exec'])) {
    echo $average/$_POST["txtB"];};
    echo "Mbits/sec";
    ?>
    </textarea>
    </section>


</table>
</body>
</html>