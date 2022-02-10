<?php

namespace Controllers;

class User extends AbstractController
{
    protected $defaultModelName =\Models\User::class;

    public function signUp(){

        $username = null;
        $password = null;
        $email = null;
        $display_name = null;

        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['display_name'])  )
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $display_name = htmlspecialchars($_POST['display_name']);
        }

        if ($username && $password && $email && $display_name)
        {
            if ($this->defaultModel->findByUserName($username))
            {
                return $this->redirect(["type"=>"user", "action"=>"signUp", "info"=>"utilisateur existant"]);
            }
            $user = new \Models\User();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setEmail($email);
            $user->setDisplayName($display_name);

            $this->defaultModel->register($user);
            return $this->redirect(["type"=>"user", "action"=>"signIn", "info"=>"veuillez maintenant vous connecter"]);
        }

        return $this->render("users/create",["pageTitle"=>"Sign Up"]);

    }

    public function signIn(){


        $username = null;
        $password = null;

        if (!empty($_POST["username"]) && !empty($_POST["password"]))
        {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
        }

        if ($username && $password)
        {

            $user = $this->defaultModel->findByUserName($username);

            if (!$user){
               return $this->redirect(["type"=>"user", "action"=>"signIn"]);
            }
            if (!$user->logIn($password)){
                return $this->redirect(["type"=>"user", "action"=>"signIn", "info"=>"mot de passe incorrect"]);
            }
            return $this->redirect(["type"=>"velo", "action"=>"index", "info"=>"vous êtes connecté"]);

        }

        return $this->render("users/signIn", ["pageTitle"=>"Connexion"]);
    }

    public function signOut(){
        $this->defaultModel->logOut();
        return $this->redirect(["type"=>"velo", "action"=>"index", "info"=>"vous êtes déconnecté"]);
    }
}

