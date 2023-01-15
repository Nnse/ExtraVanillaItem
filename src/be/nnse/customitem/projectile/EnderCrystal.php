<?php

declare(strict_types=1);

namespace be\nnse\customitem\projectile;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\projectile\Throwable;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class EnderCrystal extends Throwable
{
    protected function getInitialSizeInfo() : EntitySizeInfo
    {
        return new EntitySizeInfo(0.25, 0.25);
    }

    protected function onHit(ProjectileHitEvent $event) : void
    {
		$this->flagForDespawn();
    }

    public static function getNetworkTypeId() : string
    {
        return EntityIds::ENDER_CRYSTAL;
    }
}