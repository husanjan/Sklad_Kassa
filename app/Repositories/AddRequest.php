<?php 

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Repositories\InterfacesSomoni;

class AddRequest{

    private $blogRepository;
    public  $arr=[];
    public function __construct(InterfacesSomoni $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    
 public function ModaladdRequestsTanga($request)
 {
 
                 //One diram
      if($request->ed_idq>0)
      {

    
      $this->blogRepository->allInsertDB($request->ed_idq,$request->countq,$request->safe_idq,$request->shavingq,$request->qator_idq,
      $request->cellsq,$request->nominalq,
           $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                  $request->ndoc,$request->summacountsq,$request->comment,Auth::id(),$request->ip());
                //  end diram one
      }
    
     //Nepolnone 
     $addOneNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonqs,array_values($request->nominalq)[0],1,1,$request->shavingnepolniySomonqs,
     $request->qator_idnepolniySomonqs,$request->cellsnepolniySomonqs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
     $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouq,$request->comment);    
              //end 0.1 diram
                  // .0.5  somon
     if($request->ed_idp>0)
     { 
     $this->blogRepository->allInsertDB($request->ed_idp,$request->countp,$request->safe_idp,$request->shavingp,$request->qator_idp,
     $request->cellsp,$request->nominalp,
          $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsp,$request->comment,Auth::id(),$request->ip());
     }
               //0, 5 nepolnoe 
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonps,array_values($request->nominalp)[0],1,1,$request->shavingnepolniySomonps,
  $request->qator_idnepolniySomonps,$request->cellsnepolniySomonps,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoup,$request->comment);        
// ned 0.5 somon nepolnoe 
//      // .0.5 somon   дирам     
  // 10 diram 
   
  if($request->ed_id7>0)
  {  
  $this->blogRepository->allInsertDB($request->ed_id7,$request->count7,$request->safe_id7,$request->shaving7,$request->qator_id7,
  $request->cells7,$request->nominal7,
       $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
              $request->ndoc,$request->summacountsu,$request->comment,Auth::id(),$request->ip());
  }            
  //0.1 nepolnoe 
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon7s,array_values($request->nominal7)[0],1,1,$request->shavingnepolniySomon7s,
  $request->qator_idnepolniySomon7s,$request->cellsnepolniySomon7s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcou7,$request->comment);        
// ned 0.10 diram  nepolnoe 
//      // end 10diram    
                // ..0.20  дирам
             
                if($request->ed_idw>0)
      {  
                $this->blogRepository->allInsertDB($request->ed_idw,$request->countw,$request->safe_idw,$request->shavingw,$request->qator_idw,
                $request->cellsw,$request->nominalw,
                     $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                            $request->ndoc,$request->summacountsw,$request->comment,Auth::id(),$request->ip());
      }  
      
           //                     neplone
$addTwentyNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonws,array_values($request->nominalw)[0],1,1,$request->shavingnepolniySomonws,
$request->qator_idnepolniySomonws,$request->cellsnepolniySomonws,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouw,$request->comment);                    
   //      // ..0.20  дирам
     // ..0.25  дирам
   
     if($request->ed_idy>0)
     {  
     $this->blogRepository->allInsertDB($request->ed_idy,$request->county,$request->safe_idy,$request->shavingy,$request->qator_idy,
     $request->cellsy,$request->nominaly,
          $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsy,$request->comment,Auth::id(),$request->ip());
     }            
     //25 nepolnoe 
     $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonys,array_values($request->nominaly)[0],1,1,$request->shavingnepolniySomonys,
     $request->qator_idnepolniySomonys,$request->cellsnepolniySomonys,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
     $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouw,$request->comment);        
   // ned 25 nepolnoe 
//      // ..0.25   дирам

         
   
  // .0.50  somon
  if($request->ed_id4>0)
  { 
  $this->blogRepository->allInsertDB($request->ed_id4,$request->count4,$request->safe_id4,$request->shaving4,$request->qator_id4,
  $request->cells4,$request->nominal4,
       $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
              $request->ndoc,$request->summacounts4,$request->comment,Auth::id(),$request->ip());
  }
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon4s,array_values($request->nominal4)[0],1,1,$request->shavingnepolniySomon4s,
  $request->qator_idnepolniySomonps,$request->cellsnepolniySomonps,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoup,$request->comment);   

//      // 0.50 somon   дирам
  // 1 somon
   
  if($request->ed_idu>0)
  {  
  $this->blogRepository->allInsertDB($request->ed_idu,$request->countu,$request->safe_idu,$request->shavingu,$request->qator_idu,
  $request->cellsu,$request->nominalu,
       $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
              $request->ndoc,$request->summcouu,$request->comment,Auth::id(),$request->ip());
  }          
    
  //1 nepolnoe 
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonus,array_values($request->nominalu)[0],1,1,$request->shavingnepolniySomonus,
  $request->qator_idnepolniySomonus,$request->cellsnepolniySomonus,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouu,$request->comment);        
