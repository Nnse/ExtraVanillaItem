<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\command\CommandItem;
use pocketmine\data\bedrock\item\ItemTypeNames;

class VersionChecker extends CommandItem
{
	public function __construct()
	{
		parent::__construct("version", "Check Version");
	}

	public function getItemTypeName() : string
	{
		return ItemTypeNames::GLOWSTONE_DUST;
	}
}