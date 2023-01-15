<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\customitem\projectile\EnderCrystal;
use be\nnse\api\item\variety\CustomProjectileItem;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Throwable;
use pocketmine\player\Player;

class EnderCrystalBall extends CustomProjectileItem
{
    public function __construct()
    {
        parent::__construct("Ender Crystal Ball");
    }

	public function getItemTypeName() : string
	{
		return ItemTypeNames::END_CRYSTAL;
	}

    public function getThrowForce() : float
    {
        return 1.1;
    }

    protected function createEntity(Location $location, Player $thrower) : Throwable
    {
        return new EnderCrystal($location, $thrower);
    }
}