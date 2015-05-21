<?php
/**
 * Devious Concepts - Multibyte Trim Functions
 * ----------------
 * PHP 5.6 functions mb_trim(), mb_ltrim(), mb_rtrim()
 * 
 * @author Kimmo Matias Vuori Liikaluoma (@vuoriliikaluoma)
 * @copyright Copyleft 2013-2015 Kimmo Matias Vuori Liikaluoma.
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License
 */


/**
 * Only define the functions if PHP extension "mbstring" is loaded.
 *
 * These functions rely heavily on the other mb_xxxx() functions and won't work
 * without them.
 */
if (extension_loaded("mbstring")) {

    /**
     * mb_trim
     * 
     * Strip characters from the beginning and end of a string.
     *
     * This function returns a string with characters stripped from the
     * beginning and end of $str. Without the second parameter, mb_trim() will
     * strip characters based on the setting in the configuration INI file.
     * If it's set to :default it's the same as the trim() functions.
     * :new contains all unicode Cc and Zs characters.
     * Cc: http://www.fileformat.info/info/unicode/category/Cc/list.htm
     * Zs: http://www.fileformat.info/info/unicode/category/Zs/list.htm
     * You can also enter a custom string of your own.
     * 
     * @param string $str The string that will be trimmed.
     * @param string|null $character_mask Optionally, the stripped characters
     * can also be specified using the character_mask parameter. Simply list all
     * characters that you want to be stripped. With .. you can specify a range
     * of characters.
     * @param string|null $encoding The encoding parameter is the character
     * encoding. If it is omitted, the internal character encoding value will
     * be used.
     * @return string|bool The trimmed string. Or FALSE if something went wrong
     * and throw_exceptions setting isn't on.
     */
    function mb_trim(
        /** The string that will be trimmed */
        $str,
        /**
         * Optionally, the stripped characters can also be specified using the
         * character_mask parameter. Simply list all characters that you want
         * to be stripped. With .. you can specify a range of characters.
         *
         * Character mask of NULL will result in the default character mask.
         * See the list of characters in the DocBlock above.
         */
        $character_mask = NULL,
        /** Can't assign mb_internal_encoding() here. (Parse error) */
        $encoding = NULL
    ) {
        /** Define a short directory separator variable. */
        $ds = DIRECTORY_SEPARATOR;

        /** Define a short PHP file extension variable. */
        $php = '.' . pathinfo(__FILE__, PATHINFO_EXTENSION);

        /** Get the directory this extension is in for including files. */
        $extensionDirectory = dirname(__FILE__) . $ds;

        /** Include the basics that are common among all functions. */
        include $extensionDirectory . 'includes' . $ds . 'basics' . $php;
    }
}
