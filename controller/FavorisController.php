<?php

require "controller/AbstractController.php";
require "model/manager/FilmManager.php";

class FavorisController extends AbstractController
{
    //?ctrl=cart
    public function index()
    {

        $manager = new FilmManager();
        $films = $manager->findAll();

        return $this->render("store/recap.php", [
            "films" => $films,
        ]);
        
    }
}