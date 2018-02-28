<?php
// PostgreSQLコンテナのホスト設定にService名を使ってk8sのDNSに名前解決させる場合の設定
$dsn = 'pgsql:dbname=' . getenv("POSTGRESQL_DATABASE") . ';host=emp-pgsql;';
// PostgreSQLコンテナのホスト設定に環境変数(EMP_PGSQL_SERVICE_HOST)を使う場合の設定
//$dsn = 'pgsql:dbname=' . getenv("POSTGRESQL_DATABASE") . ';host=' . getenv("EMP_PGSQL_SERVICE_HOST") . ';';
$user = getenv("POSTGRESQL_USER");
$password = getenv("POSTGRESQL_PASSWORD");

try{
    $pdo_conn = new PDO($dsn, $user, $password);
    $result= $pdo_conn->query('SELECT e.emp_no, e.last_name, d.location, d.dept_name 
                               FROM emp e INNER JOIN dept d ON e.dept_no = d.dept_no
                               ORDER BY emp_no');
    foreach ($result as $row) {
        print($row['emp_no'].'|'.$row['last_name'].'|'.$row['location'].'|'.$row['dept_name']."\n");
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$pdo_conn = null;
?>
