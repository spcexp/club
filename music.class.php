<?php
namespace club;

class Music {

	private string $title;
	private string $genre;
	private int $duration;

	public function __construct($title, $genre, $duration) {
		$this->title = $title;
		$this->genre = $genre;
		$this->duration = $duration;
	}

	public function getInfo() {
		return [
			'title' => $this->title,
			'genre' => $this->genre,
			'duration' => $this->duration
		];
	}

}