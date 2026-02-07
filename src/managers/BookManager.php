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

    public function addBook( Book $book): void
    {
        $sql = "INSERT INTO books( user_id, title, author, description, image, disponibilite) VALUES (:user_id, :title, :author, :description, :image; :disponibilite)";
        $this->db->query($sql, [
            'user_id' => $_POST['user_id'],
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'description' => $_POST['description'],
            'image' => $_POST['image'],
            'disponibilite' => $_POST['disponibilite']
        ]);
    }

    public function deleteBook(int $id): void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}