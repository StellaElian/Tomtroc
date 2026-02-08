<?php

class BookController
{
    public function showAddBook(): void
    {
        if (Utils::isUserConnected()) {
            require_once '../src/templates/add_book.php';
        } else {
            Utils::redirect('login');
        }
    }

    // formumlaire d'ajout de livres
    public function addBookPost(): void
    {
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }
        if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['description']) || empty($_POST['disponibilite'])) {
            Utils::redirect('addBook');
            return;
        }
        //image par défaut
        $fileName = "Book_default.png";
        //si une image a été envoyé
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            //on récupère l'extension .png ...
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            //on crée un nom unique 
            $fileName = uniqid('img_') . '.' . $extension;
            //on deplace l'image vers le bon dossier
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                '../public/img/books/' . $fileName
            );
        }

        //créaton objet
        $book = new Book();
        $book->setUserId($_SESSION['user_id']);
        $book->setTitle($_POST['title']);
        $book->setAuthor($_POST['author']);
        $book->setDescription($_POST['description']);
        $book->setDisponibilite($_POST['disponibilite']);
        $book->setImage($fileName);

        //save en bdd
        $bookManager = new BookManager();
        $bookManager->addBook($book);
        Utils::redirect('profile');
    }

    public function deleteBook(): void
    {
        if (!Utils::isUserConnected()) {
            Utils::redirect('login');
        }
        //rrécupération l'ID de l'URL
        $id = $_GET['id']  ?? null;
        if ($id) {
            $bookManager = new BookManager();
            $book = $bookManager->getBookById($id);
            // si le livre existe et s'il appartient à l'utilisateur connecté
            if ($book && $book->getUserId() === $_SESSION['user_id']) {
                //nettoyage image 
                $imageName = $book->getImage();
                if ($imageName !== 'Book_default.png'){
                    $imagePath = '../public/img/books/' . $imageName;
                    if(file_exists($imagePath)) {
                        unlink($imagePath); //Supprime le fichier du disque
                    }
                } 
                //suppression en bdd
                $bookManager->deleteBook($id);
            }
        }
        Utils::redirect('profile');
    }

    public function showEditBook(): void
    {
        if(!Utils::isUserConnected()) {
            Utils::redirect('login');
        }
        // Récupérer l'Id
        $id = $_GET['id'] ?? null;
        if (!$id){
            Utils::redirect('profile');
        }
        //Récupération le livre
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        if (!$book || $book->getUserId() !== $_SESSION['user_id']){
            Utils::redirect('profile');
        }
        require_once '../src/templates/edit_book.php';
    }
}
