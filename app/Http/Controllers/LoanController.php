<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoanService;
class LoanController extends Controller
{
	private $loanService;
	public function __construct(LoanService $_loanService){
		$this->loanService = $_loanService;
	}

    public function loadHome(){
        return view('loan.home');
    }

    public function calculate(Request $request){
    	/*Los nombres e Ids de los input tendrian que ser en ingles, pero no se como traducir el atributo para que muestre el mensaje bien segun corresponda el error, por eso la negrada de mezcla de idiomas.*/

    	$request->validate([
    		'nombre' => 'required',
    		'apellido'=> 'required',
    		'monto' => 'required|numeric|min:1000',
    		'dias' => 'required|numeric|min:30',
    	],
    	$messages = $this->loanService->messagesError());

        $name = $request->input('nombre');
        $surname = $request->input('apellido');
        $amount = $request->input('monto');
        $days = $request->input('dias');
        $toInvert = $request->input('toInvert');
        $approved = $this->loanService->validateForm($name,$surname,$amount,$days);
        $finalAmount = $this->loanService->getFinalAmount($amount,$days);
        $amountByPeriod = null;
        if($toInvert){
        	$amountByPeriod = $this->loanService->getAmountByPeriod($finalAmount,$days);
        }
        return view ('loan.result', [
        	'name' => $name, 
        	'surname' => $surname,
        	'amount' => $amount,
        	'days' => $days,
        	'toInvert' => $toInvert,
        	'approved' => $approved,
        	'finalAmount' => $finalAmount,
        	'amountByPeriod' => $amountByPeriod
        ]);
    }
}