<html>
<head>
    <title>chess</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div align = "center">
</head>
<body>
<a href="http://chess.local/primer.php">na glavnu</a>
<?php
print_r($_GET);
$lb='img/ladyablack.png'; $pu='img/pustaya.png'; $fw='img/ferzwhite.png';

if (empty($_GET)) {
      $_GET['x']=1; $_GET['y']=1; $_GET['figureSelected']=1 ;
}

$x=$_GET['x'];
$y=$_GET['y'];
$tumblerLink=0;


    if ($_GET['figureSelected'] == 1) {
        $figureSelected = 0;
    } elseif ($_GET['figureSelected'] == 0) {
        $figureSelected = 1;
    }



if ($figureSelected==1) $tumblerLink=1;
if (!($x==1 && $y==1)) $tumblerLink=0;


echo "figureSelected= $figureSelected<br>
      tumblerLink=    $tumblerLink<br>
         x= $x  <br>
         y= $y  <br>
                           <br>";
?>

<table id="table1" border="1">
    <tr>
      <td>
       <?php if ($figureSelected==1||$x.$y==11) : ?>
         <a href="primer.php?figureSelected=<?php echo $figureSelected?>&x=1&y=1">
          <div <?php if($x.$y==11 && $figureSelected==1) echo 'class="ramkavokrugfiguri"'?>>
           <img src=<?php if ($x==1 && $y==1) echo $lb; else echo $pu ?>>
          </div>
         </a>
       <?php endif;?>
      </td>

      <td class="grey">
       <?php if ($figureSelected==1||$x.$y==21) : ?>
         <a href="primer.php?figureSelected=<?php echo $figureSelected?>&x=2&y=1">
          <div <?php if($x.$y==21 && $figureSelected==1) echo 'class="ramkavokrugfiguri"'?>>
           <img src=<?php if ($x==2 && $y==1) echo $lb; else echo $pu ?>>
          </div>
         </a>
       <?php endif;?>
      </td>
    </tr>

    <tr>
      <td class="grey">
       <?php if ($figureSelected==1||$x.$y==12) : ?>
        <a href="primer.php?figureSelected=<?php echo $figureSelected?>&x=1&y=2">
         <div <?php if($x.$y==12 && $figureSelected==1) echo 'class="ramkavokrugfiguri"'?>>
          <img src=<?php if ($x==1 && $y==2) echo $lb; else echo $pu ?>>
         </div>
        </a>
       <?php endif;?>
      </td>

    <td>
      <?php if ($figureSelected==1||$x.$y==22) : ?>
       <a href="primer.php?figureSelected=<?php echo $figureSelected?>&x=2&y=2">
        <div <?php if($x.$y==22 && $figureSelected==1) echo 'class="ramkavokrugfiguri"'?>>
          <img src=<?php if ($x==2 && $y==2) echo $lb; else echo $pu;  ?>>
        </div>
       </a>
      <?php endif;?>
        <img src= <?php if ($figureSelected==1) echo $fw  ?>>
    </td>

  </tr>
</table>

</body>
</html>

ячейка таблицы имеет в себе   ссылку. эта ссылка в зависимостиот условия ($figureSelected==1||$x.$y==22)  или активна(т.е. отображается) или никак не отображается
(с условием  картинки-фигуры или картинки-пустой клетки), также имеется условие для контейнера рамка вокруг фигуры.
