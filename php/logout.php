<?php
session_start();
session_destroy();
echo "<script>alert('ออกจากระบบ สำเร็จ!'); window.location.href='../index.php';</script>";
?>