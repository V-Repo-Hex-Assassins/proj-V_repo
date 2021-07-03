<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=frepo',
   'vit', 'repo');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
