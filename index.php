<?php
session_start();//говорим серверу, что мы планируем использовать механизм сессий
require_once 'functions.php';//подключаем наши функции
$figuresDefault = getFigureDefaults();


if ($figureSelectedId) {//если у нас выбрана какая-то фигура
    if ($action == 'move') {//если действие перемещение(move), то задаем фигуре новые координаты
        $figures[$figureSelectedId]['x'] = $clickX;//сохраняем координату x=$clickX для фигуры с id=$figureSelectedId
        $figures[$figureSelectedId]['y'] = $clickY;
        $_SESSION['figures'] = $figures;//сохраняем данные в сессии
        header("Location: /");//перенаправляем нас на дефолтную страницу для сброса параметров и извлечения новых значений из сессии
        exit;//выходим из текущего скрипта
    }
    if ($action == 'select') {//если действие выбор(select), то задаем id выбранной фигуры
        $_SESSION['figureSelectedId'] = $figureSelectedId;//сохраняем данные в сессии
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
                  <div><img class="pu" src='img/pustaya.png'></div>
              </a>
          <?php endif;?>
        </td>
      <?php endfor;?>
    </tr>
  <?php endfor;?>
</table>
</body>
</html>