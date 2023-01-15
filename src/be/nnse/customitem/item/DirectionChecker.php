<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\functional\FunctionalItem;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;

class DirectionChecker extends FunctionalItem
{
    public function __construct()
    {
        parent::__construct(
            ItemIds::COMPASS,
            20,
            "Direction Checker",
            [ "RMB: Japanese", "LMB: English" ]
        );
    }

    public function onUsing(Player $player) : void
    {
        $yaw = $player->getLocation()->getYaw();
        $player->sendMessage($this->getDirectionName($yaw, false));
    }

    public function onArmSwing(Player $player) : void
    {
        $yaw = $player->getLocation()->getYaw();
        $player->sendMessage($this->getDirectionName($yaw, true));
    }

    /**
     * @param float $yaw
     * @param bool $english
     * @return string
     */
    private function getDirectionName(float $yaw, bool $english) : string
    {
        $rotation = ($yaw - 90) % 360;
        if ($rotation < 0) {
            $rotation += 360.0;
        }
        if (0 <= $rotation && $rotation < 22.5) {
            return $english ? "N" : "北";
        } else if (22.5 <= $rotation && $rotation < 67.5) {
            return $english ? "NE" : "北東";
        } else if (67.5 <= $rotation && $rotation < 112.5) {
            return $english ? "E" : "東";
        } else if (112.5 <= $rotation && $rotation < 157.5) {
            return $english ? "SE" : "南東";
        } else if (157.5 <= $rotation && $rotation < 202.5) {
            return $english ? "S" : "南";
        } else if (202.5 <= $rotation && $rotation < 247.5) {
            return $english ? "SW" : "南西";
        } else if (247.5 <= $rotation && $rotation < 292.5) {
            return $english ? "W" : "西";
        } else if (292.5 <= $rotation && $rotation < 337.5) {
            return $english ? "NW" : "北西";
        } else if (337.5 <= $rotation && $rotation < 360.0) {
            return $english ? "N" : "北";
        } else {
            return "?";
        }
    }
}