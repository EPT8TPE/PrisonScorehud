<?php

declare(strict_types=1);

namespace TPE\PrisonScore;

use pocketmine\plugin\PluginBase;
use TPE\PrisonScore\Listeners\EventListener;
use TPE\PrisonScore\Listeners\TagResolveListener;

class PrisonScore extends PluginBase {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getPluginManager()->registerEvents(new TagResolveListener(), $this);
    }

}