<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\customitem\projectile\EnderCrystal;
use be\nnse\api\item\default\CustomProjectileItem;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Throwable;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;

class EnderCrystalBall extends CustomProjectileItem
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::END_CRYSTAL,
            20,
            "Ender Crystal Ball"
        );
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