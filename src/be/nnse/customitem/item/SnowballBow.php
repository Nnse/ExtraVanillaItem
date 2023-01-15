<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\default\CustomBow;
use pocketmine\entity\Entity;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Projectile;
use pocketmine\entity\projectile\Snowball;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;

class SnowballBow extends CustomBow
{
    public function __construct()
    {
        parent::__construct("Snowball Bow");
    }

    protected function getSourceEntity(Location $ejectLocation, Entity $shooter, bool $critical) : Projectile
    {
        return new Snowball($ejectLocation, $shooter);
    }

    protected function getSourceItem() : Item
    {
        return VanillaItems::SNOWBALL();
    }
}