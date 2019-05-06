<?php
require_once 'Context.php';
require_once 'Command.php';
require_once 'CommandCommand.php';
require_once 'CommandListCommand.php';
require_once 'JobCommand.php';

function execute($command) {
  $job = new JobCommand();
  try {
    $job->execute(new Context($command));
  } catch (Exception $e) {
    echo htmlspecialchars($e->getMessage(), ENT_QUOTES, mb_internal_encoding());
  }
  echo '<hr>';
}

$command = (isset($_POST['command'])? $_POST['command'] : '');
if ($command !== '') {
  execute($command);
}
?>
<form action="" method="post">
input command:<input type="text" name="command" size="80" value="begin date line diskspace end">
<input type="submit">
</form>