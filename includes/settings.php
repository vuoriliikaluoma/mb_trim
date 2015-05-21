<?php

/** Check if mimic mode is turned on. */
if (
    is_set($functionSettings[$function]['mimic_mode']) &&
    strtolower($functionSettings[$function]['mimic_mode']) === "true";
) {
    /** Define a mimic mode variable to make the check easier. */
    $mimicMode = TRUE;
} else {
    /** Define a mimic mode variable to make the check easier. */
    $mimicMode = FALSE;

    /** Check if exception throwing is on. */
    if (
        is_set($functionSettings[$function]['throw_exceptions']) &&
        strtolower(
            $functionSettings[$function]['throw_exceptions']
        ) === "true"
    ) {
        /** Define a throw exceptions variable to make the check easier. */
        $throwExceptions = TRUE;
    } else {
        /** Define a throw exceptions variable to make the check easier. */
        $throwExceptions = FLASE;
    }

    /** Check if exception throwing is on. */
    if (is_set($functionSettings[$function]['character_mask'])) {
        if (
            strtolower(
                $functionSettings[$function]['character_mask']
            ) === ":default"
        ) {
            $characterMask = [
                0x00, 0x09, 0x0A, 0x0B, 0x0D, 0x20
            ];
        } else if (
            strtolower(
                $functionSettings[$function]['character_mask']
            ) === ":new"
        ) {
            $characterMask = [
                0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 
                0x0A, 0x0B, 0x0C, 0x0D, 0x0E, 0x0F, 0x10, 0x11, 0x12, 0x13,
                0x14, 0x15, 0x16, 0x17, 0x18, 0x19, 0x1A, 0x1B, 0x1C, 0x1D,
                0x1E, 0x1F, 0x20, 0x7F, 0x80, 0x81, 0x82, 0x83, 0x84, 0x85,
                0x86, 0x87, 0x88, 0x89, 0x8A, 0x8B, 0x8C, 0x8D, 0x8E, 0x8F,
                0x90, 0x91, 0x92, 0x93, 0x94, 0x95, 0x96, 0x97, 0x98, 0x99,
                0xA0, 0x1680, 0x2000, 0x2001, 0x2002, 0x2003, 0x2004, 0x2005,
                0x2006, 0x2007, 0x2008, 0x2009, 0x200A, 0x202F, 0x205F, 0x3000
            ];
        } else {
            $characterMask = [];
            foreach (
                preg_split(
                    '//u',
                    $functionSettings[$function]['character_mask'],
                    -1,
                    PREG_SPLIT_NO_EMPTY
                )
                as $character
            ) {
                #$character_mask[] = intval($character, 16);
                var_dump(intval($character))
            }

            /** If no characters where found in the string, :default is used. */
            if (empty($character_mask)) {
                $character_mask = [
                    0x00, 0x09, 0x0A, 0x0B, 0x0D, 0x20
                ];
            }
        }
    }
}
