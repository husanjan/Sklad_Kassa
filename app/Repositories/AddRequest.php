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
 
if($request->src=='razne')
{
$razne= $this->blogRepository->AddInsertnepolOborotTanga($request->safe_idrazned,'razne',1,1,$request->shavingrazne,
$request->qator_idrazne,$request->cellsrazne,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
$request->ndoc,$request->kode_oper_obor,Auth::id(),$request->summarazne,$request->comment,8);
}
 




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
//          Onehundred Somoni
// $Onehundredsomon= $this->blogRepository->allInsertDB($request->ed_idd,$request->countd,$request->safe_idd,$request->shavingd,$request->qator_idd,
// $request->cellsd,$request->nominald,$request->date,$request->priznak,$request->kode_oper,$request->farsuda,
// $request->src,$request->ndoc,$request->summacountsd,$request->comment,Auth::id(),$request->ip());

   //    neplone Onehundred
// $addneplonoeOnehundred= $this->blogRepository->AddInsertnepol($request->safe_idnepolniySomonds,array_values($request->nominalc)[0],1,1,$request->shavingnepolniySomonds,
// $request->qator_idnepolniySomonds,$request->cellsnepolniySomonds,$request->ip(),$request->date,$request->priznak,$request->farsuda,$request->src,
// $request->ndoc,$request->kode_oper,Auth::id(),$request->summcoud,$request->comment);
//         End Onehundred Somoni


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
     return  $this->blogRepository->arr;
} 
    
}