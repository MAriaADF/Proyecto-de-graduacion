<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\IncomeExpenses;
use Validator;


class IncomeExpensesController extends Controller
{
       
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el formulario para llenar los.
     *datos de ingresos
     */
      public function indexIncome()
    {

       try{
         $result = DB::select("call notification_reservation");
        return view('IncomeExpenses/income_report')->with('result', $result);
      }catch(\Exception $e){
         //return redirect('/indexReport')-> with('error', 'Error al registrar el gasto,intentelo de nuevo');
                DB::rollback();
      }

    }

    /**
     * Muestra el formulario para llenar los
     *datos de gastos
     */
    public function indexReport()
    {

       try{
        $result = DB::select("call notification_reservation");
        return view('IncomeExpenses/expense_report')->with('result', $result);
        }catch(\Exception $e){
         //return redirect('/indexReport')-> with('error', 'Error al registrar el gasto,intentelo de nuevo');
                DB::rollback();
      }

    }

     /**
     * Guarda un nuevo gasto del hotel en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeReport(Request $request)
     { 
      $state='0';
      $action_type='Gastos';
      try{
              DB::beginTransaction();

        $rules=array(
            'bill_num'=>'required|unique:income_expenses', 
            );

        $validator=Validator::make($request->all(),$rules);
        
        if ($validator->fails())
        {
           return redirect('/indexReport')-> with('error', 'Error al registrar el gasto,intentelo de nuevo');

        }
        
      $result = DB::select("call notification_reservation");

      $inc_ex =  IncomeExpenses::create([
            'concept'=>$request->get('concept'),
            'bill_num'=>$request->get('bill_num'),
            'sum'=>$request->get('sum'),
            'state'=>$state,
            'invoce_date'=>$request->get('invoce_date'),
        ]);

     $hist = DB::table('history_inc_exp')->insert(
        [
          'sum'=>$request->get('sum'),
          'action_type'=>$action_type,
          'id_user' => Auth::user()->id,
          'id_inc_exp'=> $inc_ex->id,
        ]);
        
        if( !$inc_ex || !$hist)
           {
              DB::rollback();
           } else {
               DB::commit(); 
              
                return redirect('/indexReport')-> with('status', 'Registro de gastos satisfactorio');
            }

        }catch(\Exception $e){
               return redirect('/indexReport')-> with('error', 'Error al registrar el gasto,intentelo de nuevo');
                DB::rollback();
        }
    }

     /**
     * Guarda un nuev ingresos del hotel en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeIncome(Request $request)
     { 

      $state='1';
      $action_type='Ingresos';

       try{
              DB::beginTransaction();

              $rules=array(
                  'bill_num'=>'required|unique:income_expenses', 
                  );

              $validator=Validator::make($request->all(),$rules);
              
              if ($validator->fails())
              {
                  return redirect('/indexIncome')-> with('error', 'Error al registrar el igreso,intentelo de nuevo');
              }

            $inc_ex =  IncomeExpenses::create([
                  'concept'=>$request->get('concept'),
                  'bill_num'=>$request->get('bill_num'),
                  'sum'=>$request->get('sum'),
                  'state'=>$state,
                  'invoce_date'=>$request->get('invoce_date'),
              ]);

           $hist = DB::table('history_inc_exp')->insert(
              [
                'sum'=>$request->get('sum'),
                'action_type'=>$action_type,
                'id_user' => Auth::user()->id,
                'id_inc_exp'=> $inc_ex->id,
              ]);
            $result = DB::select("call notification_reservation");

            if( !$inc_ex || !$hist)
           {
              DB::rollback();
           } else {
               DB::commit(); 
               
     return redirect('/indexIncome')-> with('status', 'Registro de ingreso satisfactorio');
            }

        }catch(\Exception $e){
              return redirect('/indexIncome')-> with('error', 'Error al registrar el igreso,intentelo de nuevo');
                DB::rollback();
        }
    }

    /**
     * Muestra el formulario para buscar 
     * ingresos y gastos 
     */
    public function searchInExp()
     { 
        $tipo='1';
        $date_start='2017-10-10';
        $date_end="2017-12-26";
        $style="display: none";
        $incomexp = DB::select("call report_incomexp($tipo, '$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
        return view('IncomeExpenses/search')->with('result', $result)->with('incomexp', $incomexp)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);  
    }

    public function searchInExpTip(Request $request)
    {
        $tip=$request->get('tipo');
        $date_start=$request->get('date_start');
        $date_end=$request->get('date_end');
        $style="";
        $incomexp = DB::select("call report_incomexp($tip, '$date_start', '$date_end')");     
        $result = DB::select("call notification_reservation");
        
        if($tip=="0"){
             $tipo="Gastos";
        }else{
             $tipo="Ingresos";
        }
        
        $result = DB::select("call notification_reservation");
      return view('IncomeExpenses/search')->with('result', $result)->with('incomexp', $incomexp)->with('tipo', $tipo)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);  

    }

     public function edit($id)
    {
      $in_expen = IncomeExpenses::where('income_expenses.id', "=", $id)->get();
print_r($in_expen);
      $result = DB::select("call notification_reservation");
        return view('IncomeExpenses/edit')->with('result', $result)->with('in_expen', $in_expen)->with('id', $id);
    }

     public function update(Request $request, $id)
    {
      $result = DB::select("call notification_reservation");
      $income_expenses = IncomeExpenses::where('id', '=', $id)->get();
        return view('IncomeExpenses/edit')->with('result', $result)->with('income_expenses', $income_expenses)->with('id', $id);
    }

 public function destroy(Request $request, $id)
    {

      $tipo='1';
        $date_start='2017-10-10';
        $date_end="2017-12-26";
        $style="display: none";

        $state="2";

        $rese = IncomeExpenses::find($id);
        $rese->state= $state;
        $rese->save();

         $incomexp = DB::select("call report_incomexp(1, '$date_start', '$date_end')");   
        $result = DB::select("call notification_reservation");
      return view('IncomeExpenses/search')->with('result', $result)->with('tipo', $tipo)->with('incomexp', $incomexp)->with('date_start', $date_start)->with('date_end', $date_end)->with('style', $style);
    }

    /**
     * Muestra el precio total de una reserva 
     */
    public function payment(Request $request, $id){
       
         if($request->ajax()){
            $payment = DB::select("call payment($id)");
            return response()->json($payment);
        }
    }

}
