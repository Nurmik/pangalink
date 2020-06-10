<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Example payment usage - Swedbank - Pangalink-net</title>
</head>
<div>
    <div align="left"><a href="https://shop.tak17nurmberg.itmajakas.ee/"><a>Esileht</a></div>
</div>
<body>
<?php
$eesnimi = filter_input(INPUT_POST, 'Eesnimi', FILTER_SANITIZE_STRING);
$perekonnanimi = filter_input(INPUT_POST, 'Perekonnanimi', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
$telefon = filter_input(INPUT_POST, 'Telefon', FILTER_SANITIZE_STRING);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
    "-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDvWpTWWHroyfsi73+Oy04eMDpRZTlfjZWRdZyoU2Zp4M4Plg+7
A1RGOiTGPPCKZbo3kFhoAr5/t2xIugIzx4If0O2xu7LmGfne0HVY5Rhg8Gb02THo
oDBAFikG+mxJCCFaywpx1Oj/F/v3WZ2HTwAK8Zyn9UA4Fo/DNUHVC+2bGQIDAQAB
AoGAJczaYJeMoaL0ZGoKbRSye5YGP8CKtQp5KoW2febd766vHEsIpPI7pvObxyrs
mg7Cv++t5o84YpcnJL0rh93kMK/nEfR38mBkZw88pIU9KiLKljMvLQq3CWg9ePsB
g1rtEd57GS6vJJIXLQMZuBJyQfNZnaFJiBRVkEC1XKYFRPkCQQD/RLAdTSO5CIPU
rk1hkS8L9+c/u+1Fs8jZa9H7cE77hkouih9EtU5338GwfdsUdcum4SpYAhIbtxT8
Kyp3+5JzAkEA8Ao3NGODJkD2xN/vBdYQNI4YSlOYd+sGatJyxT4CJrbyDQS1dNZ1
xtmyUI6NZ9hZLHfkb+aax08YB5R7GnPdQwJBAMibA0hTqeIsxeVrAVbOkMl4DZxx
pFqlmg77g650qS1TcJK4azBEx6C/EGkRzwx6Mgw4YV1+axqqu2wcxCg8ZO8CQQCc
GGiR3uyYYcKXgHA1QWFEa+sL2pTZ1rJToQsVjR9lAa8iHB/MHPJ2H3c/v5PhJeXH
byfURQf9+EdOFpZ/Oz11AkA9VPbc16G1FIT8hj7TYOm+J/wLQYQtCfmglUfsj0iL
ZpN9Lqvkts9fNfHYHvew0gw5KXlAnW7FOQqzz3upzJvP
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
    "VK_SERVICE"     => "1011",
    "VK_VERSION"     => "008",
    "VK_SND_ID"      => "uid644 ",
    "VK_STAMP"       => "12345",
    "VK_AMOUNT"      => $total,
    "VK_CURR"        => "EUR",
    "VK_ACC"         => "EE182200221041094456",
    "VK_NAME"        => $eesnimi . $perekonnanimi,
    "VK_REF"         => "1234561",
    "VK_LANG"        => "EST",
    "VK_MSG"         => "Snus Master",
    "VK_RETURN"      => "http://shop.tak17nurmberg.itmajakas.ee/from-bank.php?action=success",
    "VK_CANCEL"      => "http://shop.tak17nurmberg.itmajakas.ee/from-bank.php?action=cancel",
    "VK_DATETIME"    => date(DATE_ISO8601),
    "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
    str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
    str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
    str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
    str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
    str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
    str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE182200221041094456 */
    str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* Alex Nurmberg */
    str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
    str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
    str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/C587L3v6Qh1fZyzy?payment_action=success */
    str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/C587L3v6Qh1fZyzy?payment_action=cancel */
    str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-05-26T18:59:50+0300 */


// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* OWEBLqXT6glVTpJswmsx7LnPIUZsub+KzvsQjspJeO7YcJr/qs4B9o8siGLsCDavsUBDHedjCnlaWh5uKq+DtQk2nV4dLvi7ZnJyDATo/tSgCXl8b6Qge96tXnH5z9icdjXiWI+IDpDlAcOlZje393ynvcYH89lcVsOZFq+Q0hzQJX0g9oN/BaFWBO2dQGfcfUR7ohwqGQGL2L9RScbqPKF7fIitEZvrt6NGFJiE4hCv+19WNWMo+WABvTMKD0TJT9gMPaZ3CfKm9atB/dheANY8eg0JABa1PrbZXnlS+n3nPt7aodtNFU9Ou0SmGaTcIESeTd0IqpxkMEFaDh1snQ== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

<h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
<p>Makse teostamise näidisrakendus <strong>"Alex Nurmberg "</strong></p>

<form method="post" action="http://localhost:8080/banklink/swedbank-common">
    <!-- include all values as hidden form fields -->
    <?php foreach($fields as $key => $val):?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
    <?php endforeach; ?>

    <!-- draw table output for demo -->
    <table>
        <?php foreach($fields as $key => $val):?>
            <tr>
                <td><strong><code><?php echo $key; ?></code></strong></td>
                <td><code><?php echo htmlspecialchars($val); ?></code></td>
            </tr>
        <?php endforeach; ?>

        <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
        <tr><td colspan="2"><input class="button" type="submit" value="Edasi panga lehele" /></td></tr>
    </table>
</form>

</body>
</html>
