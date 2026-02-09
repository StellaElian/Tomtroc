<?php

class HomeController
{
    public function index(): void
    {
        $bookManager = new BookManager();
        $book = $bookManager->getRecentBooks();
        require_once "../src/templates/home.php";
    }
}