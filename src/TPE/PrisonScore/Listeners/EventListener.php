<?php

declare(strict_types=1);

namespace TPE\PrisonScore\Listeners;

use pocketmine\event\Listener;
use TPE\Prisons\Listener\PrisonListener\PrisonPrestigeEvent;
use TPE\Prisons\Listener\PrisonListener\PrisonRankUpEvent;
use Ifera\ScoreHud\event\PlayerTagUpdateEvent;
use Ifera\ScoreHud\scoreboard\ScoreTag;

class EventListener implements Listener {

    public function onRankChange(PrisonRankUpEvent $event) : void {
        (new PlayerTagUpdateEvent($event->getPlayer(), new ScoreTag("prisonscore.rank", strval($event->getNewRank()))))->call();
    }

    public function onPrestigeChange(PrisonPrestigeEvent $event) : void {
        (new PlayerTagUpdateEvent($event->getPlayer(), new ScoreTag("prisonscore.prestige", strval($event->getNewPrestige()))))->call();
    }
}