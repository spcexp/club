<?php
namespace club;

class Visitor {

	private string $name = '';
	private array $favoriteGenres = [];

	public function __construct($name, $favoriteGenres) {
		$this->name = $name;
		$this->favoriteGenres = $favoriteGenres;
	}

	public function getFavoriteGenres() {
		return $this->favoriteGenres;
	}

	public function getName() {
		return $this->name;
	}

	public function orderMusic(&$musicQueue, &$musicList) {
		$randomMusicKey = array_rand($this->favoriteGenres, 1);
		echo "$this->name пришел в клуб и заказал музыку жанра: " . $this->favoriteGenres[$randomMusicKey] . "\n";
		return $musicQueue->setMusic($this->favoriteGenres[$randomMusicKey], $musicList);
	}

}