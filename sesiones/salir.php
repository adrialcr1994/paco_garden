<?php
session_start();
unset($_SESSION['usuarioactual']);
session_destroy();
?>
<script>window.location.href='../index.php'</script>;
