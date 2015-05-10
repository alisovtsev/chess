<?php
session_start();
$figuresDefault = array(
    1 => array(
        'img' => 'img/ladyablack.png',
        'x' => 1,
        'y' => 1,
    ),
    2 => array(
        'img' => 'img/ferzwhite.png',
        'x' => 3,
        'y' => 1,
    )
);
if (empty($_SESSION['figureSelectedId'])) {
    $_SESSION['figureSelectedId'] = false;
}
$pu='img/pustaya.png';

$action = !empty($_GET['action']) ? $_GET['action'] : false;
$figureSelectedId = !empty($_GET['figureSelectedId']) ? $_GET['figureSelectedId'] : $_SESSION['figureSelectedId'];
$clickX = !empty($_GET['x']) ? $_GET['x'] : 1;
$clickY = !empty($_GET['y']) ? $_GET['y'] : 1;
$figures = !empty($_SESSION['figures']) ? $_SESSION['figures'] : $figuresDefault;

if ($figureSelectedId) {
    if ($action == 'move') {
        $figures[$figureSelectedId]['x'] = $clickX;
        $figures[$figureSelectedId]['y'] = $clickY;
        $_SESSION['figures'] = $figures;
        header("Location: /");
        exit;
    }
    if ($action == 'select') {
        $_SESSION['figureSelectedId'] = $figureSelectedId;
        header("Location: /");
        exit;
    }
}
?>

<html>
<head>
    <title>chess</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div align=center>
</head>
<body>

<table id="table1" border="1">
  <?php for ($j = 1; $j <= 8; $j++) : ?>
    <tr>
      <?php for ($i = 1; $i <= 8; $i++) : ?>
        <td <?php if (($j%2!=0 && $i%2==0) || ($j%2==0 && $i%2!=0)) echo 'class="grey"' ?>>
          <?php
          $tdFigureExists = false;
          foreach ($figures as $figureId => $figureData) {
              if ($figureData['x'] == $i && $figureData['y'] == $j) {
                  ?>
                  <a href="index.php?action=select&figureSelectedId=<?php echo $figureId?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
                      <div <?php if($figureSelectedId == $figureId)  echo 'class="ramkavokrugfiguri"'?>><img src=<?php echo $figureData['img']?>></div>
                  </a>
                  <?php $tdFigureExists = true;
              }
          }
          //если выделена фигура и находимся на клетке на которой нет другой фигуры, то делаем ссылку для перемещения нашей фигуры
          if (!$tdFigureExists && $figureSelectedId) :?>
              <a href="index.php?action=move&figureSelectedId=<?php echo $figureSelectedId?>&x=<?php echo $i ?>&y=<?php echo $j ?>">
                  <div><img class="pu" src=<?php echo $pu?>></div>
              </a>
          <?php endif;?>
        </td>
      <?php endfor;?>
    </tr>
  <?php endfor;?>
</table>
</body>
</html>