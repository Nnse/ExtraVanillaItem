<?php

declare(strict_types=1);

namespace be\nnse\customitem\projectile;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\entity\Explosive;
use pocketmine\entity\projectile\Throwable;
use pocketmine\event\entity\ExplosionPrimeEvent;
use pocketmine\event\entity\ProjectileHitEvent;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;
use pocketmine\world\Explosion;
use pocketmine\world\Position;

class EnderCrystal extends Throwable implements Explosive
{
    protected function getInitialSizeInfo() : EntitySizeInfo
    {
        return new EntitySizeInfo(0.25, 0.25);
    }

    protected function onHit(ProjectileHitEvent $event) : void
    {
        $this->explode();
    }

    public static function getNetworkTypeId() : string
    {
        return EntityIds::ENDER_CRYSTAL;
    }

    public function explode() : void
    {
        $ev = new ExplosionPrimeEvent($this, 5);
        $ev->call();
        if (!$ev->isCancelled()) {
            $explosion = new Explosion(
                Position::fromObject(
                    $this->location->add(0, $this->size->getHeight() / 2, 0),
                    $this->getWorld()
                ),
                $ev->getForce(),
                $this
            );
            if($ev->isBlockBreaking()){
                $explosion->explodeA();
            }
            $explosion->explodeB();
        }
    }
}