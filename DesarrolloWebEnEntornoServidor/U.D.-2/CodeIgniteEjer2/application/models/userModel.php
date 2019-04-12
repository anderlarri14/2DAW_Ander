<?php
require_once APPPATH.'/models/userClass.php';

class userModel extends userClass{
    private $list;

    function getList() {
        return $this->list;
    }
    
 function login()
    {
        $this->load->database();
 
        $User = $this->getNombreUsu();
        $contra = $this->getContra();
        $sql = "CALL MostrarUsuario('$User')";
        echo $sql;
        $result = $this->db->query($sql);
        $this->db->close();
        echo $contra;
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $pass = $row->password;
                $idUsuario=$row->idUser;
                echo $pass;
                if (password_verify($contra, $pass)) {
                  
                    return $idUsuario;
                } else {

                    return "";
                }
            }
        } else {

            return "";
        }
    }
    


}