// ned .1 somon nepolnoe 
//      // ...1 somon
     // ..3  somon
     if($request->ed_idi>0)
     {  
     $this->blogRepository->allInsertDB($request->ed_idi,$request->counti,$request->safe_idi,$request->shavingi,$request->qator_idi,
     $request->cellsi,$request->nominali,
          $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsi,$request->comment,Auth::id(),$request->ip() );
     }
       
          //3 nepolnoe 
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonis,array_values($request->nominali)[0],1,1,$request->shavingnepolniySomonis,
  $request->qator_idnepolniySomonis,$request->cellsnepolniySomonis,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoui,$request->comment);        
// ned .3 somon nepolnoe 
            
        // end  3 nepolnoe 
//      // ..3 somon   дирам
     // ..5  somon
     if($request->ed_ido>0)
     { 
     $this->blogRepository->allInsertDB($request->ed_ido,$request->counto,$request->safe_ido,$request->shavingo,$request->qator_ido,
     $request->cellso,$request->nominalo,
          $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountso,$request->comment,Auth::id(),$request->ip());
     }
     
               //5 nepolnoe 
  $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonos,array_values($request->nominalo)[0],1,1,$request->shavingnepolniySomonos,
  $request->qator_idnepolniySomonos,$request->cellsnepolniySomonos,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
  $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouo,$request->comment);        
// ned .5 somon nepolnoe 
//      // ..5 somon   дирам
             //Razne Tanga
             if($request->safe_idrazned>0)
     { 
$razne= $this->blogRepository->AddInsertnepol($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summarazne,$request->comment,8);
     }
 
   //End 5 сомони Razne Tanga
 
  
return  $this->blogRepository->arr;
 
        
 }              


 

    public function  ModaladdRequestsOborottanga($request,$account_id_out)
    {

      //One diram
 //Nepolnone   One diram
 $addOneNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonqs,array_values($request->nominalq)[0],1,1,$request->shavingnepolniySomonqs,
 $request->qator_idnepolniySomonqs,$request->cellsnepolniySomonqs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
 $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouq,$request->comment,$account_id_out);    


      if($request->ed_idq>0)
      {

    
      $this->blogRepository->OborotInsertTanga($request->ed_idq,$request->countq,$request->safe_idq,$request->shavingq,$request->qator_idq,
      $request->cellsq,$request->nominalq,
           $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                  $request->ndoc,$request->summacountsq,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                //  end diram one
      }
           // .0.5  somon
     if($request->countp>0)
     { 
     $this->blogRepository->OborotInsertTanga($request->ed_idp,$request->countp,$request->safe_idp,$request->shavingp,$request->qator_idp,
     $request->cellsp,$request->nominalp,
          $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsp,$request->comment,Auth::id(),$request->ip(),$account_id_out);
     }
//      // .0.5 somon   дирам

           //0, 5 nepolnoe 
           $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonps,array_values($request->nominalp)[0],1,1,$request->shavingnepolniySomonps,
           $request->qator_idnepolniySomonps,$request->cellsnepolniySomonps,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
           $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoup,$request->comment,$account_id_out);        
           // ned 0.5 somon nepolnoe 


                      // ..0.10  дирам
                      if($request->ed_id7>0)
                      {  
                                $this->blogRepository->OborotInsertTanga($request->ed_id7,$request->count7,$request->safe_id7,$request->shaving7,$request->qator_id7,
                                $request->cells7,$request->nominal7,
                                     $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                                            $request->ndoc,$request->summacounts7,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                      }                     
                   //      // ..0.10  дирам
                   //0.10 nepolnoe 
$addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomon7s,array_values($request->nominal7)[0],1,1,$request->shavingnepolniySomon7s,
$request->qator_idnepolniySomon7s,$request->cellsnepolniySomon7s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou7,$request->comment,$account_id_out);        
// ned 0.10 diram  nepolnoe 

                // ..0.20  дирам
 if($request->ed_idw>0)
      {  
                $this->blogRepository->OborotInsertTanga($request->ed_idw,$request->countw,$request->safe_idw,$request->shavingw,$request->qator_idw,
                $request->cellsw,$request->nominalw,
                     $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                            $request->ndoc,$request->summacountsw,$request->comment,Auth::id(),$request->ip(),$account_id_out);
      }                     
   //      // ..0.20  дирам
        //                     neplone  ..0.20  дирам
        $addTwentyNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonws,array_values($request->nominalw)[0],1,1,$request->shavingnepolniySomonws,
        $request->qator_idnepolniySomonws,$request->cellsnepolniySomonws,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
        $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouw,$request->comment,$account_id_out);                    
       //  утв 20 diram 
     // ..0.25  дирам
     if($request->ed_idy>0)
     {  
     $this->blogRepository->OborotInsertTanga($request->ed_idy,$request->county,$request->safe_idy,$request->shavingy,$request->qator_idy,
     $request->cellsy,$request->nominaly,
          $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsy,$request->comment,Auth::id(),$request->ip(),$account_id_out);
     }             
//      // ..0.25   дирам
 //25 nepolnoe 
 $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonys,array_values($request->nominaly)[0],1,1,$request->shavingnepolniySomonys,
 $request->qator_idnepolniySomonys,$request->cellsnepolniySomonys,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
 $request->ndoc,$request->kode_oper,Auth::id(),$request->summcouw,$request->comment,$account_id_out);        
