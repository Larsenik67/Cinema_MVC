<?php
require "controller/AbstractController.php";
require "model/manager/FilmManager.php";

class AdminController extends AbstractController
{
    //?ctrl=admin
    public function index($id)
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        $manager = new  FilmManager();
        $films = $manager->findAll();
        $action = "?ctrl=admin&action=addFilm";
        
        if($prod = $manager->findOneById($id)){
            $action = "?ctrl=admin&action=updateProduct&id=$id";
        }

        return $this->render("admin/home.php", [
            "films" => $films,
            "prod" => $prod,
            "action" => $action
        ]);
        
    }

    //?ctrl=admin&action=addProduct
    public function addFilm()
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $titre = Form::getData("titre", "text");
            $durée = Form::getData("durée", "int", FILTER_FLAG_ALLOW_FRACTION);
            $résumé = Form::getData("résumé", "text");

            if($titre && $durée && $résumé){
                $manager = new FilmManager();
                if($newId = $manager->insertFilm($titre, $durée, $résumé)){
                    
                    $this->addFlash("success", "Le produit est entré en base de données !!");
                    return $this->redirect("?ctrl=store&action=product&id=$newId");
                }
                else $this->addFlash("error", "Erreur de BDD !!");
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");

            return $this->redirect("?ctrl=admin");
        }
        else return false;
    }

    //?ctrl=admin&action=updateProduct
    public function  updateFilm($id)
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;

        if(Form::isSubmitted()){
            $manager = new FilmManager();
            $name = Form::getData("name", "text");
            $price = Form::getData("price", "float", FILTER_FLAG_ALLOW_FRACTION);
            $descr = Form::getData("descr", "text");

            if($id && $name && $price && $descr){
                if($manager->updateFilm($id, $name, $price, $descr)){
                    return $this->redirect("?ctrl=store&action=product&id=$id.php");
                }
            }
            else return false;
        }

    }
    //?ctrl=admin&action=deleteProduct
    public function  deleteFilm($id)
    {
        if(!$this->isGranted("ROLE_ADMIN")) return false;
            
            $manager = new FilmManager();

            if($id && $manager->deleteFilm($id)){

                $this->addFlash("success", "Produit supprimé en base de données !");
                return $this->redirect("?ctrl=admin");
                
            }
            else $this->addFlash("error", "Veuillez vérifier les données du formulaire");
    }
}