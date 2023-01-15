<?php

declare(strict_types=1);

namespace be\nnse\customitem\item;

use be\nnse\api\item\functional\FunctionalItem;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class JumpBall extends FunctionalItem
{
	public function __construct()
	{
		parent::__construct("Jump Ball", ["使うと跳ねる"]);
	}

	public function getItemTypeName() : string
	{
		return ItemTypeNames::SLIME_BALL;
	}

	public function onUsing(Player $player) : void
	{
		$player->setMotion(new Vector3(0, 1, 0));
	}

	public function onArmSwing(Player $player) : void
	{
		$player->setMotion(new Vector3(0, 2, 0));
	}
}