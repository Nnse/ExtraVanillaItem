<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\functional\FunctionalItem;
use be\nnse\api\item\trait\PlayerTemporaryDataTrait;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\entity\Location;
use pocketmine\player\Player;

class PositionStorage extends FunctionalItem
{
    use PlayerTemporaryDataTrait;

    const TAG_POS_STORAGE = "PositionStorage:positions";

    public function __construct()
    {
        parent::__construct("Position Storage");
    }

	public function getItemTypeName() : string
	{
		return ItemTypeNames::CLOCK;
	}

	public function onUsing(Player $player) : void
    {
        $location = $player->getLocation();
        $history = $this->getPlayerTemporaryData($player, self::TAG_POS_STORAGE) ?? [];
        if (!empty($history)) {
            $latestPosition = end($history);
            if ($latestPosition instanceof Location) {
                $player->teleport($latestPosition);
            }
        }

        $history[] = $location;
        $this->setPlayerTemporaryData($player, self::TAG_POS_STORAGE, $history);

        $player->sendMessage("Saved current location");
    }

    public function onArmSwing(Player $player) : void
    {
        $this->deletePlayerTemporaryData($player, self::TAG_POS_STORAGE);
        $player->sendMessage("Deleted all locations");
    }
}