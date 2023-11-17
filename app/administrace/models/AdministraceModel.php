<?php

class AdministraceModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function addNewItem(array $data_to_insert) {
        $table = $data_to_insert['table_name'];
        unset($data_to_insert['table_name']);
        unset($data_to_insert['submit']);
        return $this->insertToTable($table, $data_to_insert);
    }

    public function updateItem(array $data_to_update) {
        $table = $data_to_update['table_name'];
        $id = $data_to_update['id'];
        unset($data_to_update['table_name']);
        unset($data_to_update['id']);
        unset($data_to_update['submit']);
        return $this->updateTableRow($table, ['id'=>$id], $data_to_update);
    }
    
    public function deleteItem(array $data_to_delete) {
        $this->deleteDepartment($data_to_delete);
        $this->deleteKindOfCollaboraration($data_to_delete);
        $this->deleteLanguage($data_to_delete);
        $this->deleteMartialStatus($data_to_delete);
        $this->deleteNationality($data_to_delete);
        $this->deleteSex($data_to_delete);
        $this->deleteTypeOfCommPartner($data_to_delete);
        $this->deleteTypeOfEmplContract($data_to_delete);
        $this->deleteGdprCondition($data_to_delete);
        $this->deleteRegion($data_to_delete);
        $this->deleteDistrict($data_to_delete);
        $this->deleteHouseholdType($data_to_delete);
        $this->deleteTypeOfContact($data_to_delete);
        $this->deleteTypeOfRelationship($data_to_delete);
    }

    private function deleteDepartment(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_DEPARTMENT) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('department_id'=>$data_to_delete['id']), array('department_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteKindOfCollaboraration(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_KIND_OF_COLLABORATION) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('kind_of_collab_id'=>$data_to_delete['id']), array('kind_of_collab_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteLanguage(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_LANGUAGE) {
            $this->updateTableRow(TABLE_CANDIDATE, array('language_id'=>$data_to_delete['id']), array('language_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteMartialStatus(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_MARTIAL_STATUS) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('martial_status_id'=>$data_to_delete['id']), array('martial_status_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteNationality(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_NATIONALITY) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('nationality_id'=>$data_to_delete['id']), array('nationality_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteSex(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_SEX) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('sex_id'=>$data_to_delete['id']), array('sex_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteTypeOfCommPartner(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_TYPE_OF_COMMISSION_PARTNER) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('type_of_comm_partner_id'=>$data_to_delete['id']), array('type_of_comm_partner_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteTypeOfEmplContract(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_TYPE_OF_EMPL_CONTRACT) {
            $this->updateTableRow(TABLE_EMPLOYEE, array('type_of_empl_contract_id'=>$data_to_delete['id']), array('type_of_empl_contract_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteGdprCondition(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_GDPR_CONDITIONS) {
            $this->updateTableRow(TABLE_GDPR, array('gdpr_conditions_id'=>$data_to_delete['id']), array('gdpr_conditions_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteRegion(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_REGION) {
            $this->updateTableRow(TABLE_CONTACT, array('region_id'=>$data_to_delete['id']), array('region_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteDistrict(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_DISTRICT) {
            $this->updateTableRow(TABLE_CONTACT, array('district_id'=>$data_to_delete['id']), array('district_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteHouseholdType(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_HOUSEHOLD_TYPE) {
            $this->updateTableRow(TABLE_CONTACT, array('household_type_id'=>$data_to_delete['id']), array('household_type_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteTypeOfContact(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_TYPE_OF_CONTACT) {
            $this->updateTableRow(TABLE_CONTACT, array('type_of_contact_id'=>$data_to_delete['id']), array('type_of_contact_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }

    private function deleteTypeOfRelationship(array $data_to_delete) {
        if ($data_to_delete['table_name'] == TABLE_TYPE_OF_RELATIONSHIP) {
            $this->updateTableRow(TABLE_CONTACT, array('type_of_relationship_id'=>$data_to_delete['id']), array('type_of_relationship_id'=>NULL));
            return $this->deleteTableRow($data_to_delete['table_name'], ['id'=>$data_to_delete['id']]);
        }
    }
}