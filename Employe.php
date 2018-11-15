<?php 

include 'MyPDO.php';

Class Employe{
    private $id,
            $nom,
            $prenom,
            $email,
            $tauxHoraire;

    public function __construct($id=null){
        if ($id!=null) {
            $db = new MyPDO();
            $return_info = 'SELECT * FROM employes WHERE id='.$id;
            $sql = $db->prepare($return_info);
            $sql->execute();
            $info_employe = $sql->fetch(PDO::FETCH_ASSOC);
            /* var_dump($info_employe); */
            $this->id = $info_employe['id'];
            $this->nom = $info_employe['nom'];
            $this->prenom = $info_employe['prenom'];
            $this->email = $info_employe['mail'];
            $this->tauxHoraire = $info_employe['tauxHoraire'];
            
        }
    }
    
    //GETTERS AND SETTERS
    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTauxHoraire(){
        return $this->tauxHoraire;
    }  

    public function update($id, $nom, $prenom, $email, $tauxHoraire){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tauxHoraire = $tauxHoraire;

        $db = new MyPDO();
        $update_employe = "UPDATE employes SET id=".$this->id.", nom='".$this->nom."', prenom='".$this->prenom."', mail='".$this->email."', tauxHoraire=".$this->tauxHoraire." WHERE id=".$this->id;
        var_dump($update_employe);
        $sql = $db->prepare($update_employe);
        $sql->execute();
    }

}        
?>