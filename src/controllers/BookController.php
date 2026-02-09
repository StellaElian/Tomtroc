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

    public function editBookPost(): void
    {
        if(!Utils::isUserConnected()) {
            Utils::redirect('login');
        }
        //On recupère l'id du livre qu'on veut modifier
        $id = $_GET['id'] ?? null;
        if (!$id){
            Utils::redirect('profile');
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        // livre appartient à l utilisateur?
        if (!$book || $book->getUserId() !== $_SESSION['user_id']){
            Utils::redirect('profile');
        }
        if (empty($_POST['title']) || empty($_POST['author']) || empty($_POST['description']) || empty(['disponible'])) {
            //s'il manque des infos, on reste sur la page d'édition
            Utils::redirect('editBook&id=$id');
            return;
        }
        // GESTION DE L'IMAGE ..Par défaut, on garde l'ancienne image
        $fileName = $book->getImage(); 

        // Est-ce qu'une NOUVELLE image a été envoyée ?
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            
            // A. On prépare la nouvelle image
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $newFileName = uniqid('img_') . '.' . $extension;
            
            // B. On la déplace dans le dossier
            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                '../public/img/books/' . $newFileName
            );

            // C. NETTOYAGE : On supprime ANCIENNE image du disque (si ce n'est pas celle par défaut)
            if ($fileName !== 'Book_default.png') {
                $oldPath = '../public/img/books/' . $fileName;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // On met à jour le nom pour la base de données
            $fileName = $newFileName;
        }

        // Maj de l'objet Book
        $book->setTitle($_POST['title']);
        $book->setAuthor($_POST['author']);
        $book->setDescription($_POST['description']);
        $book->setDisponibilite($_POST['available']);
        $book->setImage($fileName);

        //Sauvegarde en BDD
        $bookManager->updateBook($book);

        //Redirection au profil
        Utils::redirect('profile');
    }
}
