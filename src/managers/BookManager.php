<?php

class BookManager extends AbstractEntityManager
{
    //Récupèration de tous les livres d'un utilisateurpar son Id
    public function getBooksByUser(int $userId): array
    {
        //tous les livres de l'utilisateur connecté
        $sql = "SELECT * FROM books where user_id = :userId";
        $query = $this->db->query($sql, ['userId' => $userId]);
        return $query->fetchAll();
    }

    public function getBookById(int $id): ?Book
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $query = $this->db->query($sql, ['id' => $id]);
        $data = $query->fetch();
        if ($data) {
            return new Book($data);
        }
        return null;
    }

    public function addBook(Book $book): void
    {
        $sql = "INSERT INTO books( user_id, title, author, description, image, disponibilite) VALUES (:user_id, :title, :author, :description, :image; :disponibilite)";
        $this->db->query($sql, [
            'user_id' => $book->getUserId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'image' => $book->getImage(),
            'disponibilite' => $book->getDisponibilite()
        ]);
    }

    public function deleteBook(int $id): void
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}
