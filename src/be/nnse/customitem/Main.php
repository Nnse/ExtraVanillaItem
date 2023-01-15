<?php

declare(strict_types=1);

namespace be\nnse\customitem;

use be\nnse\customitem\item\DirectionChecker;
use be\nnse\customitem\item\EnderCrystalBall;
use be\nnse\customitem\item\GoldenCarrotEnchanted;
use be\nnse\customitem\item\PositionStorage;
use be\nnse\customitem\item\RenamedFishingRod;
use be\nnse\customitem\item\RenamedGoldenAxe;
use be\nnse\customitem\item\SnowballBow;
use be\nnse\customitem\item\VersionChecker;
use be\nnse\customitem\projectile\EnderCrystal;
use be\nnse\api\item\CustomItemFactory;
use be\nnse\api\item\CustomItemListener;
use pocketmine\data\bedrock\EntityLegacyIds;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;

class Main extends PluginBase
{
    public function onEnable() : void
    {
        CustomItemListener::register($this);

        $factory = CustomItemFactory::getInstance();
        $factory->register(new DirectionChecker(), true);
        $factory->register(new GoldenCarrotEnchanted(), true);
        $factory->register(new RenamedFishingRod(), true);
        $factory->register(new RenamedGoldenAxe(), true);
        $factory->register(new SnowballBow(), true);
        $factory->register(new EnderCrystalBall(), true);
        $factory->register(new VersionChecker(), true);
        $factory->register(new PositionStorage(), true);

        EntityFactory::getInstance()->register(EnderCrystal::class,
            function(World $world, CompoundTag $nbt) : EnderCrystal {
                return new EnderCrystal(EntityDataHelper::parseLocation($nbt, $world), null, $nbt);
            }, ["EnderCrystal", "minecraft:ender_crystal"], EntityLegacyIds::ENDER_CRYSTAL
        );
    }
}