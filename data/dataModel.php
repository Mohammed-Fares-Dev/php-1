<?php
require_once 'Database.php';
require_once '../incs/sessions.php';


class DataModel {
    private $conn;
    public function __construct() 
    {
        $this->conn = new DataBase;
    }
    
    
    public function authUser (string $e,string $p): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM Compte JOIN employes ON Compte.Emp_id = employes.id where email = :e AND pass = :p ;');
        $this->conn->bind(':e',$e);
        $this->conn->bind(':p',$p);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    
    
    
    
    public function checkIfUserExists (string $e): bool
    {
        $this->conn->sql_prepare('SELECT * FROM Compte where email = :e;');
        $this->conn->bind(':e',$e);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    public function checkIfUserExistsById ($id): bool
    {
        $this->conn->sql_prepare('SELECT * FROM employes where id = :id;');
        $this->conn->bind(':id',$id);
        try 
        {
            $data = $this->conn->getOne();
        }
        catch(PDOException $e){
            return false;
        }
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    public function getALLEmployeById ($id): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM employes JOIN compte where id = :id;');
        $this->conn->bind(':id',$id);
        try 
        {
            $data = $this->conn->getOne();
        }
        catch(PDOException $e){
            return false;
        }
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return false;
    }
    
    
    
    
    public function registerUser ($n,$pn,$dn,$adrs,$s,$de,$depr)
    {
        $id = rand(1, 1000000);
        if ($this->checkIfUserExistsById($id))
        {
            return $this->registerUser($n,$pn,$dn,$adrs,$s,$de,$depr);
        }
        
        
        $this->conn->sql_prepare("INSERT INTO employes (id,nom,prenom,date_naissance,adresse,salaire,date_embauche,departement) VALUES  (:id,:n,:pn,:dn,:adrs,:s,:de,:depr);");
        $this->conn->bind(':id',$id);
        $this->conn->bind(':n',$n);
        $this->conn->bind(':pn',$pn);
        $this->conn->bind(':dn',$dn);
        $this->conn->bind(':adrs',$adrs);
        $this->conn->bind(':s',$s);
        $this->conn->bind(':de',$de);
        $this->conn->bind(':depr',$depr);
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            return false;
        }
        if($this->conn->dataCount() > 0){
            $_SESSION['user_id'] = $id;
            return true;
        }
        return false;
    }
    
    
    
    public function creatUserAcount ($e,$p,$id)
    {
        
        
        
        $this->conn->sql_prepare("INSERT INTO Compte (email,pass,Emp_id) VALUES  (:e,:p,:id);");
        $this->conn->bind(':e',$e);
        $this->conn->bind(':p',$p);
        $this->conn->bind(':id',$id);
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            return false;
        }
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    
    
    public function getALLEmployes () 
    {
        $this->conn->sql_prepare('SELECT id,nom,prenom,date_naissance,adresse,salaire,date_embauche,departement,email FROM employes JOIN Compte ON employes.id = compte.Emp_id;');
        return $this->conn->getAll();
    }
    
    
    
    
    
