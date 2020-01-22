<?php
namespace wcf\system\steam;
use wcf\system\exception\SteamException;
use wcf\util\HTTPRequest;
use wcf\util\JSON;

/**
 * Steam Web Api class
 * api key can got from here: https://steamcommunity.com/dev/apikey
 * method documentation is from original documentations
 * 
 * @see https://steamcommunity.com/dev
 * @see https://openid.net/specs/openid-authentication-2_0.html
 * @author Peter Lohse <hanashi@hanashi.eu>
 * @copyright Hanashi Development
 * @license	Freie Lizenz (https://hanashi.dev/freie-lizenz/)
 * @package	WoltLabSuite\Core\System\Steam
 */
class SteamAPI {
	/**
	 * returns the latest news of a game specified by its appID
	 * 
	 * @var 	int		$appID		AppID of the game you want the news of.
	 * @var 	int		$count 		(optional) How many news enties you want to get returned.
	 * @var 	int		$maxLength	(optional) Maximum length of each news entry.
	 * @return 	array	latest news of a game
	 */
	public static function getNewsForApp(int $appID, int $count = null, int $maxLength = null) : array {

	}

	/**
	 * returns global achievements overview of a specific game in percentages
	 * 
	 * @var		int		$appID		AppID of the game you want the percentages of.
	 * @return	array	global achievements overview of a specific game in percentages
	 */
	public static function getGlobalAchievmentPercentagesForApp(int $appID) : array {

	}

	/**
	 * returns global stats of a specific game
	 * 
	 * @var		int		$appID		AppID of the game you want the stats of
	 * @var		array	$names		Name of the achievement as defined in Steamworks. (name[0] [and name[1], etc.])
	 * @var		int		$count		Length of the array of global stat names you will be passing.
	 * @return	array	global stats of a specific game
	 */
	public static function getGlobalStatsForGame(int $appID, array $names, int $count = 1) : array {

	}

	/**
	 * returns basic profile information for a list of 64-bit Steam IDs
	 * 
	 * @var		array	$steamIDs	List of 64 bit Steam IDs to return profile information for. Up to 100 Steam IDs can be requested.
	 * @return	array	basic profile information for a list of 64-bit Steam IDs (Some data associated with a Steam account may be hidden if the user has their profile visibility set to "Friends Only" or "Private". In that case, only public data will be returned.)
	 */
	public static function getPlayerSummaries(array $steamIDs) : array {

	}

	/**
	 * returns the friend list of any Steam user, provided their Steam Community profile visibility is set to "Public"
	 * 
	 * @var		int		$steamID		64 bit Steam ID to return friend list for
	 * @var		string	$relationShip	Relationship filter. Possibles values: all, friend
	 * @return	array	friend list of any Steam user, provided their Steam Community profile visibility is set to "Public"
	 */
	public static function getFriendList(int $steamID, string $relationShip = 'friend') : array {

	}

	/**
	 * returns a list of achievements for this user by app id
	 * 
	 * @var		int		$steamID		64 bit Steam ID to return achievements for.
	 * @var		int		$appID			The ID for the game you're requesting
	 * @var		string	$language		(optional) Language. If specified, it will return language data for the requested language.
	 * @return	array	list of achievements for this user by app id
	 */
	public static function getPlayerAchievments(int $steamID, int $appID, string $language = null) : array {

	}

	/**
	 * returns a list of stats for this user by app id
	 * 
	 * @var		int		$steamID		64 bit Steam ID to return stats for.
	 * @var		int		$appID			The ID for the game you're requesting
	 * @var		string	$language		(optional) Language. If specified, it will return language data for the requested language.
	 * @return	array	list of stats for this user by app id
	 */
	public static function getUserStatsForGame(int $steamID, int $appID, string $language = null) : array {

	}

	/**
	 * returns a list of games a player owns along with some playtime information, if the profile is publicly visible. Private, friends-only, and other privacy settings are not supported unless you are asking for your own personal details (ie the WebAPI key you are using is linked to the steamid you are requesting).
	 * 
	 * @var		int		$steamID			The SteamID of the account.
	 * @var		bool	$includeAppInfo		(optional) Include game name and logo information in the output. The default is to return appids only.
	 * @var		bool	$includeFreeGames	(optional) By default, free games like Team Fortress 2 are excluded (as technically everyone owns them). If include_played_free_games is set, they will be returned if the player has played them at some point. This is the same behavior as the games list on the Steam Community.
	 * @var		array	$appIDs				(optional) You can optionally filter the list to a set of appids.
	 * @return	array	list of games a player owns along with some playtime information
	 */
	public static function getOwnedGames(int $steamID, bool $includeAppInfo = true, bool $includeFreeGames = false, array $appIDs = []) : array {

	}

	/**
	 * returns a list of games a player has played in the last two weeks, if the profile is publicly visible. Private, friends-only, and other privacy settings are not supported unless you are asking for your own personal details (ie the WebAPI key you are using is linked to the steamid you are requesting).
	 * 
	 * @var		int		$steamID	The SteamID of the account.
	 * @var		int		$count		(optional) Optionally limit to a certain number of games (the number of games a person has played in the last 2 weeks is typically very small)
	 * @return	array	list of games a player has played in the last two weeks
	 */
	public static function getRecentlyPlayedGames(int $steamID, int $count = null) : array {

	}

	/**
	 * returns the original owner's SteamID if a borrowing account is currently playing this game. If the game is not borrowed or the borrower currently doesn't play this game, the result is always 0.
	 * 
	 * @var		int		$steamID		The SteamID of the account playing.
	 * @var		int		$appIDPlaying	The AppID of the game currently playing
	 * @return	int		original owner's SteamID if a borrowing account is currently playing this game
	 */
	public static function isPlayingSharedGame(int $steamID, int $appIDPlaying) : int {

	}

	/**
	 * returns gamename, gameversion and availablegamestats (achievements and stats).
	 * 
	 * @var		int			$appID		The AppID of the game you want stats of
	 * @var		string		$language	(optional) Language. If specified, it will return language data for the requested language.
	 * @return	array		gamename, gameversion and availablegamestats (achievements and stats).
	 */
	public static function getSchemaForGame(int $appID, string $language = null) : array {

	}

	/**
	 * returns Community, VAC, and Economy ban statuses for given players.
	 * 
	 * @var		array		list of SteamIDs
	 * @return	array		Community, VAC, and Economy ban statuses for given players
	 */
	public static function getPlayerBans(array $steamIDs) : array {

	}

	/**
	 * get OpenID login url
	 * 
	 * @var 	string	$redirectUri	URL to which the OP SHOULD return the User-Agent with the response indicating the status of the request.
	 * @var 	string	$realm			URL pattern the OP SHOULD ask the end user to trust.
	 * @return 	string
	 */
	public static function getOpenIDUrl(string $redirectUri, string $realm) : string {
		$data = [
			'openid.ns' => 'http://specs.openid.net/auth/2.0',
			'openid.mode' => 'checkid_setup',
			'openid.return_to' => $redirectUri,
			'openid.realm' => $realm,
			'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select',
			'openid.identity' => 'http://specs.openid.net/auth/2.0/identifier_select'
		];
		return 'https://steamcommunity.com/openid/login?' . http_build_query($data, null, '&');
	}

	/**
	 * validate OpenID data and returns SteamID
	 * 
	 * @var		array	$data	content of $_GET by redirect uri, where prefix is "openid."
	 * @return	int		64 bit of SteamID
	 */
	public static function validateOpenID(array $data) : int {

	}

	protected static function execute($url, $data) {

	}
}