// ned 25 nepolnoe   

    // .0.50  somon
    if($request->ed_id4>0)
    { 
    $this->blogRepository->OborotInsertTanga($request->ed_id4,$request->count4,$request->safe_id4,$request->shaving4,$request->qator_id4,
    $request->cells4,$request->nominal4,
         $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                $request->ndoc,$request->summacounts4,$request->comment,Auth::id(),$request->ip(),$account_id_out);
    }

    $addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomon4s,array_values($request->nominal4)[0],1,1,$request->shavingnepolniySomon4s,
    $request->qator_idnepolniySomonps,$request->cellsnepolniySomonps,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
    $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoup,$request->comment,$account_id_out);   
    
//      // .0.50 somon   дирам
//1somoni 
if($request->ed_idu>0)
{  
$this->blogRepository->OborotInsertTanga($request->ed_idu,$request->countu,$request->safe_idu,$request->shavingu,$request->qator_idu,
$request->cellsu,$request->nominalu,
     $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
            $request->ndoc,$request->summcouu,$request->comment,Auth::id(),$request->ip(),$account_id_out);
}
//1 nepolnoe 
  $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonus,array_values($request->nominalu)[0],1,1,$request->shavingnepolniySomonus,
$request->qator_idnepolniySomonus,$request->cellsnepolniySomonus,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouu,$request->comment,$account_id_out);        
// ned .1 somon nepolnoe   


     // ..3  somon
     if($request->counti>0)
     {  
     $this->blogRepository->OborotInsertTanga($request->ed_idi,$request->counti,$request->safe_idi,$request->shavingi,$request->qator_idi,
     $request->cellsi,$request->nominali,
          $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountsi,$request->comment,Auth::id(),$request->ip(),$account_id_out);
     }
        //3 nepolnoe 
$addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonis,array_values($request->nominali)[0],1,1,$request->shavingnepolniySomonis,
$request->qator_idnepolniySomonis,$request->cellsnepolniySomonis,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoui,$request->comment,$account_id_out);        
// ned .3 somon nepolnoe 
//      // ..3 somon   дирам
     // ..5  somon
     if($request->counto>0)
     { 
     $this->blogRepository->OborotInsertTanga($request->ed_ido,$request->counto,$request->safe_ido,$request->shavingo,$request->qator_ido,
     $request->cellso,$request->nominalo,
          $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacountso,$request->comment,Auth::id(),$request->ip(),$account_id_out);
     }
      
    //5 nepolnoe 
$addTwentyFiveNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonos,array_values($request->nominalo)[0],1,1,$request->shavingnepolniySomonos,
$request->qator_idnepolniySomonos,$request->cellsnepolniySomonos,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouo,$request->comment,$account_id_out);        
// ned .5 somon nepolnoe 
//      // ..5 somon   дирам
             //Razne Tanga
             if($request->safe_idrazned>0)
     { 
$razne= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summarazne,$request->comment,8);
     }
 
     
   //End Razne Tanga
 
  
      








  




//      // 0.50 somon   дирам
          return  $this->blogRepository->arrInsertOborotTanga;
    }







    public function addRequestsOborottanga($request,$account_id_out)
    {
      $Onesomoni=$this->blogRepository->OborotInsertTanga($request->ed_id0,$request->count0,$request->safe_id0,$request->shaving0,$request->qator_id0,
      $request->cells0,$request->nominal0,
           $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                  $request->ndoc,$request->summacounts0,$request->comment,Auth::id(),$request->ip(),$account_id_out);
//                     neplone
      
      $addOneNeplan= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomon0s,array_values($request->nominal0)[0],1,1,$request->shavingnepolniySomon0s,
      $request->qator_idnepolniySomon0s,$request->cellsnepolniySomon0s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
      $request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou0,$request->comment,8);

//End OneSomoni
$threesomon= $this->blogRepository->OborotInsertTanga($request->ed_id3,$request->count3,$request->safe_id3,$request->shaving3,$request->qator_id3,
         $request->cells3,$request->nominal3,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
                 $request->src,$request->ndoc,$request->summacounts3,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                      //                     neplone
                    
$addneplonoeThree= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomon3s,array_values($request->nominal3)[0],1,1,$request->shavingnepolniySomon3s,
$request->qator_idnepolniySomon3s,$request->cellsnepolniySomon3s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou3,$request->comment,8);

       //         End  Еркуу Somoni
         //           Five Somoni
$Fivesomon= $this->blogRepository->OborotInsertTanga($request->ed_id5,$request->count5,$request->safe_id5,$request->shaving5,$request->qator_id5,
         $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
                 $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                
                      //                     neplone Five
$addneplonoeFive= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
$request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou5,$request->comment,8);
       //         End Five Somoni
 
 
$razne= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summarazne,$request->comment,8);
 
 




//   Diram   
//One  diram
$oneDiram= $this->blogRepository->OborotInsertTanga($request->ed_idg,$request->countg,$request->safe_idg,$request->shavingg,$request->qator_idg,
$request->cellsg,$request->nominalg,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsg,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone one diram,
$addneplonoeonedDiram= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomongs,array_values($request->nominalg)[0],1,1,$request->shavingnepolniySomongs,
$request->qator_idnepolniySomongs,$request->cellsnepolniySomongs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoug,$request->comment,8);
//End one diram




