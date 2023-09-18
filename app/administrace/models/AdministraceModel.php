<?php

class AdministraceModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function addNewItem(array $post_data) {
        $table = $post_data['table_name'];
        unset($post_data['table_name']);
        unset($post_data['submit']);
        return $this->insertToTable($table, $post_data);
    }

    public function updateItem(array $post_data) {
        $table = $post_data['table_name'];
        $id = $post_data['id'];
        unset($post_data['table_name']);
        unset($post_data['id']);
        unset($post_data['submit']);
        return $this->updateTableRow($table, ['id'=>$id], $post_data);
    }
    
    public function deleteItem(array $post_data) {
        return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
    }
    
}