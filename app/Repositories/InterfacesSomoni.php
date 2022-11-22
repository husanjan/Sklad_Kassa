<?php

namespace App\Repositories;
use App\Models\FondMoney;
use App\Models\Oborot;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;
use App\Models\SprEds;
 class InterfacesSomoni
{
  

      private $DBMoney;
      public $Tableoborot=[];
      public  $arr=[];
      public  $arrInsertOborot=[];
      public  $arrInsertOborotTanga=[];
      public function __construct(FondMoney $DBMoney)
      {
          $this->DBMoney = $DBMoney;
         
      }
      public   function Spreds($id)
      {
          $dbSpr= SprEds::where('id',$id)->first();
          return json_decode($dbSpr,true)['kol'];
      }

      public     function  AddInsertnepolOborotTanga($safe,$nominal,$edin,$kol,$shkaf,$qator,$cell,$ip,$date,$priznak,$farsuda,$src,$ndoc,$code_oper,$user,$summa,$comment,$account_id_out)
      {
        
         if($summa>0 &&$edin>0   &&  $shkaf>0 &&  $qator>0 &&  $cell>0)
            {
        
             $addOne['naminal']= $nominal;
            // $addOne['safe_id']= $safe;
             $addOne['kol']= $kol;
          
     
      
             $addOne['date']= $date;
             if($priznak==0)
             {
               $addOne['priznak']=1;
             }
             if($priznak==1)
             {
               $addOne['priznak']=0;
             }
             //$addOne['priznak']= $priznak;
            // $addOne['type']= $farsuda;
             $addOne['src']=$account_id_out;
            // $addOne['account_id_in']= $src;
             $addOne['n_doc']= $ndoc;
             $addOne['kod_oper']=$code_oper;
             $addOne['summa']= $summa;
             $addOne['comment']=$comment;
             $addOne['user_id']= $user;
             $addOne['host'] = $ip;
                                                       
             array_push($this->arrInsertOborotTanga, $addOne);
             //   echo "sdd<pre>";
             //  print_r($addOne);
             //   echo "</pre>";
              //  Oborot::create($addOne);                              //  FondMoney::create($addOnesp);
         ///  array_push($this->arrInsertOborot, $addOne);                            // $this->DBMoney::create($addOnesp);
         return   $this->arrInsertOborotTanga;
             }

           
          }


      //  tanga

      public    function OborotInsertTanga($edin,$count,$safe_id,$shaving,$qator_id,$cells,$nominal,$date,$priznak,$kode_oper,$farsuda,$src,$ndoc,$summacounts,$comment,$user_id,$ip,$account_id_out)
      {

         
        if(array_values($edin)[0]>0 && array_values($count)[0] && array_values($safe_id)[0] && array_values($shaving)[0] && array_values($qator_id)[0] && array_values($cells)[0])
                {

                           $Somoni['nominal']=array_values($nominal);
                           $Somoni['ed_id']=array_values($edin);
                           $Somoni['kol']=array_values($count);
                           $Somoni['safe_id']=array_values($safe_id);
                           $Somoni['shkaf_id']=array_values($shaving);
                           $Somoni['qator_id']=array_values($shaving);
                           $Somoni['cell_id']=array_values($cells);
                           if(count(array_values($Somoni['ed_id']))===count(array_values($Somoni['kol']))   AND count(array_values($Somoni['safe_id']))==count(array_values($Somoni['cell_id'])) AND count(array_values($Somoni['shkaf_id']))===count(array_values($Somoni['qator_id'])))
                           {  

                            foreach($Somoni['ed_id'] AS $edin=>$values)
                                 {
                                  // $addOne['ed_id']= $Somoni['ed_id'][$edin];
                                  $addOne['naminal']= array_values($nominal)[0];
                                  // $addOne['safe_id']= $Somoni['safe_id'][$edin];
                                  // $addOne['kol']= $Somoni['kol'][$edin];
                                  // $addOne['shkaf_id']= $Somoni['shkaf_id'][$edin];
                                  // $addOne['qator_id']= $Somoni['qator_id'][$edin];
                                  // $addOne['cell_id']= $Somoni['cell_id'][$edin];
                                  $addOne['date']= $date;
                                  if($priznak==1)
                                  {
                                    $addOne['priznak']=0;
                                  }
                                  if($priznak==0)
                                  {
                                    $addOne['priznak']=1;
                                  }
                             
                                 // $addOne['type']= $farsuda;
                                  $addOne['src']=$account_id_out;
                                  //$addOne['account_id_in']= $src;
                                  $addOne['n_doc']= $ndoc;
                                  $addOne['kod_oper']=$kode_oper;
                                  $addOne['summa']= array_values($nominal)[0]*$this->Spreds($Somoni['ed_id'][$edin])*$Somoni['kol'][$edin];
                                  $addOne['comment']=$comment;
                                  $addOne['user_id']= $user_id;
                                  $addOne['host'] = $ip;
                                 // return   $addOne;
                               //  return $addOne;
                               
                                 array_push($this->arrInsertOborotTanga, $addOne);
                                 
                              // $db= Oborot::create($addOne);
                            
                                }
                              
                                return $this->arrInsertOborotTanga;
                          }
              

               }
              
      }

// end tanga