//Onehundred Somoni
$FivedDiram= $this->blogRepository->OborotInsertTanga($request->ed_idh,$request->counth,$request->safe_idh,$request->shavingh,$request->qator_idh,
$request->cellsh,$request->nominalh,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsh,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone Fivediram,
$addneplonoeFivedDiram= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonhs,array_values($request->nominalh)[0],1,1,$request->shavingnepolniySomonhs,
$request->qator_idnepolniySomonhs,$request->cellsnepolniySomonhs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouh,$request->comment,8);
//End Twenty  diram



//twentyhundred  
$TwentyDiram= $this->blogRepository->OborotInsertTanga($request->ed_idj,$request->countj,$request->safe_idj,$request->shavingj,$request->qator_idj,
$request->cellsj,$request->nominalj,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsj,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone Twenty
$addneplonoeTwentyDiram= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonjs,array_values($request->nominalj)[0],1,1,$request->shavingnepolniySomonjs,
$request->qator_idnepolniySomonjs,$request->cellsnepolniySomonjs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouj,$request->comment,8);
//End Twenty diram

//fiftyDiram  
$fiftyDiram= $this->blogRepository->OborotInsertTanga($request->ed_idk,$request->countk,$request->safe_idk,$request->shavingk,$request->qator_idk,
$request->cellsk,$request->nominalk,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsk,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone fiftyDiram
$addneplonoefiftyDiramDiram= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idnepolniySomonks,array_values($request->nominalk)[0],1,1,$request->shavingnepolniySomonks,
$request->qator_idnepolniySomonks,$request->cellsnepolniySomonks,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouk,$request->comment,8);
//End Twenty diram

          return  $this->blogRepository->arrInsertOborotTanga;
 


    }



    public function addRequestsOborot($request,$account_id_out)
    {
    $Onesomoni=$this->blogRepository->OborotInsert($request->ed_id0,$request->count0,$request->safe_id0,$request->shaving0,$request->qator_id0,
        $request->cells0,$request->nominal0,
             $request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,$request->src,
                    $request->ndoc,$request->summacounts0,$request->comment,Auth::id(),$request->ip(),$account_id_out);
//                     neplone
        
        $addOneNeplan= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomon0s,array_values($request->nominal0)[0],1,1,$request->shavingnepolniySomon0s,
        $request->qator_idnepolniySomon0s,$request->cellsnepolniySomon0s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
        $request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou0,$request->comment,8);

//End OneSomoni
$threesomon= $this->blogRepository->OborotInsert($request->ed_id3,$request->count3,$request->safe_id3,$request->shaving3,$request->qator_id3,
           $request->cells3,$request->nominal3,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
                   $request->src,$request->ndoc,$request->summacounts3,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                        //                     neplone
                      
$addneplonoeThree= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomon3s,array_values($request->nominal3)[0],1,1,$request->shavingnepolniySomon3s,
$request->qator_idnepolniySomon3s,$request->cellsnepolniySomon3s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou3,$request->comment,8);

         //         End  Еркуу Somoni
           //           Five Somoni
$Fivesomon= $this->blogRepository->OborotInsert($request->ed_id5,$request->count5,$request->safe_id5,$request->shaving5,$request->qator_id5,
           $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
                   $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip(),$account_id_out);
                  
                        //                     neplone Five
$addneplonoeFive= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
$request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcou5,$request->comment,8);
         //         End Five Somoni
      
      
      //           Ten Somoni
      $Tensomon= $this->blogRepository->OborotInsert($request->ed_idt,$request->countt,$request->safe_idt,$request->shavingt,$request->qator_idt,
      $request->cellst,$request->nominalt,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
              $request->src,$request->ndoc,$request->summacountst,$request->comment,Auth::id(),$request->ip(),$account_id_out);
             
                   //    neplone
$addneplonoeTen= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonts,array_values($request->nominalt)[0],1,1,$request->shavingnepolniySomonts,
$request->qator_idnepolniySomonts,$request->cellsnepolniySomonts,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcout,$request->comment,8);
    //         End Ten Somoni
     
  

//          Twenty Somoni
$Twentysomon= $this->blogRepository->OborotInsert($request->ed_idb,$request->countb,$request->safe_idb,$request->shavingb,$request->qator_idb,
$request->cellsb,$request->nominalb,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsb,$request->comment,Auth::id(),$request->ip(),$account_id_out);

 //    neplone Twenty
$addneplonoeTWenty= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonbs,array_values($request->nominalb)[0],1,1,$request->shavingnepolniySomonbs,
$request->qator_idnepolniySomonbs,$request->cellsnepolniySomonbs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoub,$request->comment,8);
//         End Twenty Somoni


//          Fifty Somoni
$fiftysomon= $this->blogRepository->OborotInsert($request->ed_idc,$request->countc,$request->safe_idc,$request->shavingc,$request->qator_idc,
$request->cellsc,$request->nominalc,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsc,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//    neplone Fifty
$addneplonoefifty= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomoncs,array_values($request->nominalc)[0],1,1,$request->shavingnepolniySomoncs,
$request->qator_idnepolniySomoncs,$request->cellsnepolniySomoncs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouc,$request->comment,8);
//         End Twenty Somoni


