<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\default\CustomFood;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\item\ItemIds;

class GoldenCarrotEnchanted extends CustomFood
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::GOLDEN_CARROT,
            20,
            "Golden Carrot Enchanted"
        );
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