<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
?>
<?php 
// indizierte Arrays
$post = ['Post 1', 'Post2', 'Post 3'];
$cities = array(
  'Leipzig',
  'Nordhausen',
  'Erfurt'
);

// assoziative Arrays
$maincities = array(
  'Schweiz' => 'Bern',
  'Frankreich' => 'Paris',
  'Deutschland' => 'Berlin'
);

// mehrdimisionale Arrays
$post2 = array(
  array(
    'title' => 'Erster Bietrag',
    'author' => 'Alex',
    'content' => 'Willkommen im Blog'
  ),

  array(
    'title' => 'Erster Bietrag',
    'author' => 'Sam',
    'content' => 'Heute lernen wir Arrays'
  )
);

// Arrays für tabellarische Ausgaben

$leander = array(
  'Spanien' => array(
    'Hauptstadt' => 'Madrid',
    'Sprache' => 'spanisch',
    'Waehrung' => 'Euro'
  
  ),
 
)

?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Arrays Beispiel</title>
  <link rel="stylesheet" href="../../style/style.css">
</head>
<body>
  <header><h1>Beiträge aus Arrays</h1></header>
  <main class="container">
    <?php foreach ($post as $post): ?>
      <p><?= $post; ?></p>
    <?php endforeach; ?>

    <p>Zweite Stadt im Array der Städte: <?= $cities[1]; ?></p>

<?php $country = 'Deutschland'; ?>

    <p>Die Hautstadt von <?= $country; ?> ist <?= $maincities[$country]; ?>.</p>

<?php foreach ($maincities as $country => $city): ?>
    <p><?= $country ?>: <?= $city ?> </p>
<?php endforeach; ?>

<h2>Unsere aktuellen Beiträge</h2>

<?php foreach ($post2 as $beitrag): ?>
  <article class="post">
    <h3><?= htmlspecialchars($beitrag['title']); ?></h3>
    <p class="meta">von <?= htmlspecialchars($beitrag['author']); ?></p>
    <p><?= nl2br(htmlspecialchars($beitrag['content'])); ?></p>
  </article>
  <?php endforeach ?>

  <h2>Informationen zu Ländern </h2>

  <table>
    <tr>Land</tr>
    <th>Hauptstadt</th>
    <th>Sprache</th>
    <th>Währung</th>
    <th>Fläche</th>
</tr>
<?php foreach ($leander as $country => $info): ?>
  // äußere Schleife für die Zeilen und das Land
    <tr>
      <td><?= $land; ?></td>
    // innere Schleife für die Info-Zeilen
      <?php foreach ($infos as $info): ?>
        <td><?= $info; ?></td>
      <?php endforeach; ?>
      </tr>
  <?php endforeach; ?>
  </table>
  </main>
</body>
</html>
