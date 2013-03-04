<?php
/**
 * Devious Concepts
 * ----------------
 * PHP 5.4 functions mb_trim, mb_ltrim, mb_rtrim
 * 
 * @author Kimmo Matias Vuori Liikaluoma <vuoriliikaluoma@gmail.com>
 * @copyright Copyleft 2013 Devious Concepts, No rigths reserved.
 */

/**
 * Make sure to set mb_iternal_encoding in your project!!
 * 
 * The defualt value of mb_internal_encoding is often ISO-8859-1.
 */
#mb_internal_encoding('UTF-8');

if (extension_loaded('mbstring')) {
	if (function_exists('mb_internal_encoding') && is_string(mb_internal_encoding())) {
		if (!function_exists('mb_trim')) {
			function mb_trim($str, $charlist = NULL, $encoding = NULL) {
				if ($encoding === NULL) {
					$encoding = mb_internal_encoding();
				}
				if ($charlist === NULL) {
					$charlist = "\\x{20}\\x{9}\\x{A}\\x{D}\\x{0}\\x{B}";
				} else {
					$chars = preg_split('//u', $charlist, -1, PREG_SPLIT_NO_EMPTY);
					foreach ($chars as &$char) {
						$char = "\\x{" . dechex(substr(mb_encode_numericentity($char, [0x0, 0x10ffff, 0, 0x10ffff], $encoding), 2, -1)) . "}";
					}
					var_dump($chars);
					$charlist = implode('', $chars);
				}
				$pattern = '/(^[' . $charlist . ']+)|([' . $charlist . ']+$)/u';
				return preg_replace($pattern, '', $str);
			}

		} else {
			trigger_error('ERROR (mb_trim): \'mb_trim\' function is already defined.', E_USER_ERROR);
		}
		if (!function_exists('mb_ltrim')) {
			function mb_ltrim($str, $charlist = NULL, $encoding = NULL) {
				if ($encoding === NULL) {
					$encoding = mb_internal_encoding();
				}
				if ($charlist === NULL) {
					$charlist = "\\x{20}\\x{9}\\x{A}\\x{D}\\x{0}\\x{B}";
				} else {
					$chars = preg_split('//u', $charlist, -1, PREG_SPLIT_NO_EMPTY);
					foreach ($chars as &$char) {
						$char = "\\x{" . dechex(substr(mb_encode_numericentity($char, [0x0, 0x10ffff, 0, 0x10ffff], $encoding), 2, -1)) . "}";
					}
					var_dump($chars);
					$charlist = implode('', $chars);
				}
				$pattern = '/(^[' . $charlist . ']+)/u';
				return preg_replace($pattern, '', $str);
			}

		} else {
			trigger_error('ERROR (mb_trim): \'mb_ltrim\' function is already defined.', E_USER_ERROR);
		}
		if (!function_exists('mb_rtrim')) {
			function mb_rtrim($str, $charlist = NULL, $encoding = NULL) {
				if ($encoding === NULL) {
					$encoding = mb_internal_encoding();
				}
				if ($charlist === NULL) {
					$charlist = "\\x{20}\\x{9}\\x{A}\\x{D}\\x{0}\\x{B}";
				} else {
					$chars = preg_split('//u', $charlist, -1, PREG_SPLIT_NO_EMPTY);
					foreach ($chars as &$char) {
						$char = "\\x{" . dechex(substr(mb_encode_numericentity($char, [0x0, 0x10ffff, 0, 0x10ffff], $encoding), 2, -1)) . "}";
					}
					var_dump($chars);
					$charlist = implode('', $chars);
				}
				$pattern = '/([' . $charlist . ']+$)/u';
				return preg_replace($pattern, '', $str);
			}

		} else {
			trigger_error('ERROR (mb_trim): \'mb_rtrim\' function is already defined.', E_USER_ERROR);
		}
	} else {
		trigger_error('ERROR (mb_trim): \'mb_internal_encoding\' must be defined in \'mbstring\' extention. (Different Version?)', E_USER_ERROR);
	}
} else {
	trigger_error('ERROR (mb_trim): PHP extention \'mbstring\' must be loaded.', E_USER_ERROR);
}
