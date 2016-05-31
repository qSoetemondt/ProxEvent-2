<?php

namespace Manager;


class mdpManager extends \W\Manager\Manager
{
    public function token($email){
        if (isset($_POST['reinit'])) {    
            $token = md5(uniqid(rand(),true));
            $sql = "SELECT * FROM wusers WHERE email = :email";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":email",$email);
            $stmt->execute();
            $user = $stmt->fetch();
            // echo "<a href=\"reinit.php?id=" . $user['id'] . "&token=" . $token . "\">lien</a>";
            $date = date("Y-m-d H:i:s",time()+24*3600);
            $sql = "INSERT INTO `tokens`(`user_id`, `token`, `date_validite`) VALUES(:id, :tokens, :date_validite)";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(":id",$user['id']);
            $stmt->bindValue(":tokens",$token);
            $stmt->bindValue(":date_validite",$date);
            $stmt->execute();
            return ['user'=>$user, 'token'=>$token];   
        }
 
    }
    
    public function reinit($id,$token, $password){
        $sql = "SELECT count(*) as nb FROM tokens WHERE user_id = :id AND token = :token AND date_validite > NOW()";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->bindValue(":token",$token);
        $stmt->execute();
        $tok = $stmt->fetch();
        $sql = 'UPDATE wusers SET password = :mot_de_passe WHERE id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':mot_de_passe',$password);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        $sql = "DELETE FROM tokens WHERE user_id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
            }
}
    
    
