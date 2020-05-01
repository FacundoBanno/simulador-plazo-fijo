<?php

namespace App\Services;
class LoanService{

	public function validateForm($name,$surname,$amount,$days):bool{
		if(!isset($name,$surname,$amount,$days) || $amount < 1000 || $days <= 0 || $days > 30){
			return false;
		}else{
			return true;
		}
	}

	public function messagesError(){
		$messages = [
    	'numeric' => 'El campo :attribute debe ser un número.',
    	'required' => 'El campo :attribute es obligatorio.',
    	'min'    => 'El campo :attribute debe ser como mínimo :min.',
    	'max'    => 'El campo :attribute debe ser como mínimo :max.',
    	'between' => 'The :attribute value :input is not between :min - :max.',
		];
		return $messages;
	}

	public function getFinalAmount($initialAmount, $days){
		$percentage = $this->getPercentage($days);
		$finalAmount = $this->calculateFinalAmount($initialAmount, $days, $percentage);
		return $finalAmount;
	}

	public function getAmountByPeriod($amount, $days){
		$percentage = $this->getPercentage($days);
		$period[0] = $amount;
		for ($i = 1; $i <= 4; $i++) {
    		$period[$i] = $this->calculateFinalAmount($period[$i - 1], $days, $percentage);
		}
		return $period;
	}

	private function getPercentage($days){
		switch ($days) {
			case (($days >= 30) && ($days <= 60)):
				return 40;
				break;
			case (($days >= 61) && ($days <= 120)):
				return 45;
				break;
			case (($days >= 121) && ($days <= 360)):
				return 50;
				break;
			default:
				return 65;
				break;
		}
	}

	private function calculateFinalAmount($initialAmount, $days, $percentage){
		/*-resultado = monto inicial + (monto inicial * cantidad días / 360 * porcentaje / 100) -*/
		$finalAmount = $initialAmount + ($initialAmount * ($days / 360) * ($percentage / 100));
		return $finalAmount;
	}
}