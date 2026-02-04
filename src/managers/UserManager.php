<?php
class UserManager extends AbstractEntityManager
{
    public function getFirstUser(): ?User 
    {
        $sql = "SELECT * FROM users LIMIT 1";
        $query = $this->db->query($sql);
        $data = $query->fetch();
        if ($data){
            return new User($data);
        }else{
            return null;
        }
    }
}