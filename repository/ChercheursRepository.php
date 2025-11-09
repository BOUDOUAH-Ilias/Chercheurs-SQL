<?php 

namespace chercheurs\repository;
session_start();

use PDO;

class ChercheursRepository {

    static private array $config = [];
    static private ?ChercheursRepository $instance = null;
    private ?PDO $pdo = null;

    static public function setConfig($file): void
    {
        self::$config = parse_ini_file($file);
    }

    static public function getInstance(): ChercheursRepository
    {
        if (self::$instance === null) {
            self::$instance = new ChercheursRepository();
        }
        return self::$instance;
    }

    private function __construct()
    {
        if (!empty(self::$config)) {
            $driver = self::$config['driver'];
            $host = self::$config['host'];
            $database = self::$config['database'];
            $user = self::$config['username'];
            $pass = self::$config['password'];
            $dsn = "$driver:host=$host;dbname=$database";
            try {
                $this->pdo = new PDO($dsn, $user, $pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (\PDOException $e) {
                echo "ça marche pas : " . $e->getMessage() . "<br>";
            }
        } else {
            echo "Config marche pas<br>";
        }
    }

    public function getArticle(string $nom, string $prenom){
        
        try {
        $stmt = $this->pdo->prepare("select TITRE
                                     from article
                                     inner join ecrire on article.NUMART = ecrire.NUMART
                                     inner join chercheur on ecrire.NUMCHER = chercheur.NUMCHER
                                     where chercheur.NOMCHERCHEUR = ? and chercheur.PRENOMCHERCHEUR = ?;");
        
        $stmt->execute([$nom, $prenom]);

        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 
        catch (\PDOException $e) {
        echo "<p> Test SQL : " . $e->getMessage() . "</p>";
        }
        return $res;
    }

    public function getCoAuteurs(string $nom, string $prenom){
        try {
        $stmt = $this->pdo->prepare("select distinct c2.NOMCHERCHEUR, c2.PRENOMCHERCHEUR
                                    from ecrire e1
                                    inner join ecrire e2 on e1.NUMART = e2.NUMART
                                    inner join chercheur c1 on e1.NUMCHER = c1.NUMCHER
                                    inner join chercheur c2 on e2.NUMCHER = c2.NUMCHER
                                    where c1.NOMCHERCHEUR = ? AND c1.PRENOMCHERCHEUR = ?
                                    and c2.NUMCHER <> c1.NUMCHER;");
        
        $stmt->execute([$nom, $prenom]);

        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 
        catch (\PDOException $e) {
        echo "<p> Test SQL : " . $e->getMessage() . "</p>";
        }
        return $res;
    }

    public function getChercheursLabos(){
        try {
        $stmt = $this->pdo->query("select distinct NOMCHERCHEUR, PRENOMCHERCHEUR, NOMLABO
                                    from chercheur 
                                    inner join travailler on chercheur.NUMCHER = chercheur.NUMCHER
                                    inner join laboratoire on laboratoire.NUMLABO = laboratoire.NUMLABO
                                    ORDER BY NOMCHERCHEUR;");

        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 
        catch (\PDOException $e) {
        echo "<p> Test SQL : " . $e->getMessage() . "</p>";
        }
        return $res;
    }
    

    public function getPDO(): ?PDO
    {
        return $this->pdo;
    }

}