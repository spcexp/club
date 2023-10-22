<?php
namespace club;

abstract class Club {

	private $visitors = [];

	public function addVisitor(&$visitor) {
		$this->visitors[$visitor->getName()] = $visitor;
	}

	public function removeVisitor(&$visitor) {
		unset($this->visitors[$visitor->getName()]);
	}

	public function getAllVisitors() {
		return $this->visitors;
	}

}