      function OborotInserttoOborot($request)
      {
        //$request->request->remove('kode_oper');
         $account = $request->all();
        //  $inc=$account['kod_oper'];
         $date=date($account['date'].' '.'H:i:s.u ');
          foreach ($request->nominal AS $nominal=>$value)
          {
            $account['nominal']=$value;
             $account['date']=  $date;
          //  $account['kod_oper']=$inc;
            $account['summa']=$request->summa[$nominal];
            $account['user_id'] = Auth::id();
            $account['comment'] = $request->comment;
            $account['host'] = $request->ip();
                //$account['host'] = $request->ip();
          Oborot::create($account);
            //  echo "s<pre>";
            //  print_r($account);
            //  echo "</pre>";
           // $this->Tableoborot=$account;
           // array_push($this->Tableoborot, $account);
          }
          return   $this->Tableoborot;
      }
      //in Oborot to korshoyam insert
      public  function oborotInsertKorshoyam($request)
      {
        
           $request->merge(['src' => $request->account_id_out]);
           $request->merge(['type' => $request->account_id_in]);
           $request->merge(['naminal' => $request->nominal]);
           $request->request->remove('kod_oper');
           $request->request->remove('account_id_out');
           $request->request->remove('account_id_in');
           $request->request->remove('nominal');
           $request->request->remove('bik');
          $account = $request->all();

          $inc=$account['kode_oper'];
          $date=date($account['date'].' '.'H:i:s.u ');

          foreach ($request->naminal AS $nominal=>$value)
          {
            $account['naminal']=$value;
            $account['ed_id']=1;
             $account['date']=  $date;
        
            $account['summa']=$request->summa[$nominal];
            $account['user_id'] = Auth::id();
            $account['comment'] = $request->comment;
            $account['host'] = $request->ip();
             $account['kol'] = 1;
       // FondMoney::create($account);
            //  echo "s<pre>";
            //  print_r($account);
            //  echo "</pre>";
          }
      } 
      public     function  AddInsertnepolOborot($safe,$nominal,$edin,$kol,$shkaf,$qator,$cell,$ip,$date,$priznak,$farsuda,$src,$ndoc,$code_oper,$user,$summa,$comment,$account_id_out)
                    {
                      
                       if($summa>0 &&$edin>0   &&  $shkaf>0 &&  $qator>0 &&  $cell>0)
                          {
                           $addOne['ed_id']= $edin;
                           $addOne['nominal']= $nominal;
                           $addOne['safe_id']= $safe;
                           $addOne['kol']= $kol;
                           $addOne['shkaf_id']= $shkaf;
                           $addOne['qator_id']= $qator;
                           $addOne['cell_id']= $cell;
                           $addOne['date']= $date;
                           if($priznak==0)
                           {
                             $addOne['priznak']=1;
                           }
                           if($priznak==1)
                           {
                             $addOne['priznak']=0;
                           }
                           //$addOne['priznak']= $priznak;
                          // $addOne['type']= $farsuda;
                           $addOne['account_id_out']=$account_id_out;
                           $addOne['account_id_in']= $src;
                           $addOne['n_doc']= $ndoc;
                           $addOne['kod_oper']=$code_oper;
                           $addOne['summa']= $summa;
                           $addOne['comment']=$comment;
                           $addOne['user_id']= $user;
                           $addOne['host'] = $ip;
                                                                     
                           array_push($this->arrInsertOborot, $addOne);
                           //   echo "sdd<pre>";
                           //  print_r($addOne);
                           //   echo "</pre>";
                            //  Oborot::create($addOne);                              //  FondMoney::create($addOnesp);
                       ///  array_push($this->arrInsertOborot, $addOne);                            // $this->DBMoney::create($addOnesp);
                       return   $this->arrInsertOborot;
                           }

                         
                        }
      public    function OborotInsert($edin,$count,$safe_id,$shaving,$qator_id,$cells,$nominal,$date,$priznak,$kode_oper,$farsuda,$src,$ndoc,$summacounts,$comment,$user_id,$ip,$account_id_out)
      {

         
        if(array_values($edin)[0]>0 && array_values($count)[0] && array_values($safe_id)[0] && array_values($shaving)[0] && array_values($qator_id)[0] && array_values($cells)[0])
                {

                           $Somoni['nominal']=array_values($nominal);
                           $Somoni['ed_id']=array_values($edin);
                           $Somoni['kol']=array_values($count);
                           $Somoni['safe_id']=array_values($safe_id);
                           $Somoni['shkaf_id']=array_values($shaving);
                           $Somoni['qator_id']=array_values($shaving);
                           $Somoni['cell_id']=array_values($cells);
                           if(count(array_values($Somoni['ed_id']))===count(array_values($Somoni['kol']))   AND count(array_values($Somoni['safe_id']))==count(array_values($Somoni['cell_id'])) AND count(array_values($Somoni['shkaf_id']))===count(array_values($Somoni['qator_id'])))
                           {  

                            foreach($Somoni['ed_id'] AS $edin=>$values)
                                 {
                                  $addOne['ed_id']= $Somoni['ed_id'][$edin];
                                  $addOne['nominal']= array_values($nominal)[0];
                                  $addOne['safe_id']= $Somoni['safe_id'][$edin];
                                  $addOne['kol']= $Somoni['kol'][$edin];
                                  $addOne['shkaf_id']= $Somoni['shkaf_id'][$edin];
                                  $addOne['qator_id']= $Somoni['qator_id'][$edin];
                                  $addOne['cell_id']= $Somoni['cell_id'][$edin];
                                  $addOne['date']= $date;
                                  if($priznak==1)
                                  {
                                    $addOne['priznak']=0;
                                  }
                                  if($priznak==0)
                                  {
                                    $addOne['priznak']=1;
                                  }
                             
                                 // $addOne['type']= $farsuda;
                                  $addOne['account_id_out']=$account_id_out;
                                  $addOne['account_id_in']= $src;
                                  $addOne['n_doc']= $ndoc;
                                  $addOne['kod_oper']=$kode_oper;
                                  $addOne['summa']= array_values($nominal)[0]*$this->Spreds($Somoni['ed_id'][$edin])*$Somoni['kol'][$edin];
                                  $addOne['comment']=$comment;
                                  $addOne['user_id']= $user_id;
                                  $addOne['host'] = $ip;
                                 // return   $addOne;
                               //  return $addOne;
                               
                                 array_push($this->arrInsertOborot, $addOne);
                                 
                              // $db= Oborot::create($addOne);
                            
                                }
                              
                                return $this->arrInsertOborot;
                          }
              

               }
              
      }
 
