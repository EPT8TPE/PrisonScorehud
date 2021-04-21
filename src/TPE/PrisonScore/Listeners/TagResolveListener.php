<?php

declare(strict_types=1);

namespace TPE\PrisonScore\Listeners;

use pocketmine\event\Listener;
use Ifera\ScoreHud\event\TagsResolveEvent;
use TPE\Prisons\Prisons;
use TPE\Prisons\Utils;

class TagResolveListener implements Listener {

    public function onTagResolve(TagsResolveEvent $event) {
        $tag = $event->getTag();
        $tags = explode('.', $tag->getName(), 2);
        $value = "";

        if($tags[0] !== "prisonscore" || count($tags) < 2) {
            return;
        }

        switch ($tags[1]) {
            case "rank":
                $member = Prisons::get()->getPlayerManager()->getPlayer($event->getPlayer()) ?? null;
                if(!is_null($member)) {
                    $tag->setValue(strval(Utils::getRankName($member->getPrisonRank())));
                } else {
                    $tag->setValue("");
                }
            break;

            case "prestige":
                $member = Prisons::get()->getPlayerManager()->getPlayer($event->getPlayer()) ?? null;
                if(!is_null($member)) {
                    $tag->setValue(strval($member->getPrestige()));
                } else {
                    $tag->setValue("");
                }
            break;
        }
    }


}
