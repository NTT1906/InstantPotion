<?php
declare(strict_types=1);
namespace instantpotion;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\item\Potion;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener{
	/** @var Main $instance */
	private static $instance;
	
	public function onLoad(){
		 self::$instance = $this;
	}
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->notice("§fInstant§ePotion §fis enabled in background.");
	}

	public function onInteract(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$item = $event->getItem();
		
		if($item instanceof Potion){
			$player->addEffect($item->getAdditionalEffects);
			$player->getInventory()->setItemInHand($item->getResidue());
		}
	}

	public function onDisable(){
		$this->getLogger()->notice("§fInstant§ePotion §fis disabled in background.");
	}
}