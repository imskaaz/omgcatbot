<?php


namespace app\utils;

class TextHelper
{
	/**
	 * Return all matches of any string from given array in given text
	 * @param $needles array
	 * @param $stock string
	 * @return array
	 */
	public static function findMatchesInText(array $needles, string $stock)
	{
		$matches = [];
		foreach ($needles as $needle) {
			if (strpos($stock, $needle) !== false) {
				$matches[$needle] = true;
			}
		}
		return $matches;
	}
	
	/**
	 * Check existing of found by regexp string in given text
	 *
	 * @param string $text
	 * @param string $regexp
	 *
	 * @return boolean
	 */
	public static function checkTextContainRegexp(string $text, string $regexp)
	{
		$matches = [];
		preg_match_all($regexp, $text, $matches);
		return !empty($matches[0]);
	}
	
	/**
	 * Check existing of found by regexp string in given text
	 *
	 * @param string $text
	 *
	 * @return boolean
	 */
	public static function isAnyUrlFoundInText(string $text)
	{
			return self::checkTextContainRegexp($text,'/(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?/');
	}
	
	/**
	 * Check existing of found by regexp string in given text
	 *
	 * @param string $text
	 *
	 * @return boolean
	 */
	public static function isAnyNicknameInText(string $text)
	{
		return self::checkTextContainRegexp($text,'/\s?@.+\s?/');
	}

}