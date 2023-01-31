<?php 
namespace App\Repositories;
use App\Models\Oborot;
use App\Models\SprAccounts;
use App\Models\FondMoney;
use App\Models\SprBank;
use App\Models\SprEds;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\sprQators;
use App\Models\SprCells;
use App\Models\oborots_coin;
use App\Models\ostatki_safe;
use App\Repositories\InterfacesSomoni;
use App\Repositories\AddRequest;
use App\Repositories\RepositoryRashod;
use Illuminate\Support\Facades\DB;
use App\Models\FondCoins;

use App\Models\FondEmisions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class Repositoryschet{

   private  $FondEmisions;
   private  $Fond;
   private  $FondMoney;
   private  $FondEmisionsArray=[];
   private  $FondKorshoyamArray=[];
   private  $FondFarsudaamArray=[];
   private  $FondBotilshudaamArray=[];
   private  $FondOborotArray=[];
   public  function __construct(FondEmisions $FondEmisions,FondMoney $FondMoney)
  {
    $this->FondEmisions=$FondEmisions;
    $this->FondMoney=$FondMoney;
  }
    public function ToDateFondEmisions($request)
    {
        // ::select('date,src,priznak,summa')

        if($request->startDate &&$request->EndDate):
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=1;
            $FondEmisionsRashod=$this->FondEmisions->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->where('priznak',1)->get()->sum('summa');
            $FondEmisionsPrihod=$this->FondEmisions->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->sum('summa');
        
        endif;  
        // print_r([$request->startDate,$request->EndDate]);
        if($request->dayType):
              $typeDate=0;
            $FondEmisionsRashod=$this->FondEmisions->where('date','>=',$request->dayType." 00:00:00")->where('priznak',1)->sum('summa');
            $FondEmisionsPrihod=$this->FondEmisions->where('date','>=',$request->dayType." 00:0:00")->sum('summa');
            $startDate=$request->dayType;
            $EndDate=$request->dayType;
        
        endif;  

        $this->Fond[7]['date']=date('Y-m-d');
        $this->Fond[7]['src']=7;
        $this->Fond[7]['priod']=$EndDate;
        $this->Fond[7]['ostatka_start']=0;
        $this->Fond[7]['Prikhod']=$FondEmisionsPrihod;
        $this->Fond[7]['Raskhod']=$FondEmisionsRashod;
        $this->Fond[7]['ostatka_end']=$FondEmisionsPrihod-$FondEmisionsRashod;
        $this->Fond[7]['type']=$typeDate;
        $this->Fond[7]['user_id']= Auth::id();
        $this->Fond[7]['host']=$request->ip();
     
        //    $this->arraySchet['priod']=1;
         // $FondEmisions->where('priznak',0)->sum('summa');
         
         return True;
    }
    public function ToDateFond($request,$src)
    { 
         
       
        if($request->startDate &&$request->EndDate):
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=1;
            $Prihod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->where('type',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->where('type',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
        if($request->dayType):
            $typeDate=0;
            $Rashod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',1)->sum('summa');
            $Prihod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',0)->sum('summa');
       
            $EndDate=$request->dayType;
        
        endif; 
       
        if($Prihod>0):
         $this->Fond[$src]['date']=date('Y-m-d');
         $this->Fond[$src]['src']=$src;
         $this->Fond[$src]['priod']=$EndDate;
         $this->Fond[$src]['ostatka_start']=0;
         $this->Fond[$src]['Prikhod']=$Prihod;
         $this->Fond[$src]['Raskhod']=$Rashod;
         $this->Fond[$src]['ostatka_end']=$Prihod-$Rashod;
         $this->Fond[$src]['type']=$typeDate;
         $this->Fond[$src]['user_id']= Auth::id();
         $this->Fond[$src]['host']=$request->ip();
        endif; 
        
    }
    public function ToDateFondCoins($request,$src)
    { 
         
       
        if($request->startDate &&$request->EndDate):
            $startDate=$request->startDate;
            $EndDate=$request->EndDate;
            $typeDate=1;
            $Prihod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->where('type',$src)->where('priznak',0)->get()->sum('summa');
            $Rashod=$this->FondMoney->whereBetween('date',[$request->startDate." 00:01:00",$request->EndDate." 23:59:59"])->where('type',$src)->where('priznak',1)->get()->sum('summa');
        endif; 
        if($request->dayType):
            $typeDate=0;
            $Rashod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',1)->sum('summa');
            $Prihod=$this->FondMoney->whereDate('date','>=',$request->dayType." 00:00:00")->where('type',$src)->where('priznak',0)->sum('summa');
       
            $EndDate=$request->dayType;
        
        endif; 
       
        if($Prihod>0):
         $this->Fond[$src]['date']=date('Y-m-d');
         $this->Fond[$src]['src']=$src;
         $this->Fond[$src]['priod']=$EndDate;
         $this->Fond[$src]['ostatka_start']=0;
         $this->Fond[$src]['Prikhod']=$Prihod;
         $this->Fond[$src]['Raskhod']=$Rashod;
         $this->Fond[$src]['ostatka_end']=$Prihod-$Rashod;
         $this->Fond[$src]['type']=$typeDate;
         $this->Fond[$src]['user_id']= Auth::id();
         $this->Fond[$src]['host']=$request->ip();
        endif; 
        
    }
    public function InsertOstatkiSchet()
    {
        return  $this->Fond;
    }


}