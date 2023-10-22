<?php
namespace club;

class MusicQueue {

	private array $queue = [];

	public function setMusic($genre, &$musicList) {
		$filteredMusic = array_filter(
			$musicList,
			fn($music) => $music->getInfo()['genre'] === $genre
		);
		if (!empty($filteredMusic)) {
			$this->queue[] = $filteredMusic[array_rand($filteredMusic)];
		}
	}

	public function getCurrentMusic() {
		if (empty($this->queue)) {
			return false;
		}
		return array_shift($this->queue);
	}

}