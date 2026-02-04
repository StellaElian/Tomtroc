<?php
class UserManager extends AbstractEntityManager
{
    public function getUserById(int $id): ?User 
    {
        $sql = "SELECT * FROM users WHERE $id = :id";
        $query = $this->db->query($sql);
        $data = $query->fetch();
        if ($data){
            return new User($data);
        }else{
            return null;
        }
    }
    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE $email = :email";
        $query = $this->db->query($sql);
        $data = $query->fetch();
        if ($data){
            return new User($data);
        }else{
            return null;
        }
    }
}