//          Onehundred Somoni
$Onehundredsomon= $this->blogRepository->OborotInsert($request->ed_idd,$request->countd,$request->safe_idd,$request->shavingd,$request->qator_idd,
$request->cellsd,$request->nominald,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsd,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//    neplone Onehundred
$addneplonoeOnehundred= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonds,array_values($request->nominald)[0],1,1,$request->shavingnepolniySomonds,
$request->qator_idnepolniySomonds,$request->cellsnepolniySomonds,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoud,$request->comment,8);
//         End Fifty Somoni
//          Onehundred Somoni
// $Onehundredsomon= $this->blogRepository->OborotInsert($request->ed_idd,$request->countd,$request->safe_idd,$request->shavingd,$request->qator_idd,
// $request->cellsd,$request->nominald,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
// $request->src,$request->ndoc,$request->summacountsd,$request->comment,Auth::id(),$request->ip(),$account_id_out);

   //    neplone Onehundred
// $addneplonoeOnehundred= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonds,array_values($request->nominalc)[0],1,1,$request->shavingnepolniySomonds,
// $request->qator_idnepolniySomonds,$request->cellsnepolniySomonds,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
// $request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoud,$request->comment,8);
//         End Onehundred Somoni


//Twohundred Somoni
$Twohundredsomon= $this->blogRepository->OborotInsert($request->ed_ide,$request->counte,$request->safe_ide,$request->shavinge,$request->qator_ide,
$request->cellse,$request->nominale,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountse,$request->comment,Auth::id(),$request->ip(),$account_id_out);

  //neplone Twohundred
$addneplonoeTwohundred= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomones,array_values($request->nominale)[0],1,1,$request->shavingnepolniySomones,
$request->qator_idnepolniySomones,$request->cellsnepolniySomones,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoue,$request->comment,8);
//End Twohunred Somoni


//Onehundred Somoni
$Fivehundredsomon= $this->blogRepository->OborotInsert($request->ed_idf,$request->countf,$request->safe_idf,$request->shavingf,$request->qator_idf,
$request->cellsf,$request->nominalf,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsf,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone Onehundred
  $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonfs,array_values($request->nominalf)[0],1,1,$request->shavingnepolniySomonfs,
$request->qator_idnepolniySomonfs,$request->cellsnepolniySomonfs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouf,$request->comment,8);
//End Twenty Somoni

$razne= $this->blogRepository->AddInsertnepolOborot($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summarazne,$request->comment,8);



//   Diram   
//One  diram
$oneDiram= $this->blogRepository->OborotInsert($request->ed_idg,$request->countg,$request->safe_idg,$request->shavingg,$request->qator_idg,
$request->cellsg,$request->nominalg,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsg,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone one diram,
$addneplonoeonedDiram= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomongs,array_values($request->nominalg)[0],1,1,$request->shavingnepolniySomongs,
$request->qator_idnepolniySomongs,$request->cellsnepolniySomongs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcoug,$request->comment,8);
//End one diram




//Onehundred Somoni
$FivedDiram= $this->blogRepository->OborotInsert($request->ed_idh,$request->counth,$request->safe_idh,$request->shavingh,$request->qator_idh,
$request->cellsh,$request->nominalh,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsh,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone Fivediram,
$addneplonoeFivedDiram= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonhs,array_values($request->nominalh)[0],1,1,$request->shavingnepolniySomonhs,
$request->qator_idnepolniySomonhs,$request->cellsnepolniySomonhs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouh,$request->comment,8);
//End Twenty  diram



//twentyhundred  
$TwentyDiram= $this->blogRepository->OborotInsert($request->ed_idj,$request->countj,$request->safe_idj,$request->shavingj,$request->qator_idj,
$request->cellsj,$request->nominalj,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsj,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone Twenty
$addneplonoeTwentyDiram= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonjs,array_values($request->nominalj)[0],1,1,$request->shavingnepolniySomonjs,
$request->qator_idnepolniySomonjs,$request->cellsnepolniySomonjs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouj,$request->comment,8);
//End Twenty diram

//fiftyDiram  
$fiftyDiram= $this->blogRepository->OborotInsert($request->ed_idk,$request->countk,$request->safe_idk,$request->shavingk,$request->qator_idk,
$request->cellsk,$request->nominalk,$request->date,$request->priznak,$request->kode_oper_obor,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsk,$request->comment,Auth::id(),$request->ip(),$account_id_out);

//neplone fiftyDiram
$addneplonoefiftyDiramDiram= $this->blogRepository->AddInsertnepolOborot($request->safe_idnepolniySomonks,array_values($request->nominalk)[0],1,1,$request->shavingnepolniySomonks,
$request->qator_idnepolniySomonks,$request->cellsnepolniySomonks,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summcouk,$request->comment,8);
//End Twenty diram

            return  $this->blogRepository->arrInsertOborot;

    }
    public function addRequests($request)
    {
   

        $Onesomoni=$this->blogRepository->allInsertDB($request->ed_id0,$request->count0,$request->safe_id0,$request->shaving0,$request->qator_id0,
        $request->cells0,$request->nominal0,
             $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                    $request->ndoc,$request->summacounts0,$request->comment,Auth::id(),$request->ip());
                 
                   
                    
                
//                     neplone
$addOneNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon0s,array_values($request->nominal0)[0],1,1,$request->shavingnepolniySomon0s,
$request->qator_idnepolniySomon0s,$request->cellsnepolniySomon0s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou0,$request->comment);
 

