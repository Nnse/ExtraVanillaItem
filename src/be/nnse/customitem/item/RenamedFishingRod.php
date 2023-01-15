<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\variety\CustomDurable;
use pocketmine\data\bedrock\item\ItemTypeNames;

class RenamedFishingRod extends CustomDurable
{
    public function __construct()
    {
        parent::__construct("Renamed Fishing Rod");
    }

	public function getItemTypeName() : string
	{
		return ItemTypeNames::FISHING_ROD;
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