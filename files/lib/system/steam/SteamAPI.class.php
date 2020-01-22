<?php
namespace wcf\system\steam;
use wcf\system\exception\SteamException;
use wcf\system\exception\SystemException;
use wcf\util\exception\HTTPException;
use wcf\util\HTTPRequest;
use wcf\util\JSON;
use wcf\util\StringUtil;

/**
 * Steam Web Api class
 * api key can got from here: https://steamcommunity.com/dev/apikey
 * method documentation is from original documentations
 * 
 * @see https://steamcommunity.com/dev
 * @see https://openid.net/specs/openid-authentication-2_0.html
 * @see https://api.steampowered.com/ISteamWebAPIUtil/GetSupportedAPIList/v1/
 * 
 * @author Peter Lohse <hanashi@hanashi.eu>
 * @copyright Hanashi Development
 * @license	Freie Lizenz (https://hanashi.dev/freie-lizenz/)
 * @package	WoltLabSuite\Core\System\Steam
 */
class SteamAPI {
	/**
	 * execute a Steam API call
	 * 
	 * @var		string			$interface
	 * @var		string			$method
	 * @var		int				$version
	 * @var		array			$data
	 * @var		bool			$useJSON
	 * @var		string			$httpmethod
	 * @return	array/string	returns an array or a string of Steam API answer
	 */
	public static function execute(string $interface, string $method, int $version, array $data = [], string $httpmethod = 'GET', bool $useJSON = false) {
		if (!STEAM_API_KEY) throw new SteamException('Steam API key not configured.');

		$parameters = [
			'format' => 'json',
			'key' => STEAM_API_KEY
		];
		if ($useJSON && count($data)) {
			$parameters['input_json'] = JSON::encode($data);
		} else {
			$parameters = array_merge($parameters, $data);
		}

		$apiURL = 'http://api.steampowered.com/' . $interface . '/' . $method . '/v' . $version . '/';

		$postParameters = [];
		if ($httpmethod == 'GET') {
			$apiURL .= '?' . http_build_query($parameters, null, '&');
		} else {
			$postParameters = $parameters;
		}

		$request = new HTTPRequest($apiURL, ['method' => $httpmethod], $postParameters);
		try {
			$request->execute();
			$reply = $request->getReply();
			try {
				return JSON::decode($reply['body'], true);
			} catch (SystemException $e) {
				return $reply['body'];
			}
		} catch (HTTPException $e) {
			throw new SteamException('Wrong Steam API call or Steam API is not reachable. (Message: ' . $e->getMessage() . ')');
		} catch (SystemException $e) {
			$reply = $request->getReply();
			try {
				return JSON::decode($reply['body'], true);
			} catch (SystemException $e) {
				return $reply['body'];
			}
		}
	}

	/********************* OpenID *********************/

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
	public static function validateOpenID() : int {
		$params = [];
        foreach ($_GET as $key => $val) {
            if (StringUtil::startsWith($key, 'openid')) {
                $newKey = 'openid.' . substr($key, 7);
                $params[$newKey] = $val;
            }
        }
		$params['openid.mode'] = 'check_authentication';

		$request = new HTTPRequest('https://steamcommunity.com/openid/login', [], $params);
		$request->execute();
		$reply = $request->getReply();
		$content = $reply['body'];

		if (strpos($content, 'is_valid:true') === false) throw new SteamException('Invalid authentication');

		if (!preg_match('/^https:\/\/steamcommunity.com\/openid\/id\/([0-9]+)$/', $params['openid.claimed_id'], $matches)) throw new SteamException('Invalid Steam ID');
		if (empty($matches[1] || !is_numeric($matches[1]))) throw new SteamException('Invalid Steam ID');

		return $matches[1];
	}
}