//End OneSomoni
$threesomon= $this->blogRepository->allInsertDB($request->ed_id3,$request->count3,$request->safe_id3,$request->shaving3,$request->qator_id3,
           $request->cells3,$request->nominal3,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                   $request->src,$request->ndoc,$request->summacounts3,$request->comment,Auth::id(),$request->ip());
               
                  // push($Onesomoni, $threesomon);
                //  $result = array_merge($Onesomoni,isset($threesomon));
                   
             // $things = [...$Onesomoni, ...array_filter($threesomon)];
              
           
             
               
              // return  [...$Onesomoni, ...$threesomon];
              
                        //                     neplone
$addneplonoeThree= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon3s,array_values($request->nominal3)[0],1,1,$request->shavingnepolniySomon3s,
$request->qator_idnepolniySomon3s,$request->cellsnepolniySomon3s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou3,$request->comment);

         //         End  Еркуу Somoni
           //           Five Somoni
$Fivesomon= $this->blogRepository->allInsertDB($request->ed_id5,$request->count5,$request->safe_id5,$request->shaving5,$request->qator_id5,
           $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                   $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip());
                  
                        //                     neplone Five
$addneplonoeFive= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
$request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou5,$request->comment);
         //         End Five Somoni
      
      
      //           Ten Somoni
      $Tensomon= $this->blogRepository->allInsertDB($request->ed_idt,$request->countt,$request->safe_idt,$request->shavingt,$request->qator_idt,
      $request->cellst,$request->nominalt,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
              $request->src,$request->ndoc,$request->summacountst,$request->comment,Auth::id(),$request->ip());
             
                   //    neplone
$addneplonoeTen= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonts,array_values($request->nominalt)[0],1,1,$request->shavingnepolniySomonts,
$request->qator_idnepolniySomonts,$request->cellsnepolniySomonts,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcout,$request->comment);
    //         End Ten Somoni
     
  

//          Twenty Somoni
$Twentysomon= $this->blogRepository->allInsertDB($request->ed_idb,$request->countb,$request->safe_idb,$request->shavingb,$request->qator_idb,
$request->cellsb,$request->nominalb,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsb,$request->comment,Auth::id(),$request->ip());

 //    neplone Twenty
$addneplonoeTWenty= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonbs,array_values($request->nominalb)[0],1,1,$request->shavingnepolniySomonbs,
$request->qator_idnepolniySomonbs,$request->cellsnepolniySomonbs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoub,$request->comment);
//         End Twenty Somoni


//          Fifty Somoni
$fiftysomon= $this->blogRepository->allInsertDB($request->ed_idc,$request->countc,$request->safe_idc,$request->shavingc,$request->qator_idc,
$request->cellsc,$request->nominalc,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsc,$request->comment,Auth::id(),$request->ip());

//    neplone Fifty
$addneplonoefifty= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomoncs,array_values($request->nominalc)[0],1,1,$request->shavingnepolniySomoncs,
$request->qator_idnepolniySomoncs,$request->cellsnepolniySomoncs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouc,$request->comment);
//         End Twenty Somoni


//          Onehundred Somoni
$Onehundredsomon= $this->blogRepository->allInsertDB($request->ed_idd,$request->countd,$request->safe_idd,$request->shavingd,$request->qator_idd,
$request->cellsd,$request->nominald,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsd,$request->comment,Auth::id(),$request->ip());

//    neplone Onehundred
$addneplonoeOnehundred= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonds,array_values($request->nominald)[0],1,1,$request->shavingnepolniySomonds,
$request->qator_idnepolniySomonds,$request->cellsnepolniySomonds,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoud,$request->comment);
//         End Fifty Somoni
 

//Twohundred Somoni
$Twohundredsomon= $this->blogRepository->allInsertDB($request->ed_ide,$request->counte,$request->safe_ide,$request->shavinge,$request->qator_ide,
$request->cellse,$request->nominale,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountse,$request->comment,Auth::id(),$request->ip());

  //neplone Twohundred
$addneplonoeTwohundred= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomones,array_values($request->nominale)[0],1,1,$request->shavingnepolniySomones,
$request->qator_idnepolniySomones,$request->cellsnepolniySomones,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoue,$request->comment);
//End Twohunred Somoni


//Onehundred Somoni
$Fivehundredsomon= $this->blogRepository->allInsertDB($request->ed_idf,$request->countf,$request->safe_idf,$request->shavingf,$request->qator_idf,
$request->cellsf,$request->nominalf,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsf,$request->comment,Auth::id(),$request->ip());

//neplone Onehundred
 $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonfs,array_values($request->nominalf)[0],1,1,$request->shavingnepolniySomonfs,
$request->qator_idnepolniySomonfs,$request->cellsnepolniySomonfs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouf,$request->comment);
//End Twenty Somoni

$razne= $this->blogRepository->AddInsertnepol($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summarazne,$request->comment);



//   Diram   
//One  diram
$oneDiram= $this->blogRepository->allInsertDB($request->ed_idg,$request->countg,$request->safe_idg,$request->shavingg,$request->qator_idg,
$request->cellsg,$request->nominalg,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsg,$request->comment,Auth::id(),$request->ip());

