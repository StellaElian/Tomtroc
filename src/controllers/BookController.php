<?php

class BookController
{
    public function showAddBook(): void
    {
        if (Utils::isUserConnected()){
            require_once '../src/templates/add_book.php';
        }else{
            Utils::redirect('login');
        }
    }

    // formumlaire d'ajout de livres
    public function addBookPost(): void 
    {
        if (Utils::isUserConnected()){
            Utils::redirect('login');
        }
        if (!empty($_POST['title']) && !empty($_POST['author'] && !empty($_POST['description']) && !empty($_POST['disponibilite']))){
            //image par défaut
            $fileName = "Book_default.png";
            //si une image a été envoyé
        }if ($_FILES['image']['error'] == 0){
            //on récupère l'extension .png ...
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            //on crée un nom unique 
            $fileName = uniqid('img_') . '.' . $extension;
            //on deplace l'image vers le bon dossier
            move_uploaded_file($_FILES['image']['tmp_name'], 
                                IMG_BOOKS_PATH . '/' . $fileName
            );

            //créaton objet
            $book = new Book();
            $book->setId($_SESSION['user_id']);
            $book->setTitle($_POST['title']);
            $book->setAuthor($_POST['author']);
            $book->setDescription($_POST['description']);
            $book->setDisponibilite($_POST['disponibilite']);
            $book->setImage($fileName);

            //save en bdd
            $bookManager = new BookManager();
            $bookManager->addBook($book);
            Utils::redirect('profile');
        }else{
            Utils::redirect('addBook');
        }
    }
}
