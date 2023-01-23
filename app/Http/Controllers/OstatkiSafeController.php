<?php

namespace App\Http\Controllers;

use App\Models\Ostatki_safe;
use Illuminate\Http\Request;
use App\Models\SprSafes;
use App\Models\SprShkafs;
use App\Models\SprQators;
use App\Models\SprCells;
use App\Repositories\RepositoryRashod;
class OstatkiSafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $RepositoryRashod;
 
    public function __construct(RepositoryRashod $RepositoryRashod)
    {
        $this->middleware('auth');
 
        $this->RepositoryRashod = $RepositoryRashod;
    
    }
    public function index()
    {

        // $sprEds= SprEds::all();
        // $Oborot= new  Oborot();
        // $OborotTanga= new  oborots_coin();
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
         //SelectRashod($type,$priznak)
        $korshoyamRashod= $this->RepositoryRashod->SelectRashod(1,0);
        $farsudaRashod= $this->RepositoryRashod->SelectRashod(2,0);
        $botilshudaRas= $this->RepositoryRashod->SelectRashod(3,0);
        //tanga 
   
       $AllOstatki= $this->RepositoryRashod->SelectRashodAll(1,0);
       $farsudaTanga= $this->RepositoryRashod->SelectRashodTanga(2,0);
       $botilshudaTanga= $this->RepositoryRashod->SelectRashodTanga(3,0);
        $SprSafes= SprSafes::all();
      // $AllOstatki= array_merge($korshoyamRashod,$farsudaRashod,$botilshudaRas,$korshoyamTanga,$farsudaTanga,$botilshudaTanga);
        //exit;
        return   view('ostatki.safe.index',compact('SprSafes','AllOstatki','shkafs','sprQators','sprCells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        $shkafs = SprShkafs::all();
        $sprCells= SprCells::all();
        $sprQators= SprQators::all();
          //SelectRashod($type,$priznak)
        //   $korshoyamRashod= $this->RepositoryRashod->SelectRashod(1,0);
        //   $farsudaRashod= $this->RepositoryRashod->SelectRashod(2,0);
        //   $botilshudaRas= $this->RepositoryRashod->SelectRashod(3,0);
        //   //tanga 
     
        //  $korshoyamTanga= $this->RepositoryRashod->SelectRashodTanga(1,0);
        //  $farsudaTanga= $this->RepositoryRashod->SelectRashodTanga(2,0);
        //  $botilshudaTanga= $this->RepositoryRashod->SelectRashodTanga(3,0);
          $SprSafes= SprSafes::all();
        // $AllOstatki= array_merge($korshoyamRashod,$farsudaRashod,$botilshudaRas,$korshoyamTanga,$farsudaTanga,$botilshudaTanga);
         $AllOstatki= $this->RepositoryRashod->SelectRashodAll(1,0);
          //exit;
          $count=1;
            $request->cell;
       
           echo '<table class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>';
                //    if($request->shaving<=0):
                   echo'
                   <th scope="col">Шкаф</th>';
                //    endif;
                //    if($request->qator<=0):
                   echo'
                   <th scope="col">Ряд</th>';
                //    endif;
                //    if($request->cell<=0):
                   echo'
                   <th scope="col">Ячейка</th>';
                //    endif;
                   echo'
                   <th scope="col">Купюра</th>';
                   echo'
                   <th scope="col">Номинал</th>';
                   echo'
                   <th scope="col">Сумма</th>';
                echo  '
                 </tr>
               </thead>
               <tbody>';
          
               foreach ($AllOstatki as $AllOstatks):
                echo "<tr>";
                 //    to shkaf  nishon medihad
                if($AllOstatks->safe_id==$request->id_safe && $AllOstatks->summa>0 && $request->shaving<1 && $request->qator<1 && $request->cell<1):
                    
                    echo "<td>".$count++."</td>";
                    foreach($shkafs AS $shkaf):
                        if($shkaf->id==$AllOstatks->shkaf_id):
                              echo "<td>".$shkaf->shkaf."</td>";
                                     
                        endif;
                     
                    endforeach;
                
                    foreach($sprQators AS $sprQator):
                       if($sprQator->id==$AllOstatks->qator_id ):
                         echo "<td>".$sprQator->qator."</td>";
                        endif;  
                     endforeach;

                    
                     foreach($sprCells AS $sprCell):
                          if($AllOstatks->cell_id==$sprCell->id):
                                    echo '<td>'.$sprCell->cell.'</td>';
                         endif;
                         
                     endforeach;  
                  
                        if($AllOstatks->typeFond==1):
                          echo '<td>Монета</td>';
                     endif;
                    
                        if($AllOstatks->typeFond==0):
                                    echo '<td>Бумага</td>';
                        endif;
                                       echo '<td>'.$AllOstatks->naminal.'</td>';
                                       echo '<td id="summa'.$request->id_safe.'">'.$AllOstatks->summa.'</td>';     
                                        
                   
                endif;  

                    // end  to shkaf  nishon medihad
               //  to ryad nishon medihad

                if($AllOstatks->shkaf_id==$request->shaving && $AllOstatks->summa>0 && $request->shaving>0 && $request->qator<1 && $request->cell<1):
                    echo "<td>".$count++."</td>";
                 
                    foreach($shkafs AS $shkaf):
                        if($shkaf->id==$AllOstatks->shkaf_id):
                              echo "<td>".$shkaf->shkaf."</td>";
                                     
                        endif;
                     
                    endforeach;
                    foreach($sprQators AS $sprQator):
                       if($sprQator->id==$AllOstatks->qator_id):
                         echo "<td>".$sprQator->qator."</td>";
                        endif;  
                     endforeach;

                    
                     foreach($sprCells AS $sprCell):
                          if($AllOstatks->cell_id==$sprCell->id):
                                    echo '<td>'.$sprCell->cell.'</td>';
                         endif;
                         
                     endforeach;  
                  
                        if($AllOstatks->typeFond==1):
                          echo '<td>Монета</td>';
                     endif;
                        if($AllOstatks->typeFond==0):
                                    echo '<td>Бумага</td>';
                        endif;
                                       echo '<td>'.$AllOstatks->naminal.'</td>';
                                       echo '<td  id="summa'.$request->id_safe.'">'.$AllOstatks->summa.'</td>';     
                   continue;
                endif;  
                    //end to ryad nishon medihad
                   //end to yacheyka nishon medihad
                if($AllOstatks->qator_id==$request->qator && $AllOstatks->shkaf_id==$request->shaving && $AllOstatks->summa>0 && $request->shaving>0 && $request->qator>0 && $request->cell<1):
                    echo "<td>".$count++."</td>";
                    foreach($shkafs AS $shkaf):
                        if($shkaf->id==$AllOstatks->shkaf_id):
                              echo "<td>".$shkaf->shkaf."</td>";
                                     
                        endif;
                     
                    endforeach;
                    foreach($sprQators AS $sprQator):
                       if($sprQator->id==$AllOstatks->qator_id):
                         echo "<td>".$sprQator->qator."</td>";
                        endif;  
                     endforeach;
                    foreach($sprCells AS $sprCell):
                          if($AllOstatks->cell_id==$sprCell->id && $sprCell->qator_id==$request->qator  && $AllOstatks->qator_id==$request->qator):
                            echo '<td>'.$sprCell->cell.'</td>';
                         endif;
                         
                     endforeach;  
                  
                        if($AllOstatks->typeFond==1):
                          echo '<td>Монета</td>';
                     endif;
                        if($AllOstatks->typeFond==0):
                                    echo '<td>Бумага</td>';
                        endif;
                                       echo '<td>'.$AllOstatks->naminal.'</td>';
                                       echo '<td  id="summa'.$request->id_safe.'">'.$AllOstatks->summa.'</td>';     
                                       continue;
                endif;  
                    //to yacheyka nishon medihad
                //badaz yaxheyka nishon mediham
                if($AllOstatks->qator_id==$request->qator && $AllOstatks->cell_id==$request->cell && $AllOstatks->shkaf_id==$request->shaving && $AllOstatks->summa>0 && $request->shaving>0 && $request->qator>0 && $request->cell>0):
                    echo "<td>".$count++."</td>";
                  
                    foreach($shkafs AS $shkaf):
                        if($shkaf->id==$AllOstatks->shkaf_id):
                              echo "<td>".$shkaf->shkaf."</td>";
                                     
                        endif;
                     
                    endforeach;
                    foreach($sprQators AS $sprQator):
                       if($sprQator->id==$AllOstatks->qator_id):
                         echo "<td>".$sprQator->qator."</td>";
                        endif;  
                     endforeach;
                    foreach($sprCells AS $sprCell):
                          if($AllOstatks->cell_id==$sprCell->id && $sprCell->qator_id==$request->qator  && $AllOstatks->qator_id==$request->qator):
                            echo '<td>'.$sprCell->cell.'</td>';
                         endif;
                         
                     endforeach;  
                        if($AllOstatks->typeFond==1):
                          echo '<td>Монета</td>';
                     endif;
                        if($AllOstatks->typeFond==0):
                                    echo '<td>Бумага</td>';
                        endif;
                      echo '<td>'.$AllOstatks->naminal.'</td>';
                   echo '<td  id="summa'.$request->id_safe.'">'.$AllOstatks->summa.'</td>';     
                   continue; 
                endif;      
                  //end badaz yaxheyka nishon mediham
                echo "</tr>";
            
            endforeach;
            return;
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function show(Ostatki_safe $ostatki_safe)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function edit(Ostatki_safe $ostatki_safe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ostatki_safe $ostatki_safe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ostatki_safe  $ostatki_safe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ostatki_safe $ostatki_safe)
    {
        //
    }
}
