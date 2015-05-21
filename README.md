# mb_trim
### PHP Multibyte Trim Functions.

This is an extension for your PHP Project.
It adds the missing multibyte functions:
`mb_trim()`, `mb_ltrim()` & `mb_rtrim()`

The functions are designed to work the same way other `mb_` functions work.
That means they are essentialy the same as the original `trim` functions with
an added encoding parameter.

There are three settings that can be configured in config/extenstion.ini.
These settings impact how the functions work.

The first one is `mimic_mode` which is set to `true` by default.
When it's enabled the functions will be as close to the orignals as possible.

If mimic mode is turned of then the remaing two settings come into play.

`throw_exceptions` is by default set to `false` since the original functions
didn't throw exceptions, but rather triggered notices.
So unless `throw_exceptions` is turned on `trigger_error()` will be used to
throw `E_USER_NOTICE` notices instead.

`character_mask` is used to modify the default character mask.
The character mask is a list of carachters that the functions will trim away if 
no character mask parameter is passed to the functions. `mb_trim` comes with two
different character masks. The first one is the same as the one in `trim`. The
second one contains all control characters and whitespace characters. Either of
these can be selected by using the values `:default` or `:new` respectivly. You
can also enter a custom string of characters.
