<?php
class CommandCommand implements Command {
  public function execute(Context $context) {
    $current_command = $context->getCurrentCommand();
    if ($current_command === 'diskspace') {
      $path = './';
      $free_size = disk_free_space('./');
      $max_size = disk_total_space('./');
      $ratio = $free_size / $max_size * 100;
      echo sprintf('Disk Free : %5.1dMB (%3d%%)<br>', $free_size / 1024 / 1024, $ratio);
    } else if ($current_command === 'date') {
      echo date('Y/m/d H:i:s') . '<br>';
    } else if ($current_command === 'line') {
      echo '----------------------------<br>';
    } else {
      throw new RuntimeException('invalid command [' . $current_command . ']');
    }
  }
}