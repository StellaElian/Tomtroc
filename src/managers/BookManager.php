<?php

class BookManager extends AbstractEntityManager
{
    //Récupèration de tous les livres d'un utilisateurpar son Id
    public function getBooksByUser(int $userId): array
    {
        //tous les livres de l'utilisateur connecté
        $sql = "SELECT * FROM books where user_id = :userId";
        $query = $this->db->query($sql, ['userId' => $userId]);
        $books = [];
        while ($data = $query->fetch()) {
            //On transforme le tableau $data en objet Book
            $books[] = new Book($data);
        }
        return $books;
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
        $sql = "INSERT INTO books( user_id, title, author, description, image, disponibilite) VALUES (:user_id, :title, :author, :description, :image, :disponibilite)";
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

    public function updateBook(Book $book): void
    {
        $sql = "UPDATE books
                SET title = :title,
                    author = :author,
                    description = :description,
                    image = :image,
                    disponibilite = :disponibilite
                    WHERE id = :id";

        $this->db->query($sql, [
            'id' => $book->getId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'image' => $book->getImage(),
            'disponibilite' => $book->getDisponibilite()
        ]);
    }

    // Récupérer les derniers livres ajoutés
    public function getRecentBooks(int $limit = 4): array
    {
        $sql = "SELECT * FROM books ORDER BY id DESC LIMIT $limit";
        $query = $this->db->query($sql);
        $books = [];
        if ($sql) {
            while ($data = $query->fetch()) {
                $books[] = new Book($data);
            }
        }
        return $books;
    }

    public function getAllBooks(): array
    {
        // du plus vieux au plus récent 
        $sql = "SELECT b.*, u.pseudo AS seller
                FROM books b
                INNER JOIN users u ON b.user_id = u.id
                ORDER BY b.id DESC";
        $query = $this->db->query($sql);
        $books = [];
        if ($query) {
            while ($data = $query->fetch()) {
                $books[] = new Book($data);
            }
        }
        return $books;
    }
}
