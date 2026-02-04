<?php 
// classe parente, les enfants pourront hériter de ces outils

abstract class AbstractEntity 
{
    //par défaut id=-1, qui permet de vérifier si l'entité est nouvelle ou pas, protected car enfants peuvent y toucher
    protected int $id = -1;
    /**
     * fonction s'allume toute seule quand on crée un objet
     * on lui donne $data qui contient les informations de la bdd
     * Si un tableau associatif est passé en paramètre, on hydrate l'entité.
    */

    public function __construct(array $data = [])
    {
        if (!empty($data)){
            // on appelle la machine à ranger(hydratation)
            // "prends les informations du panier et ranges les dans les bons tiroirs"
            $this->hydrate($data);
        }
    }

    /**
     * Système d'hydratation de l'entité.
     * Permet de transformer les données d'un tableau associatif.
     * Les noms de champs de la table doivent correspondre aux noms des attributs de l'entité.
     * Les underscore sont transformés en camelCase (ex: date_creation devient setDateCreation).
    */

    protected function hydrate(array $data) : void 
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Setter pour l'id.
    
    public function setId(int $id) : self 
    {
        $this->id = $id;
        return $this;
    }

    //Getter pour l'id.
   
    public function getId() : int 
    {
        return $this->id;
    }
}