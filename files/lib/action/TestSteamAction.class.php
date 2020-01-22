<?php
namespace wcf\action;
use wcf\system\steam\SteamAPI;

class TestSteamAction extends AbstractAction {
    public function execute() {
        wcfDebug(SteamAPI::getAssetPrices(440, 'EUR', 'de'));
    }
}
