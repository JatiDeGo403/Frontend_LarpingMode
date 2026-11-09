<?php

class Database {
// Informasi koneksi database
private $host = "localhost";
private $port = "5432";
// GANTI dengan settingan lokal Anda
private $db_name = "company_db";
private $username = "postgres";
private $password = "password123";
public $conn;


public function getConnection() {
$this->conn = null;
try {
// Membuat koneksi PDO ke PostgreSQL
$dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
$this->conn = new PDO($dsn, $this->username, $this->password);
// Set error mode ke exception untuk handling error yang lebih baik
$this->conn->setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
// echo "Koneksi database berhasil!";
} catch (PDOException $exception) {
echo "Error koneksi database: " . $exception->getMessage();
}
return $this->conn;
}
}
?>