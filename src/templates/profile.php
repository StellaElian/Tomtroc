<?php require_once '../src/templates/_header.php'; ?>

<div class="profile-page" style="padding: 40px 20px; max-width: 1200px; margin: 0 auto;">

    <div class="profile-header" style="background-color: #f4f4f4; padding: 40px; border-radius: 8px; display: flex; align-items: center; gap: 40px; margin-bottom: 40px;">
        <div style="width: 150px; height: 150px; background-color: #ddd; border-radius: 50%; overflow: hidden;">
            <img src="img/avatars/avatar_default.png" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        
        <div style="flex: 1;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; margin-bottom: 10px;">
                <?= htmlspecialchars($_SESSION['user_pseudo'] ?? 'Mon Compte') ?>
            </h1>
            <p style="color: #666; font-size: 1.1rem; margin-bottom: 20px;">
                Membre depuis le <?= Utils::format($_SESSION['user_creation_date'] ?? null) ?>
            </p>
            
            <div style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; color: #666; font-weight: bold;">
                Bibliothèque
            </div>
            <div style="font-size: 1.2rem;">
                <?= count($books) ?> livre<?= count($books) > 1 ? 's' : '' ?>
            </div>
        </div>
        
        <div>
             <a href="index.php?action=addBook" class="btn-main" style="background-color: #00AC66; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                Ajouter un livre
            </a>
        </div>
    </div>

    <h2 style="font-family: 'Playfair Display', serif; margin-bottom: 20px;">Ma bibliothèque</h2>

    <div class="books-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 30px;">
        
        <?php if (empty($books)): ?>
            <p>Vous n'avez pas encore ajouté de livres.</p>
        <?php else: ?>
            <?php foreach ($books as $book): ?>
                <article class="book-card" style="width: 100%;">
                    
                    <div class="book-image" style="margin-bottom: 10px; position: relative;">
                        <img src="img/books/<?= htmlspecialchars($book->getImage()) ?>" 
                             alt="<?= htmlspecialchars($book->getTitle()) ?>"
                             style="width: 100%; aspect-ratio: 2/3; object-fit: cover; border-radius: 4px;">
                             
                        <?php if($book->getDisponibilite() === 'non dispo'): ?>
                            <span style="position: absolute; top: 10px; right: 10px; background: #d9534f; color: white; padding: 2px 8px; font-size: 0.8rem; border-radius: 4px;">Échangé</span>
                        <?php else: ?>
                            <span style="position: absolute; top: 10px; right: 10px; background: #00AC66; color: white; padding: 2px 8px; font-size: 0.8rem; border-radius: 4px;">Disponible</span>
                        <?php endif; ?>
                    </div>

                    <h3 style="font-size: 1.1rem; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <?= htmlspecialchars($book->getTitle()) ?>
                    </h3>
                    <p style="color: #666; font-size: 0.9rem; margin-bottom: 15px;">
                        <?= htmlspecialchars($book->getAuthor()) ?>
                    </p>
                    
                    <div style="display: flex; gap: 10px; font-size: 0.9rem;">
                        <a href="index.php?action=editBook&id=<?= $book->getId() ?>" style="color: #666; text-decoration: underline;">Modifier</a>
                        
                        <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>" 
                           style="color: #d9534f; text-decoration: none;"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');">
                           Supprimer
                        </a>
                    </div>

                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../src/templates/_footer.php'; ?>