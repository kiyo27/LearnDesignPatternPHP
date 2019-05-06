<?php
require_once 'ReaderFactory.php';
?>
<html land='ja'>
<head>
  <title>作曲家と作品たち</title>
</head>
<body>
<?php
  $filename = 'music.csv';

  $factory = new ReaderFactory();
  $data = $factory->create($filename);
  $data->read();
  $data->display();
?>
</body>
</html>
