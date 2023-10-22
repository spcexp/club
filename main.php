<?php
namespace club;

require "clubController.class.php";
require "club.class.php";
require "bar.class.php";
require "dancefloor.class.php";
require "visitor.class.php";
require "music.class.php";
require "musicQueue.class.php";

use club\clubController;
use club\Bar;
use club\Dancefloor;
use club\Visitor;
use club\Music;
use club\MusicQueue;

$bar = new Bar();

$dancefloorr = new Dancefloor();
$track1 = new Music('track1', 'Рок', 2);
$track2 = new Music('track2', 'Панк-рок', 2);
$track3 = new Music('track3', 'Метал', 2);
$track4 = new Music('track4', 'Техно', 2);
$track5 = new Music('track5', 'Эмбиент', 2);
$track6 = new Music('track6', 'Хард-рок', 2);
$track7 = new Music('track7', 'Фолк-рок', 2);
$track8 = new Music('track8', 'Рок', 2);
$trackList = [$track1, $track2, $track3, $track4, $track5, $track6, $track7, $track8];
foreach ($trackList as $track) {
	$dancefloorr->addMusic($track);
}

$musicQueue = new MusicQueue();

$visitor1 = new Visitor('Петр', ['Рок', 'Метал', 'Техно']);
$visitor2 = new Visitor('Илья', ['Поп', 'Рок']);
$visitor3 = new Visitor('Маша', ['Панк-рок', 'Метал', 'Эмбиент']);
$visitor4 = new Visitor('Юля', ['Поп-рок', 'Фолк-рок']);
$visitor5 = new Visitor('Саша', ['Рок', 'Хард-рок', 'Классическая музыка']);
$visitors = [$visitor1, $visitor2, $visitor3, $visitor4, $visitor5];

$clubController = new clubController(
	$bar,
	$dancefloorr,
	$musicQueue,
	$visitors
);

$clubOpen = true;
while ($clubOpen) {
	$duration = $clubController->updateClub();
	if ($duration) {
		sleep($duration);
	} else {
		$clubOpen = false;
	}
}
