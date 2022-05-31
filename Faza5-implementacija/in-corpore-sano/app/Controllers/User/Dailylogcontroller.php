<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template 
 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
class Dailylogcontroller extends BaseController {
    
    
    public function dailyLog(){
        
        $data_intake = [];
        $data_workOut = [];
        $data_food = [];
        $data_water = [];
        
        
        $workArray = array();
        $waterArray = array();
        $dateNow = date("Y-m-d");
        $kcalDaily = 0;
        //PRIKAZ DAILY TRENINGA
        $data_workOutModel = new \App\Models\UnosTreningaModel();
        $data_workOutDB = $data_workOutModel->where('id_kor', session('id'))->findAll(); 
        $tipTreningaModel = new \App\Models\TipTreningaModel();
        $dateArray = [];
        $tipTreningaM = new \App\Models\TipTreningaModel();
        $tipTreningaDB = $tipTreningaM->findAll();
        $opcijeTreninga = [];
        foreach ($tipTreningaDB as $trening){
            $opcijeTreninga[]=[
                'option' => $trening['naziv']
            ];

        }
        
        
        $ukupnaPotrosnja = 0;
        foreach ($data_workOutDB as $work){
            $dateArray = explode(' ',$work['datum']);
            if($dateArray[0] == $dateNow){
                $tipTreningaModelDB = $tipTreningaModel->where('id_tip',$work['id_tip'])->findAll()[0];
                $potrosnjaZaPolaSata = $tipTreningaModelDB['kcal_za_pola_sata_tren'];
                $ukupnaPotrosnja += $work['vreme_trajanja']*$potrosnjaZaPolaSata;
                $workArray[] = [
                    'name' => $tipTreningaModelDB['naziv'],
                    'time' =>$work['vreme_trajanja'],
                    'kcal' => $work['vreme_trajanja']*$potrosnjaZaPolaSata
                ];
            }
        }
        
        $data_workOut['lostKcal'] = $ukupnaPotrosnja;
        $data_workOut['dailyWorkouts'] = $workArray;
        $data_workOut['trainingOptions'] = $opcijeTreninga;
        $kcalDaily -= $ukupnaPotrosnja;
        
        //PRIKAZ HRANE
        $foodArray = array();
        $grooceriesArray = array();
        $ukupnaPotrosnja = 0;
        
        $data_unosHraneModel = new \App\Models\UnosHraneModel();
        $data_obrokModel = new \App\Models\ObrokModel();
        $data_obrokSadrziNamirnicuModel = new \App\Models\ObrokSadrziNamirniceModel();
        $data_namirniceModel = new \App\Models\NamirnicaModel();
        
        
        $data_unosHraneDB = $data_unosHraneModel->where('id_kor',session('id'))->findAll();
        $brojac = 0;
        $obrokPotrosnja = 0;
        
        //$probaNamirnice = array();
        $probaSveNamirnice = array();
         foreach ($data_unosHraneDB as $unos){
            $dateArray = explode(' ',$unos['datum']);
            if($dateArray[0] == $dateNow){
                $probaNamirnice = array();
                $brojac++;
                $dataObrokDB = $data_obrokModel->where('id_obr',$unos['id_obr'])->findAll()[0];
                $dataObrokSadrzniNamirniceDB = $data_obrokSadrziNamirnicuModel->where('id_obr',$unos['id_obr'])->findAll();
                foreach ($dataObrokSadrzniNamirniceDB as $namirnica){
                    $namirnicaDB = $data_namirniceModel->where('id_nam',$namirnica['id_nam'])->findAll()[0];
                    $obrokPotrosnja += ($namirnica['kolicina_svake_nam_u_g']/100)*$namirnicaDB['kcal_na_100g'];
                     $probaNamirnice[] =[
                        'ime' => $namirnicaDB['naziv'],
                        'kolicina'=>$namirnica['kolicina_svake_nam_u_g'],
                        '100/kcal'=>$namirnicaDB['kcal_na_100g']
                     ];
                }
                $probaSveNamirnice[] =[
                    'namirniceZaObrok'=>$probaNamirnice,
                    'idModal'=>$brojac
                ];
                $probaNamirnice = null;
                $probaNamirnice = array();
                $foodArray[] = [
                    'modalNum' => $brojac,
                    'name' => $dataObrokDB['naziv'],
                    'kcalObroka'=>$obrokPotrosnja
                ];
            }
            $ukupnaPotrosnja +=$obrokPotrosnja;
            $obrokPotrosnja = 0;
        }
        
        $data_namirnice = [];
        $data_namirniceDB = $data_namirniceModel->findAll();
        foreach ($data_namirniceDB as $nam){
            $data_namirnice[]=[
                'option'=>$nam['naziv']
            ];
        }
        
        $data_food['dailyMeals'] = $foodArray;
        $data_food['ukupnaPotrosnja'] = $ukupnaPotrosnja;
        $data_food['foodOptions'] = $data_namirnice;
        
        $kcalDaily += $ukupnaPotrosnja;
       
        $posalji = array();
        $data_food['nam'] = $posalji;
        
        //PRIKAZ UNOSA VODE
        
        $ukupanUnosVode = 0;
        $data_waterModel = new \App\Models\UnosVodeModel();
        $data_waterDB = $data_waterModel->where('id_kor',session('id'))->findAll();
         foreach ($data_waterDB as $work){
            $dateArray = explode(' ',$work['datum']);
            if($dateArray[0] == $dateNow){
                $ukupanUnosVode += $work['kolicina'];
                
            }
        }
        $data_water['unos']=$ukupanUnosVode;
        
        //PRIKAZ POCETKA STRANICE
        
        $data_intake['kcalDaily'] = $kcalDaily;
        
        //PRIKAZ NA STRANICI
         echo view('templates/header-nicepage/header-dailylog.php');
         echo view('user/dailylog/caloriesIntake.php',$data_intake);
          echo view('user/dailylog/dailyWorkOuts.php',$data_workOut);
          echo view('user/dailylog/dailyFood.php',$data_food);
          
          //MODALI ZA OBROKE
          foreach ($probaSveNamirnice as $proba){
              $posalji['namirnice'] = $proba['namirniceZaObrok'];
               $posalji['modal'] = $proba['idModal'];
                echo view('components/dailylog-items/daily_groceries_item.php',$posalji);
          }
          echo view('user/dailylog/dailyWater.php',$data_water);
          echo view('templates/footer/footer.php');
        
    }
    public function trainingInput(){
        helper(['form']);
        date_default_timezone_set("Europe/Belgrade");
        if(array_key_exists('acceptbtn1', $_POST)) {
           $unosTreningaM = new \App\Models\UnosTreningaModel();
           $tipTreningaM = new \App\Models\TipTreningaModel();
           $tipTreningaDB = $tipTreningaM->where('naziv',$_POST['exercise'])->findAll()[0];
           $timeDate = date("Y-m-d H-i-s");
           $unosTreningaM->save([
                'id_kor'=>session("id"),
                'datum'=>$timeDate,
               'id_tip'=>$tipTreningaDB['id_tip'],
               'vreme_trajanja'=>$this->request->getVar('time')
           ]);
        }
        return redirect()->to('user/Dailylogcontroller/dailyLog');
    }
    
