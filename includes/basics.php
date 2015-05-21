<?php

/** Get the settings from the configuration INI file. */
$functionSettings = parse_ini_file(
    /** The path to the configuration INI file. */
    $extensionDirectory . 'config' . $ds . 'extension.ini',
    /** TRUE in order to return section names as well. */
    TRUE,
    /** Don't try to parse the values of the settings. */
    INI_SCANNER_RAW
);

/** Determine which settings to use. */
if (is_set($functionSettings[__FUNCTION__])) {
    /** The section with the same name as the function has precedence. */

    /** Set a variable with the function name. */
    $function = __FUNCTION__;

    /** Include a file to set configuration setting variables. */
    include $extensionDirectory . 'includes' . $ds . 'settings' . $php;

} else if (__FUNCTION__ !== 'mb_trim' && is_set($functionSettings['mb_trim']) {
    /** Use mb_trim section since the section for this function isn't set. */

    /** Set a variable with the function name. */
    $function = 'mb_trim';

    /** Include a file to set configuration setting variables. */
    include $extensionDirectory . 'includes' . $ds . 'settings' . $php;

} else {
    /** Fall back on mimic mode. */

    /** Define a mimic mode variable to make the check easier. */
    $mimicMode = TRUE;

}

