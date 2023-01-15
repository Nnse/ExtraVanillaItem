<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\default\CustomDurable;
use pocketmine\item\ItemIds;

class RenamedFishingRod extends CustomDurable
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::FISHING_ROD,
            20,
            "Renamed Fishing Rod"
        );
    }

    public function getMaxStackSize() : int
    {
        return 1;
    }

    public function getMaxDurability() : int
    {
        return 384;
    }
}