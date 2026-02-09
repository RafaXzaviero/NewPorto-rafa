<?php
exec('composer install --no-dev --optimize-autoloader 2>&1', $output);
echo "<pre>";
print_r($output);
echo "</pre>";
?>