# mb_trim
### PHP Multibyte Trim Functions.

This is an extension for your PHP Project.
It adds the missing multibyte functions:
`mb_trim()`, `mb_ltrim()` & `mb_rtrim()`

The functions are designed to work the same way other `mb_` functions work.
That means they are essentially the same as the original `trim` functions with
an added encoding parameter.

There are three settings that can be configured in config/extension.ini.
These settings impact how the functions work.

The first one is `mimic_mode` which is set to `true` by default.
When it's enabled the functions will be as close to the originals as possible.

If mimic mode is turned of then the reaming two settings come into play.

`throw_exceptions` is by default set to `false` since the original functions
didn't throw exceptions, but rather triggered notices.
So unless `throw_exceptions` is turned on `trigger_error()` will be used to
throw `E_USER_NOTICE` notices instead.

`character_mask` is used to modify the default character mask.
The character mask is a list of characters that the functions will trim away if 
no character mask parameter is passed to the functions.
`mb_trim` comes with two different character masks.
`:default` is the same as the `trim()` functions. `:new` contains all Unicode
[Cc](http://www.fileformat.info/info/unicode/category/Cc/list.htm) and
[Zs](http://www.fileformat.info/info/unicode/category/Zs/list.htm) characters.
You can also enter a custom string of your own.


Here is the complete list of characters that `:new` removes:
* "\x00" (UNICODE 0 (0x00)), Unicode Character "NULL"
* "\x01" (UNICODE 1 (0x01)), Unicode Character "START OF HEADING"
* "\x02" (UNICODE 2 (0x02)), Unicode Character "START OF TEXT"
* "\x03" (UNICODE 3 (0x03)), Unicode Character "END OF TEXT"
* "\x04" (UNICODE 4 (0x04)), Unicode Character "END OF TRANSMISSION"
* "\x05" (UNICODE 5 (0x05)), Unicode Character "ENQUIRY"
* "\x06" (UNICODE 6 (0x06)), Unicode Character "ACKNOWLEDGE"
* "\x07" (UNICODE 7 (0x07)), Unicode Character "BELL"
* "\x08" (UNICODE 8 (0x08)), Unicode Character "BACKSPACE"
* "\x09" (UNICODE 9 (0x09)), Unicode Character "CHARACTER TABULATION"
* "\x0A" (UNICODE 10 (0x0A)), Unicode Character "LINE FEED (LF)"
* "\x0B" (UNICODE 11 (0x0B)), Unicode Character "LINE TABULATION"
* "\x0C" (UNICODE 12 (0x0C)), Unicode Character "FORM FEED (FF)"
* "\x0D" (UNICODE 13 (0x0D)), Unicode Character "CARRIAGE RETURN (CR)"
* "\x0E" (UNICODE 14 (0x0E)), Unicode Character "SHIFT OUT"
* "\x0F" (UNICODE 15 (0x0F)), Unicode Character "SHIFT IN"
* "\x10" (UNICODE 16 (0x10)), Unicode Character "DATA LINK ESCAPE"
* "\x11" (UNICODE 17 (0x11)), Unicode Character "DEVICE CONTROL ONE"
* "\x12" (UNICODE 18 (0x12)), Unicode Character "DEVICE CONTROL TWO"
* "\x13" (UNICODE 19 (0x13)), Unicode Character "DEVICE CONTROL THREE"
* "\x14" (UNICODE 20 (0x14)), Unicode Character "DEVICE CONTROL FOUR"
* "\x15" (UNICODE 21 (0x15)), Unicode Character "NEGATIVE ACKNOWLEDGE"
* "\x16" (UNICODE 22 (0x16)), Unicode Character "SYNCHRONOUS IDLE"
* "\x17" (UNICODE 23 (0x17)), Unicode Character "END OF TRANSMISSION BLOCK"
* "\x18" (UNICODE 24 (0x18)), Unicode Character "CANCEL"
* "\x19" (UNICODE 25 (0x19)), Unicode Character "END OF MEDIUM"
* "\x1A" (UNICODE 26 (0x1A)), Unicode Character "SUBSTITUTE"
* "\x1B" (UNICODE 27 (0x1B)), Unicode Character "ESCAPE"
* "\x1C" (UNICODE 28 (0x1C)), Unicode Character "INFORMATION SEPARATOR FOUR"
* "\x1D" (UNICODE 29 (0x1D)), Unicode Character "INFORMATION SEPARATOR THREE"
* "\x1E" (UNICODE 30 (0x1E)), Unicode Character "INFORMATION SEPARATOR TWO"
* "\x1F" (UNICODE 31 (0x1F)), Unicode Character "INFORMATION SEPARATOR ONE"
* "\x20" (UNICODE 32 (0x20)), Unicode Character "SPACE"
* "\x7F" (UNICODE 127 (0x7F)), Unicode Character "DELETE"
* "\x80" (UNICODE 128 (0x80)), Unicode Character "&lt;control&gt;"
* "\x81" (UNICODE 129 (0x81)), Unicode Character "&lt;control&gt;"
* "\x82" (UNICODE 130 (0x82)), Unicode Character "BREAK PERMITTED HERE"
* "\x83" (UNICODE 131 (0x83)), Unicode Character "NO BREAK HERE"
* "\x84" (UNICODE 132 (0x84)), Unicode Character "&lt;control&gt;"
* "\x85" (UNICODE 133 (0x85)), Unicode Character "NEXT LINE (NEL)"
* "\x86" (UNICODE 134 (0x86)), Unicode Character "START OF SELECTED AREA"
* "\x87" (UNICODE 135 (0x87)), Unicode Character "END OF SELECTED AREA"
* "\x88" (UNICODE 136 (0x88)), Unicode Character "CHARACTER TABULATION SET"
* "\x89" (UNICODE 137 (0x89)), Unicode Character "CHARACTER TABULATION WITH JUSTIFICATION"
* "\x8A" (UNICODE 138 (0x8A)), Unicode Character "LINE TABULATION SET"
* "\x8B" (UNICODE 139 (0x8B)), Unicode Character "PARTIAL LINE FORWARD"
* "\x8C" (UNICODE 140 (0x8C)), Unicode Character "PARTIAL LINE BACKWARD"
* "\x8D" (UNICODE 141 (0x8D)), Unicode Character "REVERSE LINE FEED"
* "\x8E" (UNICODE 142 (0x8E)), Unicode Character "SINGLE SHIFT TWO"
* "\x8F" (UNICODE 143 (0x8F)), Unicode Character "SINGLE SHIFT THREE"
* "\x90" (UNICODE 144 (0x90)), Unicode Character "DEVICE CONTROL STRING"
* "\x91" (UNICODE 145 (0x91)), Unicode Character "PRIVATE USE ONE"
* "\x92" (UNICODE 146 (0x92)), Unicode Character "PRIVATE USE TWO"
* "\x93" (UNICODE 147 (0x93)), Unicode Character "SET TRANSMIT STATE"
* "\x94" (UNICODE 148 (0x94)), Unicode Character "CANCEL CHARACTER"
* "\x95" (UNICODE 149 (0x95)), Unicode Character "MESSAGE WAITING"
* "\x96" (UNICODE 150 (0x96)), Unicode Character "START OF GUARDED AREA"
* "\x97" (UNICODE 151 (0x97)), Unicode Character "END OF GUARDED AREA"
* "\x98" (UNICODE 152 (0x98)), Unicode Character "START OF STRING"
* "\x99" (UNICODE 153 (0x99)), Unicode Character "&lt;control&gt;"
* "\x9A" (UNICODE 154 (0x9A)), Unicode Character "SINGLE CHARACTER INTRODUCER"
* "\x9B" (UNICODE 155 (0x9B)), Unicode Character "CONTROL SEQUENCE INTRODUCER"
* "\x9C" (UNICODE 156 (0x9C)), Unicode Character "STRING TERMINATOR"
* "\x9D" (UNICODE 157 (0x9D)), Unicode Character "OPERATING SYSTEM COMMAND"
* "\x9E" (UNICODE 158 (0x9E)), Unicode Character "PRIVACY MESSAGE"
* "\x9F" (UNICODE 159 (0x9F)), Unicode Character "APPLICATION PROGRAM COMMAND"
* "\xA0" (UNICODE 160 (0xA0)), Unicode Character "NO-BREAK SPACE"
* "\x1680" (UNICODE 5760 (0x1680)), Unicode Character "OGHAM SPACE MARK"
* "\x2000" (UNICODE 8192 (0x2000)), Unicode Character "EN QUAD"
* "\x2001" (UNICODE 8193 (0x2001)), Unicode Character "EM QUAD"
* "\x2002" (UNICODE 8194 (0x2002)), Unicode Character "EN SPACE"
* "\x2003" (UNICODE 8195 (0x2003)), Unicode Character "EM SPACE"
* "\x2004" (UNICODE 8196 (0x2004)), Unicode Character "THREE-PER-EM SPACE"
* "\x2005" (UNICODE 8197 (0x2005)), Unicode Character "FOUR-PER-EM SPACE"
* "\x2006" (UNICODE 8198 (0x2006)), Unicode Character "SIX-PER-EM SPACE"
* "\x2007" (UNICODE 8199 (0x2007)), Unicode Character "FIGURE SPACE"
* "\x2008" (UNICODE 8200 (0x2008)), Unicode Character "PUNCTUATION SPACE"
* "\x2009" (UNICODE 8201 (0x2009)), Unicode Character "THIN SPACE"
* "\x200A" (UNICODE 8202 (0x200A)), Unicode Character "HAIR SPACE"
* "\x202F" (UNICODE 8239 (0x202F)), Unicode Character "NARROW NO-BREAK SPACE"
* "\x205F" (UNICODE 8287 (0x205F)), Unicode Character "MEDIUM MATHEMATICAL SPACE"
* "\x3000" (UNICODE 12288 (0x3000)), Unicode Character "IDEOGRAPHIC SPACE"