//neplone one diram,
$addneplonoeonedDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomongs,array_values($request->nominalg)[0],1,1,$request->shavingnepolniySomongs,
$request->qator_idnepolniySomongs,$request->cellsnepolniySomongs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoug,$request->comment);
//End one diram




//Onehundred Somoni
$FivedDiram= $this->blogRepository->allInsertDB($request->ed_idh,$request->counth,$request->safe_idh,$request->shavingh,$request->qator_idh,
$request->cellsh,$request->nominalh,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsh,$request->comment,Auth::id(),$request->ip());

//neplone Fivediram,
$addneplonoeFivedDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonhs,array_values($request->nominalh)[0],1,1,$request->shavingnepolniySomonhs,
$request->qator_idnepolniySomonhs,$request->cellsnepolniySomonhs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouh,$request->comment);
//End Twenty  diram



//twentyhundred  
$TwentyDiram= $this->blogRepository->allInsertDB($request->ed_idj,$request->countj,$request->safe_idj,$request->shavingj,$request->qator_idj,
$request->cellsj,$request->nominalj,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsj,$request->comment,Auth::id(),$request->ip());

//neplone Twenty
$addneplonoeTwentyDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonjs,array_values($request->nominalj)[0],1,1,$request->shavingnepolniySomonjs,
$request->qator_idnepolniySomonjs,$request->cellsnepolniySomonjs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouj,$request->comment);
//End Twenty diram

//fiftyDiram  
$fiftyDiram= $this->blogRepository->allInsertDB($request->ed_idk,$request->countk,$request->safe_idk,$request->shavingk,$request->qator_idk,
$request->cellsk,$request->nominalk,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsk,$request->comment,Auth::id(),$request->ip());

//neplone fiftyDiram
$addneplonoefiftyDiramDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonks,array_values($request->nominalk)[0],1,1,$request->shavingnepolniySomonks,
$request->qator_idnepolniySomonks,$request->cellsnepolniySomonks,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouk,$request->comment);
//End Twenty diram
        return  $this->blogRepository->arr;
 }

 public function addRequestsTanga($request)
 {


     $Onesomoni=$this->blogRepository->allInsertDB($request->ed_id0,$request->count0,$request->safe_id0,$request->shaving0,$request->qator_id0,
     $request->cells0,$request->nominal0,
          $request->date,$request->priznak,$request->kode_oper,$request->farsuda,$request->src,
                 $request->ndoc,$request->summacounts0,$request->comment,Auth::id(),$request->ip());
              
                
                 
             
//                     neplone
$addOneNeplan= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon0s,array_values($request->nominal0)[0],1,1,$request->shavingnepolniySomon0s,
$request->qator_idnepolniySomon0s,$request->cellsnepolniySomon0s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou0,$request->comment);


//End OneSomoni
$threesomon= $this->blogRepository->allInsertDB($request->ed_id3,$request->count3,$request->safe_id3,$request->shaving3,$request->qator_id3,
        $request->cells3,$request->nominal3,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                $request->src,$request->ndoc,$request->summacounts3,$request->comment,Auth::id(),$request->ip());
            
               // push($Onesomoni, $threesomon);
             //  $result = array_merge($Onesomoni,isset($threesomon));
                
          // $things = [...$Onesomoni, ...array_filter($threesomon)];
           
        
          
            
           // return  [...$Onesomoni, ...$threesomon];
           
                     //                     neplone
$addneplonoeThree= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon3s,array_values($request->nominal3)[0],1,1,$request->shavingnepolniySomon3s,
$request->qator_idnepolniySomon3s,$request->cellsnepolniySomon3s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou3,$request->comment);

      //         End  Еркуу Somoni
        //           Five Somoni
$Fivesomon= $this->blogRepository->allInsertDB($request->ed_id5,$request->count5,$request->safe_id5,$request->shaving5,$request->qator_id5,
        $request->cells5,$request->nominal5,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
                $request->src,$request->ndoc,$request->summacounts5,$request->comment,Auth::id(),$request->ip());
               
                     //                     neplone Five
$addneplonoeFive= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomon5s,array_values($request->nominal5)[0],1,1,$request->shavingnepolniySomon5s,
$request->qator_idnepolniySomon5s,$request->cellsnepolniySomon5s,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcou5,$request->comment);
      //         End Five Somoni
   
   
 
  

//   Diram   
//One  diram
$oneDiram= $this->blogRepository->allInsertDB($request->ed_idg,$request->countg,$request->safe_idg,$request->shavingg,$request->qator_idg,
$request->cellsg,$request->nominalg,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsg,$request->comment,Auth::id(),$request->ip());

//neplone one diram,
$addneplonoeonedDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomongs,array_values($request->nominalg)[0],1,1,$request->shavingnepolniySomongs,
$request->qator_idnepolniySomongs,$request->cellsnepolniySomongs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcoug,$request->comment);
//End one diram




//Onehundred Somoni
$FivedDiram= $this->blogRepository->allInsertDB($request->ed_idh,$request->counth,$request->safe_idh,$request->shavingh,$request->qator_idh,
$request->cellsh,$request->nominalh,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsh,$request->comment,Auth::id(),$request->ip());

//neplone Fivediram,
$addneplonoeFivedDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonhs,array_values($request->nominalh)[0],1,1,$request->shavingnepolniySomonhs,
$request->qator_idnepolniySomonhs,$request->cellsnepolniySomonhs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouh,$request->comment);
//End Twenty  diram



