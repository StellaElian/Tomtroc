<?php
class UserManager extends AbstractEntityManager
{
    public function getUserById(int $id): ?User
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $query = $this->db->query($sql, ['id' => $id]);
        $data = $query->fetch();
        if ($data) {
            return new User($data);
        } else {
            return null;
        }
    }
    public function getUserByEmail(string $email): ?User
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->db->query($sql, ['email' => $email]);
        $data = $query->fetch();
        if ($data) {
            return new User($data);
        } else {
            return null;
        }
    }

    public function createUser(User $user): void
    {
        $avatar = $user->getAvatar();
        if (empty($avatar)) {
            $avatar = 'Avatar_default.png';
        }
        $sql = "INSERT INTO users (pseudo, email, password, avatar, created_at) VALUES (:pseudo, :email, :password, :avatar, NOW())";
        $this->db->query($sql, [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'avatar' => $avatar
        ]);
    }

    public function updateUser(User $user): void
    {
        $sql = "UPDATE users SET pseudo = :pseudo, email = :email, password = :password, avatar = :avatar WHERE id = :id";
        $params = [
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
            'password' => $user->getPassword(),
            'id' => $user->getId()
        ];
        $this->db->query($sql, $params);
    }

    public function deleteUser(int $id): void
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $this->db->query($sql, ["id"=> $id]);
    }
}
