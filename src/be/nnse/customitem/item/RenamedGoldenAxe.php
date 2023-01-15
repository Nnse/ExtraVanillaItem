<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\variety\CustomTieredTool;
use be\nnse\api\item\trait\VanillaAxeTrait;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\item\ToolTier;

class RenamedGoldenAxe extends CustomTieredTool
{
    use VanillaAxeTrait;

    public function __construct()
    {
        parent::__construct(ToolTier::GOLD(), "Renamed Golden Axe");
    }

	public function getItemTypeName() : string
	{
		return ItemTypeNames::GOLDEN_AXE;
	}
}