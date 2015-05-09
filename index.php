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
$pu='img/pustaya.png';

    $figureSelectedId = !empty($_GET['figureSelectedId']) ? $_GET['figureSelectedId'] : false;
    $clickX = !empty($_GET['x']) ? $_GET['x'] : 1;
    $clickY = !empty($_GET['y']) ? $_GET['y'] : 1;
    $action = !empty($_GET['action']) ? $_GET['action'] : false;
$figures = array(
    array(
        'id' => 1,
        'img' => 'img/ladyablack.png',
        'x' => 1,
        'y' => 1,
    ),
    array(
        'id' => 2,
        'img' => 'img/ferzwhite.png',
        'x' => 3,
        'y' => 1,
    )
);

echo "figureSelected= $figureSelectedId<br>
                                     <br>";
?>
<table id="table1" border="1" cellpadding="0" cellspacing="0">
  <?php for ($j = 1; $j <= 8; $j++) : ?>
    <tr>
      <?php for ($i = 1; $i <= 8; $i++) : ?>
        <td <?php if (($j%2!=0 && $i%2==0) || ($j%2==0 && $i%2!=0)) echo 'class="grey"' ?>>
          <?php
          $tdFigureExists = false;
          foreach ($figures as $figure) {
              if (($action != 'move' || $figureSelectedId != $figure['id']) && $figure['x'] == $i && $figure['y'] == $j) {
                  ?>
                  <a href="index.php?action=select&figureSelectedId=<?php echo $figure['id']?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
                      <div <?php if($clickX == $i && $clickY == $j && $action == 'select')  echo 'class="ramkavokrugfiguri"'?>><img src=<?php echo $figure['img']?>></div>
                  </a>
                  <?php $tdFigureExists = true;
              } elseif ($action == 'move' && $clickX == $i && $clickY == $j && $figure['id'] == $figureSelectedId) {
                  ?>
                  <a href="index.php?action=select&figureSelectedId=<?php echo $figure['id']?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
                      <div <?php echo 'class="ramkavokrugfiguri"'?>><img src=<?php echo $figure['img']?>></div>
                  </a>
                <?php $tdFigureExists = true;
              }
          }
          //если выделена фигура и находимся на клетке на которой нет другой фигуры, то делаем ссылку для перемещения нашей фигуры
          if (!$tdFigureExists && $figureSelectedId) :?>
              <a href="index.php?action=move&figureSelectedId=<?php echo $figureSelectedId?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
                  <div><img src=<?php echo $pu?>></div>
              </a>
          <?php endif;?>
        </td>
      <?php endfor;?>
    </tr>
  <?php endfor;?>
</table>
</body>
</html>