<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\default\CustomTieredTool;
use be\nnse\api\item\trait\VanillaAxeTrait;
use pocketmine\item\ItemIds;
use pocketmine\item\ToolTier;

class RenamedGoldenAxe extends CustomTieredTool
{
    use VanillaAxeTrait;

    public function __construct()
    {
        parent::__construct(
            ItemIds::GOLD_AXE,
            0,
            ToolTier::GOLD(),
            "Renamed Golden Axe"
        );
    }
}