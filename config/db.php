<?php
$database = new mysqli("localhost", "root", "", "my_ecommerce");
if($database->connect_errno) {
    die("We have a database problem");
}