<?php

namespace Anax\Users;
 
/**
 * Model for Users.
 *
 */
class User extends \Anax\MVC\CDatabaseModel
{
    public function rankCheck($id = null){
    $sql = "SELECT * FROM projekt_user WHERE id = ?";
    $params = array($id);
    $res = $this->db->executeFetchAll($sql, $params); 
    $point = $res[0]->points;

    if ($point < '0') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Noob';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
        
    else if ($point < '3') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Anonymous';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
        
    else if ($point < '5') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Rookie';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
    
    else if ($point < '7') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Trainee';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }  
        
    else if ($point < '10') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Sensei';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }    
                
    else {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Master';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }    
        
    }


    public function rankCheckAll(){
    $sql = "SELECT * FROM projekt_user";
    $params = array();
    $res = $this->db->executeFetchAll($sql, $params); 
    foreach ($res as $user){
    $point = $user->points;
    $id = $user->id;

    if ($point < '0') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Noob';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
        
    else if ($point < '3') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Anonymous';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
        
    else if ($point < '5') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Rookie';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
    
    else if ($point < '7') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Trainee';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }  
        
    else if ($point < '10') {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Sensei';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }    
                
    else {
    $sql = "UPDATE projekt_user SET rank = ? WHERE id = ?";
    $rank = 'Master';
    $params = array($rank, $id);
    $this->db->execute($sql, $params); 
    }
        }    
        
    }

    
}