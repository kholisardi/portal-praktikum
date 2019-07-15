<?php

class Model_Asprak extends CI_Model
{

    public function asprakMatkul()
    {

        $nim = $this->session->userdata('nim');
        $role = $this->session->userdata('role_id');

        $queryMatkul = "SELECT `matkul`.`kodematkul`,`namamatkul`
                        FROM `matkul` JOIN `access_matkul` 
                        ON `matkul`.`kodematkul` = `access_matkul`.`kodematkul`
                        WHERE `access_matkul`.`role_id` = $role
                        ORDER BY `matkul`.`kodematkul` ASC";

        return $this->db->query($queryMatkul)->result_array();
    }
}
