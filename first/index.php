<?php
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
/* SHA-256 (FIPS 180-4) implementation in JavaScript                  (c) Chris Veness 2002-2019  */
/*                                                                                   MIT Licence  */
/* www.movable-type.co.uk/scripts/sha256.html                                                     */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */


/**
 * SHA-256 hash function reference implementation.
 *
 * This is an annotated direct implementation of FIPS 180-4, without any optimisations. It is
 * intended to aid understanding of the algorithm rather than for production use.
 *
 * While it could be used where performance is not critical, I would recommend using the ‘Web
 * Cryptography API’ (developer.mozilla.org/en-US/docs/Web/API/SubtleCrypto/digest) for the browser,
 * or the ‘crypto’ library (nodejs.org/api/crypto.html#crypto_class_hash) in Node.js.
 *
 * See csrc.nist.gov/groups/ST/toolkit/secure_hashing.html
 *     csrc.nist.gov/groups/ST/toolkit/examples.html
 --------------------------------------------------------------------------------------------------*/
?>

<!DOCTYPE html>
<html>
<head>
<title>Oude Al Oudh - PHP</title>
</head>
<body>
<h1>Oude Al Oudh this is SHA-256 Cryptographic Hash Algorithm</h1>

<?php
    $sha = hash('sha256', 'Oude Al Oudh');
    echo 'The SHA256 hash of "Oude Al Oudh" is: ' . "$sha\n";    
?>
<pre>ASCII ART:

      *********
     *         *
    **         **
    **         **
    **         **
     *         *
      *********
</pre>

    <a href="check.php">Click here to check the error setting</a>
    <br/>
    <a href="fail.php">Click here to cause a traceback</a>
</body>
