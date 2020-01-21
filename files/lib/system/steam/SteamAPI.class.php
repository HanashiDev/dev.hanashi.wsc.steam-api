<?php
namespace wcf\system\steam;

class SteamAPI {
	// TODO: Testschlüssel: 411C7A63AF279374C9D8554B898AC0B5
	// https://steamcommunity.com/dev/apikey

	// https://steamcommunity.com/dev?l=german

	public static function getNewsForApp($appID, $count = 10, $maxLength = 300) {

	}

	public static function getGlobalAchievmentPercentagesForApp($appID) {

	}

	public static function getGlobalStatsForGame($appID, $names, $count = 1) {

	}

	public static function getPlayerSummaries($steamIDs) {

	}

	public static function getFriendList($steamID, $relationShip = 'friend') {

	}

	public static function getPlayerAchievments($steamID, $appID, $language = null) {

	}

	public static function getUserStatsForGame($steamID, $appID, $language = null) {

	}

	public static function getOwnedGames($steamID, $includeAppInfo = true, $includeFreeGames = false, $appIDs = []) {

	}

	public static function getRecentlyPlayedGames($steamID, $count = null) {

	}

	public static function isPlayingSharedGame($steamID, $appIDPlaying) {

	}

	public static function getSchemaForGame($appID, $language = null) {

	}

	public static function getPlayerBans($steamIDs) {

	}

	// openID
	// https://openid.net/specs/openid-authentication-2_0.html

	public static function getOpenIDUrl($redirectUri, $realm) {
		// https://steamcommunity.com/openid/login?openid.ns=http://specs.openid.net/auth/2.0&openid.mode=checkid_setup&openid.return_to=https://hanashi.dev/steam/test.php&openid.realm=https://hanashi.dev&openid.claimed_id=http://specs.openid.net/auth/2.0/identifier_select&openid.identity=http://specs.openid.net/auth/2.0/identifier_select
	}

	public static function validateOpenID() {
		// https://hanashi.dev/steam/test.php?openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&openid.mode=id_res&openid.op_endpoint=https%3A%2F%2Fsteamcommunity.com%2Fopenid%2Flogin&openid.claimed_id=https%3A%2F%2Fsteamcommunity.com%2Fopenid%2Fid%2F76561198049434265&openid.identity=https%3A%2F%2Fsteamcommunity.com%2Fopenid%2Fid%2F76561198049434265&openid.return_to=https%3A%2F%2Fhanashi.dev%2Fsteam%2Ftest.php&openid.response_nonce=2020-01-21T12%3A41%3A54Zc4Xs%2BIFl6Up6Sr8JdU84JV4Y2n4%3D&openid.assoc_handle=1234567890&openid.signed=signed%2Cop_endpoint%2Cclaimed_id%2Cidentity%2Creturn_to%2Cresponse_nonce%2Cassoc_handle&openid.sig=GbKmtwudO%2B9WOUtvttG%2FZMFF0ts%3D
	}
}
