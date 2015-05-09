<html>
<head>
    <title>chess</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div align=center>
</head>
<body>
<a href="index.php">nag lavnuju</a>
<?php
print_r($_GET);
$lb='img/ladyablack.png'; $pu='img/pustaya.png'; $fw='img/ferzwhite.png';
//$x = !empty($_GET['x']) ? $_GET['x'] : 1;
//$y = !empty($_GET['y']) ? $_GET['y'] : 1;
if (empty($_GET)) {
    $_GET['x'] = 1; $_GET['y'] = 1; $_GET['figureSelected'] = 1;
}
$x=$_GET['x'];
$y=$_GET['y'];

    if ($_GET['figureSelected'] == 1) {
        $figureSelected = 0;
    } elseif ($_GET['figureSelected'] == 0) {
        $figureSelected = 1;
    }

echo "figureSelected= $figureSelected<br>
                                     <br>";
?>
<table id="table1" border="1">
  <?php for ($j = 1; $j <= 8; $j++) : ?>
    <tr>
      <?php for ($i = 1; $i <= 8; $i++) : ?>
        <td <?php if (($j%2!=0 && $i%2==0) || ($j%2==0 && $i%2!=0)) echo 'class="grey"' ?>>
          <?php if ($figureSelected==1||$x.$y==$i.$j) : ?>
           <a href="index.php?figureSelected=<?php echo $figureSelected?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
            <div <?php if($x.$y==$i.$j && $figureSelected==1)  echo 'class="ramkavokrugfiguri"'?>> <img src=<?php if ($i==$x && $j==$y) echo $lb; else echo $pu ?> >  </div>
           </a>
          <?php endif;?>
        </td>
      <?php endfor;?>
    </tr>
  <?php endfor;?>
</table>
</body>
</html>