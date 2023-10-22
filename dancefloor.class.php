<?php
namespace club;

use club\Club;

class Dancefloor extends Club {

	private array $musicList = [];

	public function addMusic(&$music) {
		$this->musicList[] = $music;
	}

	public function getMusicList() {
		return $this->musicList;
	}

}