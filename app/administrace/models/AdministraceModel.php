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
        $this->deleteDepartment($post_data);
        $this->deleteKindOfCollaboraration($post_data);
        $this->deleteLanguage($post_data);
        $this->deleteMartialStatus($post_data);
        $this->deleteNationality($post_data);
        $this->deleteSex($post_data);
    }

    private function deleteDepartment(array $post_data) {
        if ($post_data['table_name'] == TABLE_DEPARTMENT) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('department_id'=>$post_data['id']), array('department_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }

    private function deleteKindOfCollaboraration(array $post_data) {
        if ($post_data['table_name'] == TABLE_KIND_OF_COLLABORATION) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('kind_of_collab_id'=>$post_data['id']), array('kind_of_collab_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }

    private function deleteLanguage(array $post_data) {
        if ($post_data['table_name'] == TABLE_LANGUAGE) {
            $this->updateTableRow(TABLE_CANDIDATE, array('language_id'=>$post_data['id']), array('language_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }

    private function deleteMartialStatus(array $post_data) {
        if ($post_data['table_name'] == TABLE_MARTIAL_STATUS) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('martial_status_id'=>$post_data['id']), array('martial_status_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }

    private function deleteNationality(array $post_data) {
        if ($post_data['table_name'] == TABLE_NATIONALITY) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('nationality_id'=>$post_data['id']), array('nationality_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }

    private function deleteSex(array $post_data) {
        if ($post_data['table_name'] == TABLE_SEX) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('sex_id'=>$post_data['id']), array('sex_id'=>NULL));
            return $this->deleteTableRow($post_data['table_name'], ['id'=>$post_data['id']]);
        }
    }
    
}