      public    function allInsertDB($edin,$count,$safe_id,$shaving,$qator_id,$cells,$nominal,$date,$priznak,$kode_oper,$farsuda,$src,$ndoc,$summacounts,$comment,$user_id,$ip)
          {
         
            // $Spreds=$this->Spreds();
                   
                   
            if(array_values($edin)[0]>0 && array_values($count)[0] && array_values($safe_id)[0] && array_values($shaving)[0] && array_values($qator_id)[0] && array_values($cells)[0])
                    {

                               $Somoni['nominal']=array_values($nominal);
                               $Somoni['ed_id']=array_values($edin);
                               $Somoni['kol']=array_values($count);
                               $Somoni['safe_id']=array_values($safe_id);
                               $Somoni['shkaf_id']=array_values($shaving);
                               $Somoni['qator_id']=array_values($shaving);
                               $Somoni['cell_id']=array_values($cells);
                               if(count(array_values($Somoni['ed_id']))===count(array_values($Somoni['kol']))   AND count(array_values($Somoni['safe_id']))==count(array_values($Somoni['cell_id'])) AND count(array_values($Somoni['shkaf_id']))===count(array_values($Somoni['qator_id'])))
                               {

                                foreach($Somoni['ed_id'] AS $edin=>$values)
                                     {
                                      $addOne['ed_id']= $Somoni['ed_id'][$edin];
                                      $addOne['naminal']= array_values($nominal)[0];
                                      $addOne['safe_id']= $Somoni['safe_id'][$edin];
                                      $addOne['kol']= $Somoni['kol'][$edin];
                                      $addOne['shkaf_id']= $Somoni['shkaf_id'][$edin];
                                      $addOne['qator_id']= $Somoni['qator_id'][$edin];
                                      $addOne['cell_id']= $Somoni['cell_id'][$edin];
                                      $addOne['date']= $date;
                                      $addOne['priznak']= $priznak;
                                      $addOne['type']= $farsuda;
                                      $addOne['src']= $src;
                                      $addOne['n_doc']= $ndoc;
                                      $addOne['kode_oper']=$kode_oper;
                                     
                                      $addOne['summa']=  array_values($nominal)[0]*$this->Spreds($Somoni['ed_id'][$edin])*$Somoni['kol'][$edin];
                                      $addOne['comment']=$comment;
                                      $addOne['user_id']= $user_id;
                                      $addOne['host'] = $ip;
                                     // return   $addOne;
                                     //$this->DBMoney::create($addOne);
                                     
                                     
                                    /// $this->arr['status']=true;
                                     array_push($this->arr, $addOne);
                                  
                                   
                                     
 
                                    }
                                     
                              }
                            }
                              return $this->arr;
                         

                  

                  
          }