//twentyhundred  
$TwentyDiram= $this->blogRepository->allInsertDB($request->ed_idj,$request->countj,$request->safe_idj,$request->shavingj,$request->qator_idj,
$request->cellsj,$request->nominalj,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsj,$request->comment,Auth::id(),$request->ip());

//neplone Twenty
$addneplonoeTwentyDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonjs,array_values($request->nominalj)[0],1,1,$request->shavingnepolniySomonjs,
$request->qator_idnepolniySomonjs,$request->cellsnepolniySomonjs,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouj,$request->comment);
//End Twenty diram

//fiftyDiram  
$fiftyDiram= $this->blogRepository->allInsertDB($request->ed_idk,$request->countk,$request->safe_idk,$request->shavingk,$request->qator_idk,
$request->cellsk,$request->nominalk,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
$request->src,$request->ndoc,$request->summacountsk,$request->comment,Auth::id(),$request->ip());

//neplone fiftyDiram
$addneplonoefiftyDiramDiram= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonks,array_values($request->nominalk)[0],1,1,$request->shavingnepolniySomonks,
$request->qator_idnepolniySomonks,$request->cellsnepolniySomonks,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summcouk,$request->comment);
//End Twenty diram
$razne= $this->blogRepository->AddInsertnepol($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper,Auth::id(),$request->summarazne,$request->comment);
     return  $this->blogRepository->arr;
} 


//Tnaga Oborot function add insert function '
    public function AddInsertOborotTanga($request)
    {
     
        //One diram 
          if($request->summaTangaOne>0)
              {
             
                echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaOne,$request->bik,
              $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominaOneD,$request->ip(),Auth::id());
               
          }
          //end one diram
           //  Five  diram
          if($request->summaTangaFive>0)
          {
            echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaFive,$request->bik,
          $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalFiveD,$request->ip(),Auth::id());
           
      } //end Five  diram
       //  Ten  diram
      if($request->summaTangaTenD>0)
      {
      echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaTenD,$request->bik,
      $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalTenD,$request->ip(),Auth::id());
        }
        //    end  Ten  diram
               //  Twinty  diram
      if($request->summaTangaTwinty>0)
      {
        echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaTwinty,$request->bik,
      $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalTwentyD,$request->ip(),Auth::id());
        }
        //    end  Twinty  diram
                       //  TwintyFive  diram
      if($request->summaTangaTwintyFive>0)
      {
        echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaTwintyFive,$request->bik,
      $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalTwintyFive,$request->ip(),Auth::id());
        }
        //    end    TwintyFive diram
                               //  Fifty  diram
      if($request->summaTangaFifty>0)
      {
        echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaFifty,$request->bik,
      $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalFifty,$request->ip(),Auth::id());
        }
        //    end  Fifty  diram

                                     //  One somoni  diram
        if($request->summaTangaOneS>0)
          {
            echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaOneS,$request->bik,
              $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalOneS,$request->ip(),Auth::id());
            }
        //    end  Three somoni   diram

         if($request->summaTangaThrees>0)
            {
              echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaThrees,$request->bik,
            $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalThrees,$request->ip(),Auth::id());
            }
     //    end  Three somoni   diram          
     if($request->summaTangaFiveS>0)
     {
   
      echo  "<br>".$this->blogRepository->OborotTangaInsert($request->kod_oper,$request->summaTangaFiveS,$request->bik,
     $request->n_doc,$request->priznak,$request->date,$request->account_id_in,  $request->comment, $request->nominalFiveS,$request->ip(),Auth::id());
     }
//    end  Three somoni   diram                              
      }
      public function Fondostatki($money,$key)
    {
               $array=[];
          //    $key_array=[];
          //    $naminal_array=[];
          $ids = array_column($money, 'naminal');
          $ids = array_unique($ids);
          $result = array();
          foreach($money as $value){
            $result[$value['cell_id']][]=$value;
            if(in_array($value['cell_id'],$result))
           {
              
             $result[$value['cell_id']][]=$value;
           }
          
                //  $results = array_reduce($result, function($temp, $item){
        //     isset($temp[$item['naminal']])
        //        ? $temp[$item['naminal']]['summa']+=$item['summa']
        //        : $temp[$item['naminal']] = $item;
        //     return $temp;
        // }, []);
          
          }
                 foreach( $result AS $res):
               
                 $array[]= array_reduce($res, function($temp, $item){
                  isset($temp[$item['naminal']])
                     ? $temp[$item['naminal']]['summa'] += $item['summa']
                     : $temp[$item['naminal']] = $item;
                  return $temp;
              }, []);
                  
                 endforeach;
                 return $array;
        //return $result;

    //$results= array_unique($money);
      
//       foreach ($money as $agentInfo) {

//     // create new item in result array if pair 'id'+'name' not exists
//     if (!isset($sumArray[$agentInfo[$key]])) {
//         $sumArray[$agentInfo[$key]] = $agentInfo;
//     } else {
//         // apply sum to existing element otherwise
//         $sumArray[$agentInfo[$key]]['summa'] += $agentInfo['summa'];
//     }
// }
//          return $sumArray;
                  
     }
}