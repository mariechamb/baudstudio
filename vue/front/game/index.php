

<?php


class Joueur {
    // je définie les attributs de ma classe
    private $nom;
    private $choix;

    // Je déclare le constructeur de ma classe
    public function __construct($nom) {
        $this->nom = $nom;
    }

    // public function getNom() {
    //     return $this->nom;
    // }

    public function setChoix($choix) {
        $this->choix = $choix;
    }

    public function getChoix() {
        return $this->choix;
    }
}


// J'étends ma class Joueur avec une classe enfant pour représenter l'ordinateur
class Machine extends Joueur {
    // Je veux utiliser le constructeur parent
    public function __construct() {
        parent::__construct("Machine");
    }

    // Je mets en place ma foncttion de choix aléatoire
    public function faireChoixAleatoire() {
        // Je définie mon tableau des choix possibles 
        $choixPossibles = ["Pierre", "Feuille", "Ciseaux"];
        // Je génère mon choix aléatoire
        $choixAleatoire = array_rand($choixPossibles);
        // Je récupère le résultat
        $this->setChoix($choixPossibles[$choixAleatoire]);
    }
}


// Je créée mon jeux
class Jeu {
    // Je déclare les attibuts
    private $joueur;
    private $machine;

    // Je déclare mon constructeur 
    public function __construct(Joueur $joueur, Machine $machine) {
        $this->joueur = $joueur;
        $this->machine = $machine;
    }

    // Je créer ma fonction
    public function jouer() {
        // Je vérifie qu'une manche à bien été lancée par l'utilisateur
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $choixJoueur = $_POST["choix"];
            // J'enregistre le choix du joueur
            $this->joueur->setChoix($choixJoueur);
            // Je génère un choix de machine
            $this->machine->faireChoixAleatoire();

            // Je récupère les choix
            $choixJoueur = $this->joueur->getChoix();
            $choixMachine = $this->machine->getChoix();

            // J'affiche les choix effectués
            echo "Vous avez choisi $choixJoueur.\n";
            echo "<br>";
            echo "L'ordinateur a choisi $choixMachine.\n";
            echo "<br>";

            // Je calcule et j'affiche le résultat du jeux :
            // Si les 2 ont le même choix, il y a égalité
            if ($choixJoueur == $choixMachine) {
                echo "<strong>Égalité ! Relancez la manche !</strong>\n";
            } elseif (
                ($choixJoueur == "Pierre" && $choixMachine == "Ciseaux") ||
                ($choixJoueur == "Feuille" && $choixMachine == "Pierre") ||
                ($choixJoueur == "Ciseaux" && $choixMachine == "Feuille")
            ) {
                echo "<strong>Bravo, vous remportez la manche!</strong>\n";
            } else {
                echo "<strong>L'ordinateur remporte la manche!</strong>\n";
            }
        // Si aucune manque n'a été lancée, je propose à l'utilisateur de lancer une première manche
        } else {
            echo "<strong>Lancez la première manche</strong>";
        }
    }
}

// Je lance mon jeux
$joueur = new Joueur("Joueur");
$machine = new Machine();
$jeu = new Jeu($joueur, $machine);

?>

<?php

//<!-- I INCLUDE THE HEAD HERE  -->
include '/var/www/baudstudio/vue/front/sections/head.phtml'; 
//<!-- =========================== -->

//<!-- I INCLUDE THE HEADER HERE  -->
include '/var/www/baudstudio/vue/front/sections/header.phtml'; 
//<!-- =========================== -->
?>

<!-- Je créée une interface visuelle pour l'utilisateur -->
    <div class="container section-ptb align-center">

        <h2 class="pb-25">Pierre, Feuille ou Ciseaux ?</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="radio" name="choix" value="Pierre" checked> Pierre
            <input type="radio" name="choix" value="Feuille"> Feuille
            <input type="radio" name="choix" value="Ciseaux"> Ciseaux
            <br><br>
            <input class="btn" type="submit" value="Jouer">
        </form>

        <?php $jeu->jouer(); ?>

    </div>

<?php
//<!-- I INCLUDE THE FOOTER HERE  -->
include '/var/www/baudstudio/vue/front/sections/footer.phtml'; 
//<!-- ========================== -->
?>