            //This function neplonoe
         public     function  AddInsertnepol($safe,$nominal,$edin,$kol,$shkaf,$qator,$cell,$ip,$date,$priznak,$farsuda,$src,$ndoc,$code_oper,$user,$summa,$comment)
                    {
                       if($summa>0 &&$edin>0   &&  $shkaf>0 &&  $qator>0 &&  $cell>0)
                          {
                                                                        $addOnesp['safe_id']=$safe;
                                                                         $addOnesp['naminal']=$nominal;
                                                                         $addOnesp['ed_id']=$edin;
                                                                         $addOnesp['kol']=$kol;
                                                                         $addOnesp['shkaf_id']=$shkaf;
                                                                         $addOnesp['qator_id']=$qator;
                                                                         $addOnesp['cell_id']=$cell;
                                                                         $addOnesp['host'] = $ip;
                                                                         $addOnesp['date']=$date;
                                                                         $addOnesp['priznak']=$priznak;
                                                                         $addOnesp['type']=$farsuda;
                                                                         $addOnesp['src']=$src;
                                                                         $addOnesp['n_doc']= $ndoc;
                                                                         $addOnesp['kode_oper']=$code_oper;
                                                                         $addOnesp['summa']=$summa;
                                                                         $addOnesp['comment']= $comment;
                                                                         $addOnesp['user_id']= $user;

                                                                        //   echo "<pre>";
                                                                        //  print_r($addOnesp);
                                                                        //   echo "</pre>";
                                                                        //  FondMoney::create($addOnesp);
                                                                       // $this->DBMoney::create($addOnesp);
                                                               //          echo "s<pre>";
                                                               //          print_r( $addOne);
                                                               //   echo "</pre>";
                                                               
                                                               array_push($this->arr,$addOnesp);
                                                                        return $this->arr;
                           }

                           return   "Error";
                        }
}
