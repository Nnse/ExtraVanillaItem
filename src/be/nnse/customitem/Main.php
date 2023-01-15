<?php

declare(strict_types=1);

namespace be\nnse\customitem;

use be\nnse\api\item\CustomItemFactory;
use be\nnse\api\item\CustomItemListener;
use be\nnse\customitem\item\DirectionChecker;
use be\nnse\customitem\item\EnderCrystalBall;
use be\nnse\customitem\item\GoldenCarrotEnchanted;
use be\nnse\customitem\item\JumpBall;
use be\nnse\customitem\item\PositionStorage;
use be\nnse\customitem\item\RenamedFishingRod;
// use be\nnse\customitem\item\RenamedGoldenAxe;
use be\nnse\customitem\item\SnowballBow;
use be\nnse\customitem\item\VersionChecker;
use be\nnse\customitem\projectile\EnderCrystal;
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
		$factory->register(new JumpBall(), ["jump_ball"], true);
		$factory->register(new SnowballBow(), ["snowball_bow"], true);
		$factory->register(new VersionChecker(), ["version_checker"], true);
		$factory->register(new PositionStorage(), ["position_storage"], true);
		$factory->register(new DirectionChecker(), ["direction_checker"], true);
		$factory->register(new EnderCrystalBall(), ["ender_crystal_ball"], true);
		// $factory->register(new RenamedGoldenAxe(), ["renamed_golden_axe"], true);
		$factory->register(new RenamedFishingRod(), ["renamed_fishing_rod"], true);
		$factory->register(new GoldenCarrotEnchanted(), ["golden_carrot_enchanted"], true);

		EntityFactory::getInstance()->register(EnderCrystal::class,
			function(World $world, CompoundTag $nbt) : EnderCrystal {
				return new EnderCrystal(EntityDataHelper::parseLocation($nbt, $world), null, $nbt);
			}, ["EnderCrystal", "minecraft:ender_crystal"]
		);
    }
}