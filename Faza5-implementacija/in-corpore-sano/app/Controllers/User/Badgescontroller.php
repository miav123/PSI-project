<?php


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
       
        
        $trainingBadges = array();
        $foodBadges = array();
        $waterBadges = array();
        $loginBadges = array();
        
        foreach ($modelKorisnikBedzDB as $korisnikBedz){
            $modelBedzDB = $modelBedz->where('id_bedz',$korisnikBedz['id_bedz'])->findAll()[0];
            
            if($modelBedzDB['tip_bedza_vreme']=='1'){
                $trainingBadges[] =[
                    'picturePath' =>'/',
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
            
             if($modelBedzDB['tip_bedza_vreme']=='2'){
                $foodBadges[] =[
                    'picturePath' =>'/',
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
            
            if($modelBedzDB['tip_bedza_vreme']=='3'){
                $waterBadges[] =[
                    'picturePath' =>'/',
                    'name' => $modelBedzDB['ime'],
                    'description' =>$modelBedzDB['opis']
                ];
            }
            
//            if($modelBedzDB['tip_bedza_vreme']=='4'){
//                $loginBadges[] =[
//                    'picturePath' =>'/',
//                    'name' => $modelBedzDB['ime'],
//                    'description' =>$modelBedzDB['opis']
//                ];
//            }
            
        }
        
       $data_training['trainingBadges'] = $trainingBadges;
       $data_food['foodBadges'] = $foodBadges;
       $data_water['waterBadges']=$waterBadges;
       $data_login['loginBadges']=$loginBadges;
        
        echo view('templates/header-nicepage/header-nicepage.php');
        echo view('user/badges/trainingBadges.php', $data_training);
        echo view('user/badges/foodBadges.php',$data_food);
        echo view ('user/badges/waterBadges.php',$data_water);
        //echo view ('user/badges/loginBadges.php',$data_login);
        echo view('templates/footer/footer.php');
     
        
        }
}
