<?php

class Model {

    protected object|int $db = 1;

    public function __construct() {
        $this->db = new MysqliDb(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT, DB_CHARSET, DB_SOCKET);
    }
    

    public function getTableData(string $table_name, string|array $columns='*', int $num_rows=null): array {
        return $this->db->get($table_name, $num_rows, $columns);
    }
    
}