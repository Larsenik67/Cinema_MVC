<?php
require "controller/AbstractController.php";
require "model/manager/FilmManager.php";

class FilmController extends AbstractController
{
    //?ctrl=store&action=index
    public function index()
    {
        $fmanager = new FilmManager();
        $film = $fmanager->findAll();
        
        return $this->render("store/home.php", [
            "film" => $film
        ]);
    }

    //?ctrl=store&action=product&id=XX
    public function product($id)
    {
        $manager = new FilmManager();
        $film = $manager->findOneById($id);

        if(!$film) return false;

        return $this->render("store/film.php", [
            "film" => $film
        ]);
    }
}