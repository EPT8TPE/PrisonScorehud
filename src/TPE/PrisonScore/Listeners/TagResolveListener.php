<?php

declare(strict_types=1);

namespace TPE\PrisonScore\Listeners;

use pocketmine\event\Listener;
use Ifera\ScoreHud\event\TagsResolveEvent;
use TPE\Prisons\Prisons;

class TagResolveListener implements Listener {

    public function onTagResolve(TagResolveEvent $event) {
        $tag = $event->getTag();
        $tags = explode('.', $tag->getName(), 2);
        $value = "";

        if($tags[0] !== "prisonscore" || count($tags) < 2) {
            return;
        }

        switch ($tags[1]) {
            case "rank":
                Prisons::get()->getPrisonRank($event->getPlayer(), function (array $rows) use($tag) {
                    foreach ($rows as $row) {
                        $currentRank = $row[0]['prisonrank'];
                    }

                    $tag->setValue(strval($currentRank));
                });
            break;

            case "prestige":
                Prisons::get()->getPrisonPrestige($event->getPlayer(), function (array $rows) use($tag) {
                    foreach ($rows as $row) {
                        $currentPrestige = $row[0]['prestige'];
                    }

                    $tag->setValue(strval($currentPrestige));
                });
            break;
        }
    }


}