<?php

class BookManager extends AbstractEntityManager
{
    //Récupèration de tous les livres d'un utilisateurpar son Id
    public function getBooksByUser(int $userId): array
{
    //tous les livres de l'utilisateur connecté
    $sql = "SELECT * FROM books where user_id = :userId";
    $query = $this->db->query($sql, ['userId' => $userId]);
    $books =[];
    while($data = $query->fetch()){
        $books[] = new Book($data);
    }
    return $books;
}
}