    public function foodInput(){
        helper(['form']);
         date_default_timezone_set("Europe/Belgrade");
         
        if(array_key_exists('acceptbtn2', $_POST)) {
           $counter = 1;
           $ime_obroka = $this->request->getVar("obrok");
           date_default_timezone_set("Europe/Belgrade");
           $timeDate = date("Y-m-d H-i-s");
           
           //potrebni modeli da upisem sve ovo
           $data_unosHraneM = new \App\Models\UnosHraneModel();
           $data_obrokM = new \App\Models\ObrokModel();
           $data_obrokNamirnicaM = new \App\Models\ObrokSadrziNamirniceModel();
           $data_namirnicaM = new \App\Models\NamirnicaModel();
           
           $data_obrokM->save([
               'naziv' =>$ime_obroka
            ]);
           
           $id_obroka = $data_obrokM->findAll();
           foreach ($id_obroka as $id){
               $id_obroka = $id['id_obr'];
           }
           
           $data_unosHraneM->save([
               'id_kor'=> session("id"),
               'datum'=>$timeDate,
               'id_obr'=>$id_obroka
           ]);
           
           
           while(true){
               $imeNamirnice = "food".strval($counter) ;
               $kolicina = "g".strval($counter);
               $namirnica = $this->request->getVar($imeNamirnice);
               $kolicinaNamirnice = $this->request->getVar($kolicina);
               if($kolicinaNamirnice == null){
                   break;
               }
               $namirnicaDB = $data_namirnicaM->where('naziv',$namirnica)->findAll()[0];
               $counter++;
               $data_obrokNamirnicaM->save([
                   'id_obr'=>$id_obroka,
                   'id_nam'=>$namirnicaDB['id_nam'],
                   'kolicina_svake_nam_u_g' =>$kolicinaNamirnice
               ]);
           }
           
        }
        return redirect()->to('user/Dailylogcontroller/dailyLog');
        
    }
    
    
    public function waterInput(){
        helper(['form']);
        date_default_timezone_set("Europe/Belgrade");
        if(array_key_exists('acceptbtn', $_POST)) {
           $unosVodeM = new \App\Models\UnosVodeModel();
           $timeDate = date("Y-m-d H-i-s");
           $unosVodeM->save([
              'id_kor'=>session("id"),
               'datum'=>$timeDate,
               'kolicina'=>$this->request->getVar('water')
           ]);
        }
        return redirect()->to('user/Dailylogcontroller/dailyLog');
    }
}
