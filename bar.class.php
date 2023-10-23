<?php
namespace club;

use club\Club;

class Bar extends Club {

	private array $drinks = [];

	public function addDrink(&$drink) {
		$this->drinks[] = $drink;
	}

	public function getMenu() {
		return $this->drinks;
	}

}