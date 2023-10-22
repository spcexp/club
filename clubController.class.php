<?php
namespace club;

class ClubController {

	private $bar;
	private $dancefloor;
	private $musicQueue;
	private $visitorList = [];

	public function __construct(
		&$bar,
		&$dancefloor,
		&$musicQueue,
		&$visitorList
	) {
		$this->bar = $bar;
		$this->dancefloor = $dancefloor;
		$this->musicQueue = $musicQueue;
		$this->visitorList = $visitorList;

		foreach ($visitorList as $visitor) {
			$musicList = $dancefloor->getMusicList();
			$visitor->orderMusic($musicQueue, $musicList);
		}
	}

	public function addVisitor(&$visitor) {
		$this->visitorList[] = &$visitor;
		$visitor->orderMusic($this->musicQueue, $this->dancefloor->getMusicList());
	}

	public function updateClub() {
		$currentMusic = $this->musicQueue->getCurrentMusic();
		if (!$currentMusic) return null;
		$currentMusicInfo = $currentMusic->getInfo();
		$genre = $currentMusicInfo['genre'];
		foreach ($this->visitorList as $visitor) {
			$favoriteGenres = $visitor->getFavoriteGenres();
			if (in_array($genre, $favoriteGenres, true)) {
				$this->dancefloor->addVisitor($visitor);
				$this->bar->removeVisitor($visitor);
			} else {
				$this->bar->addVisitor($visitor);
				$this->dancefloor->removeVisitor($visitor);
			}
		}
		
		$this->showClub($currentMusicInfo);
		return $currentMusicInfo['duration'];
	}

	private function showClub(&$currentMusicInfo) {
		echo "\n\n\n";
		$this->playMusic($currentMusicInfo['title']);
		$this->showDancefloor();
		$this->showBar();
		echo "--------------------------------\n";
	}

	private function playMusic($musicTitle) {
		echo "На танцполе играет: $musicTitle\n";
	}

	private function showDancefloor() {
		echo "На танцполе:\n";
		$allDancefloorVisitors = $this->dancefloor->getAllVisitors();
		foreach ($allDancefloorVisitors as $key => $value) {
			echo "$key\n";
		}
	}

	private function showBar() {
		echo "В баре:\n";
		$allBarVisitors = $this->bar->getAllVisitors();
		foreach ($allBarVisitors as $key => $value) {
			echo "$key\n";
		}
	}

}