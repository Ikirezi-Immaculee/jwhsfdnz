<?php
$connect = new mysqli("localhost", 'root', '', 'store_db');
if (!$connect) {
    echo "not connected";
}
