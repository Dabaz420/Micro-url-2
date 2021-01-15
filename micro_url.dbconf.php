<?php

  const DB_HOST    = "localhost";
  const DB_NAME    = "micro-url";
  const DB_LOGIN   = "root";
  const DB_PASS    = "damien";

  const DB_DRIVER  = "mysql";
  const DB_CHARSET = "utf8mb4";

  const DB_OPTIONS = [
    PDO::ATTR_EMULATE_PREPARES   => false, 
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::MYSQL_ATTR_FOUND_ROWS   => true 
  ];
  
?>