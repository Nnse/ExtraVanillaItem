<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\variety\CustomFood;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;

class GoldenCarrotEnchanted extends CustomFood
{
    public function __construct()
    {
        parent::__construct("Golden Carrot Enchanted");
    }

	public function getItemTypeName() : string
	{
		return ItemTypeNames::GOLDEN_CARROT;
	}

	public function getAdditionalEffects() : array
    {
        return [
            new EffectInstance(VanillaEffects::REGENERATION(), 600, 4),
            new EffectInstance(VanillaEffects::ABSORPTION(), 2400, 3),
            new EffectInstance(VanillaEffects::RESISTANCE(), 6000),
            new EffectInstance(VanillaEffects::FIRE_RESISTANCE(), 6000)
        ];
    }

    public function getFoodRestore() : int
    {
        return 3;
    }

    public function getSaturationRestore() : float
    {
        return 4.8;
    }
}