<?php

//------Teodora Glisic--------

namespace App\Controllers\User;

use App\Controllers\BaseController;
class Badgescontroller extends BaseController{
    
    
    public function allBadges(){
       
        $data_training = [];
        $data_food = [];
        $data_water = [];
        $data_login = [];
     
        $modelKorisnikBedz = new \App\Models\KorisnikBedzModel();
        $modelBedz = new \App\Models\BedzModel();
        $modelKorisnikBedzDB = $modelKorisnikBedz->where('id_kor', session('id'))->findAll();
       
        $modelGotoviIzazovi = new \App\Models\GotoviIzazoviModel();
        $modelIzazovi = new \App\Models\IzazovModel();
        
        
        $gotoviIzazoviDB =  $modelGotoviIzazovi->where('id_kor', session('id'))->findAll();
        $brojTreningIzazova = 0;
        $brojVodaIzazova = 0;
        $brojHraneIzazova = 0;
        
        foreach ($gotoviIzazoviDB as $gotovIzazov){
            $izazov = $modelIzazovi->where('id_izazov',$gotovIzazov['id_izazov'])->findAll()[0];
            
            if($izazov['tip_izazova']=="water"){
                $brojVodaIzazova++;
            }
            
           if($izazov['tip_izazova']=="train"){
                $brojTreningIzazova++;
            }
            
            if($izazov['tip_izazova']=="food"){
                $brojHraneIzazova++;
            }
  
        }
        
        //UPIS NOVOG BEDZA UKOLIKO KORISNIK IMA NACIN DA GA DOBIJE
        $allBadgesDB = $modelBedz->findAll();
        $zastavica = false;
        foreach ($allBadgesDB as $badge){
            $zastavica = false;
            
            $korisnik = $modelKorisnikBedz->where('id_kor',session("id"))->findAll();
            foreach ($korisnik as $kor){
                if($badge['id_bedz'] == $kor['id_bedz']){
                    $zastavica = true;
                    break;
                }
            }
            if($zastavica) continue;
            
            if($badge['tip']=="water"){
                if($badge['br_izazova']<=$brojVodaIzazova){
                    $modelKorisnikBedz->save([
                        'id_kor'=>session("id"),
                        'id_bedz'=>$badge["id_bedz"]
                    ]);
                }
            }
            
            if($badge['tip']=="food"){
                 if($badge['br_izazova']<=$brojHraneIzazova){
                     $modelKorisnikBedz->save([
                        'id_kor'=>session("id"),
                        'id_bedz'=>$badge["id_bedz"]
                    ]);
                }
            }
            
            if($badge['tip']=="train"){
                 if($badge['br_izazova']<=$brojTreningIzazova){
                     $modelKorisnikBedz->save([
                        'id_kor'=>session("id"),
                        'id_bedz'=>$badge["id_bedz"]
                    ]);
                }
            }
        }
        
        //---------------------------------------------------PRIKAZ BEDZEVA
        $trainingBadges = array();
        $foodBadges = array();
        $waterBadges = array();
        
        
        foreach ($modelKorisnikBedzDB as $korisnikBedz){
            $modelBedzDB = $modelBedz->where('id_bedz',$korisnikBedz['id_bedz'])->findAll()[0];
            $slikaPath = $modelBedzDB['id_bedz']%9;
            
            if($modelBedzDB['tip']=='train'){
                $trainingBadges[] =[
                    'picturePath' =>"/assets/images/badges/train/".$slikaPath.".jpg",
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
             $slikaPath = $modelBedzDB['id_bedz']%7;
             if($modelBedzDB['tip']=='food'){
                $foodBadges[] =[
                    'picturePath' =>'/assets/images/badges/food/'.$slikaPath.".jpg",
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
             $slikaPath = $modelBedzDB['id_bedz']%7;
            if($modelBedzDB['tip']=='water'){
                $waterBadges[] =[
                    'picturePath' =>'/assets/images/badges/water/'.$slikaPath.".jpg",
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
        } 
       $data_training['trainingBadges'] = $trainingBadges;
       $data_food['foodBadges'] = $foodBadges;
       $data_water['waterBadges']=$waterBadges;
       
        
        echo view('templates/header-nicepage/header-nicepage-badges.php');
        echo view('user/badges/trainingBadges.php', $data_training);
        echo view('user/badges/foodBadges.php',$data_food);
        echo view ('user/badges/waterBadges.php',$data_water);
        echo view('templates/footer/footer.php');
     
        
        }
}