    public function recherch ($searchParam) : ?array
    {
        $this->conn->sql_prepare("SELECT id,nom,prenom,date_naissance,adresse,salaire,date_embauche,departement,email FROM employes JOIN Compte ON employes.id = compte.Emp_id WHERE  (nom = :searchParam OR prenom = :searchParam OR email = :searchParam OR salaire = :searchParam OR departement = :searchParam);");
        $this->conn->bind(':searchParam',$searchParam);
        $data = $this->conn->getAll();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    public function supprime ($id)
    {
        $this->conn->sql_prepare("DELETE FROM employes WHERE id = :id");
        $this->conn->bind(':id',$id);
        
        
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            return false;
        }
        
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    
    
    
    
    
    public function update ($n,$pn,$s,$adrs,$dn,$de,$depr,$id)
    {
        $this->conn->sql_prepare("UPDATE employes SET nom = :n ,prenom = :pn, salaire = :s , date_naissance = :dn , date_embauche = :de, departement = :depr, adresse = :adrs WHERE id = :id  ;");
        $this->conn->bind(':n',$n);
        $this->conn->bind(':pn',$pn);
        $this->conn->bind(':s',$s);
        $this->conn->bind(':adrs',$adrs);
        $this->conn->bind(':dn',$dn);
        $this->conn->bind(':de',$de);
        $this->conn->bind(':depr',$depr);
        $this->conn->bind(':id',$id);
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            return false;
        }
        if($this->conn->dataCount() > 0){

            return true;
        }
        return false;
    }
    public function emailUpdate ($e,$id)
    {
        $this->conn->sql_prepare("UPDATE Compte SET email = :e WHERE Emp_id = :id  ;");
        $this->conn->bind(':e',$e);
        $this->conn->bind(':id',$id);
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            echo $e;
            die();
            return false;
        }
        if($this->conn->dataCount() > 0){

            return true;
        }
        return false;
    }
    public function PassUpdate ($p,$id)
    {
        $this->conn->sql_prepare("UPDATE Compte SET pass = :p WHERE Emp_id = :id  ;");
        $this->conn->bind(':p',$p);
        $this->conn->bind(':id',$id);
        try 
        {
            
            $data = $this->conn->exct();
        }
        catch(PDOException $e){
            echo $e;
            die();
            return false;
        }
        if($this->conn->dataCount() > 0){

            return true;
        }
        return false;
    }
    
    
    
    
    
    
    // public function checkIfAcountExistsById ($id): bool
    // {
        //     $this->conn->sql_prepare('SELECT * FROM Compte where id = :id;');
        //     $this->conn->bind(':id',$id);
    //     $data = $this->conn->getOne();
    //     if($this->conn->dataCount() > 0){
    //         return true;
    //     }
    //     return false;
    // }




































































    
    
    public function getUserByEmail (string $e): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM Medecin where Email = :e;');
        $this->conn->bind(':e',$e);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    
    public function getRdvNbrPatient (string $id): ?array
    {
        $this->conn->sql_prepare('SELECT COUNT(*) AS appointment_count FROM rendezvous AS a JOIN patient AS p ON a.patient = p.patientid WHERE p.patientid = :id;');
        $this->conn->bind(':id',$id);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    
    public function getRdvNbrDoc (string $id): ?array
    {
        $this->conn->sql_prepare('SELECT COUNT(*) AS appointment_count FROM rendezvous AS a JOIN Medecin AS m ON a.doc = m.medecinid WHERE m.medecinid = :id;');
        $this->conn->bind(':id',$id);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    
    
    // public function getALLPatientsByRdv (string $id): ?array
    // {
    //     $this->conn->sql_prepare('SELECT COUNT(*) AS appointment_count FROM rendezvous AS a JOIN Medecin AS m ON a.doc = m.medecinid WHERE m.medecinid = :id;');
    //     $this->conn->bind(':id',$id);
    //     $data = $this->conn->getOne();
    //     if($this->conn->dataCount() > 0){
    //         return $data;
    //     }
    //     return null;
    // }

    public function getALLPatientsByRdv ($id): ?array
    {
        $this->conn->sql_prepare('SELECT DISTINCT  PatientID,patient.FirstName,patient.lastName,patient.Phone,patient.Email FROM Medecin JOIN  rendezvous ON Medecin.MedecinID = rendezvous.doc JOIN patient ON patient.PatientID = rendezvous.patient WHERE Medecin.MedecinID = :id;');
        $this->conn->bind(':id',$id);
        return $this->conn->getAll();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }


    public function getAdminByEmail (string $e): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM Admin where Email = :e;');
        $this->conn->bind(':e',$e);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    public function getPatientByEmail (string $e): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM patient where Email = :e;');
        $this->conn->bind(':e',$e);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }

    public function getPatientById (string $id): ?array
    {
        $this->conn->sql_prepare('SELECT Email FROM patient where PatientID = :id;');
        $this->conn->bind(':id',$id);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    
    
    public function getUserByID (string $id): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM Medecin where MedecinID = :id;');
        $this->conn->bind(':id',$id);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }


    public function getAdminByID (string $id): ?array
    {
        $this->conn->sql_prepare('SELECT * FROM Admin where AdminID = :id;');
        $this->conn->bind(':id',$id);
        $data = $this->conn->getOne();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    // public function getDoctorByID (string $id): ?array
    // {
    //     $this->conn->sql_prepare('SELECT * FROM users  where users.UserID = :id;');
    //     $this->conn->bind(':id',$id);
    //     $data = $this->conn->getOne();
    //     if($this->conn->dataCount() > 0){
    //         return $data;
    //     }
    //     return null;
    // }










    public function getALLSpl () 
    {
        $this->conn->sql_prepare('SELECT * FROM specialite WHERE specialiteID <> "1";');
        return $this->conn->getAll();
    }


    
    
    public function getALLRdvForPatient ($id) 
    {
        $this->conn->sql_prepare('SELECT PatientID,rendezvousID,rendezvous.description,dete_de_reserve,dete_de_rendezvous,rendez_vous_status,doc,medecin.LastName,medecin.FirstName,medecin.Email,medecin.Phone,specialite.specialiteName,rendezvous.rendez_vous_status FROM patient JOIN  rendezvous ON patient.PatientID = rendezvous.patient JOIN medecin ON medecin.MedecinID = rendezvous.doc JOIN specialite ON medecin.spl = specialite.specialiteID WHERE patient.PatientID = :id;');
        $this->conn->bind(':id',$id);
        return $this->conn->getAll();
    }
    
    
    public function getDocBySpl ($n) 
    {
        $this->conn->sql_prepare('SELECT * FROM Medecin JOIN specialite ON Medecin.spl = specialite.specialiteID  WHERE specialite.specialiteName = :n;');
        $this->conn->bind(':n',$n);
        return $this->conn->getAll();
    }









    public function getSplByName ($nom) 
    {
        $this->conn->sql_prepare('SELECT * FROM specialite WHERE specialiteName = :nom;');
        $this->conn->bind(':nom',$nom);
        return $this->conn->getOne();
    }
    
    public function registerDoctor ($n,$pn,$e,$ph,$spl)
    {
        $id = uniqid();
        $res = $this->getUserByID($id);
        if ($res)
        {
            registerDoctor($n,$pn,$e,$ph,$spl);
        }
        $this->conn->sql_prepare("INSERT INTO Medecin VALUES  (:id,:ps,:n,:pn,:e,:ph,:spl);");
        $this->conn->bind(':id',$id);
        $this->conn->bind(':ps',password_hash(DEFAULT_PASS,PASSWORD_DEFAULT));
        $this->conn->bind(':n',$n);
        $this->conn->bind(':pn',$pn);
        $this->conn->bind(':e',$e);
        $this->conn->bind(':ph',$ph);
        // $this->conn->bind(':pr',2);
        $this->conn->bind(':spl',$spl);
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    public function registerPatient ($n,$pn,$e,$ph,$ps)
    {
        $id = uniqid();
        $res = $this->getPatientById($id);
        if ($res)
        {
            registerPatient($n,$pn,$e,$ph,$ps);
        }
        $ps = password_hash($ps,PASSWORD_DEFAULT);
        $this->conn->sql_prepare("INSERT INTO patient (PatientID,Password,FirstName,LastName,Email,Phone) VALUES  (:id,:ps,:n,:pn,:e,:ph);");
        $this->conn->bind(':id',$id);
        $this->conn->bind(':ps',$ps);
        $this->conn->bind(':n',$n);
        $this->conn->bind(':pn',$pn);
        $this->conn->bind(':e',$e);
        $this->conn->bind(':ph',$ph);
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    public function registerSPL ($id,$n,$desc)
    {
        $this->conn->sql_prepare("INSERT INTO specialite VALUES  (:id,:n,:desc);");
        $this->conn->bind(':id',$id);
        $this->conn->bind(':n',$n);
        $this->conn->bind(':desc',$desc);
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    public function editRDV ($desc,$date,$id)
    {
        $this->conn->sql_prepare("UPDATE rendezvous SET description = :desc ,dete_de_rendezvous = :date WHERE rendezvousID = :id;");
        $this->conn->bind(':desc',$desc);
        $this->conn->bind(':date',$date);
        $this->conn->bind(':id',$id);
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    
    
    public function recherchPatient ($searchParam,$id) : ?array
    {
        $this->conn->sql_prepare("SELECT DISTINCT  PatientID,patient.FirstName,patient.lastName,patient.Phone,patient.Email FROM Medecin JOIN  rendezvous ON Medecin.MedecinID = rendezvous.doc JOIN patient ON patient.PatientID = rendezvous.patient WHERE  (patient.FirstName = :searchParam OR patient.LastName = :searchParam OR patient.Email = :searchParam OR patient.Phone = :searchParam OR patient.PatientID = :searchParam OR rendezvous.description = :searchParam) AND Medecin.MedecinID = :id;");
        $this->conn->bind(':searchParam',$searchParam);
        $this->conn->bind(':id',$id);
        $data = $this->conn->getAll();
        if($this->conn->dataCount() > 0){
            return $data;
        }
        return null;
    }
    public function supprimeSPL ($id)
    {
        $this->conn->sql_prepare("DELETE FROM specialite WHERE specialiteID = :id");
        $this->conn->bind(':id',$id);
        
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    
    
    public function annuleRDV ($id)
    {
        $this->conn->sql_prepare("DELETE FROM rendezvous WHERE rendezvousID = :id");
        $this->conn->bind(':id',$id);
        
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
    
    
    
    public function rdvByDate ($rdv)
    {
        $this->conn->sql_prepare('SELECT * FROM rendezvous WHERE dete_de_rendezvous = :rdv;');
        $this->conn->bind(':rdv',$rdv);
        return $this->conn->getOne();
    }
    
    public function registerRDV ($id,$desc,$rerv,$rdv,$doc,$patient)
    {
        $this->conn->sql_prepare("INSERT INTO rendezvous VALUES  (:id,:desc,:rerv,:rdv,:stt,:doc,:patient);");
        $this->conn->bind(':id',$id);
        $this->conn->bind(':desc',$desc);
        $this->conn->bind(':rerv',$rerv);
        $this->conn->bind(':rdv',$rdv);
        $this->conn->bind(':stt','pendding');
        $this->conn->bind(':doc',$doc);
        $this->conn->bind(':patient',$patient);
        $data = $this->conn->exct();
        if($this->conn->dataCount() > 0){
            return true;
        }
        return false;
    }
}
// public function getClientByname ($nom) 
// {
    //     $this->conn->sql_prepare('SELECT * FROM Customers WHERE FirstName = :nom;');
    //     $this->conn->bind(':nom',$nom);
    //     return $this->conn->getAll();
    // }
    // public function getALLClientById ($id) 
    // {
        //     $this->conn->sql_prepare('SELECT * FROM Customers WHERE CustomerID = :id;');
//     $this->conn->bind(':id',$id);
//     return $this->conn->getOne();
// }