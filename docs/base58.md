# `base58` class

[`src/base58.php`](https://github.com/vermin/wazn-api-php/tree/dev/src/base58.php)

A PHP Base58 codec

### Methods

 - [`encode`](#encode)
 - [`decode`](#decode)

#### `encode`

Encode a hexadecimal (Base16) string to Base58

Parameters:

 - `$hex <String>` A hexadecimal (Base16) string to convert to Base58

Return: `<String>`

`"WaznPw2YaCNaPT2rqdtQUpTa8Hw2sRrLq72bga53eHDEfEHfMUfca2W2kFBUqQm51gexz5BNjMARLHEqGtjgLLWE2XXxyvZJDs"`

#### `decode`

Decode a Base58 string to hexadecimal (Base16)

Parameters:

 - `$hex <String>` A Base58 string to convert to hexadecimal (Base16)

Return: `<String>`

`"228f34c43a42b7537b7ef877b962fa9d558c5dd37013d54539da81bb7794659fb26af824b0517c3012054aebc287479cbcd8fd9993f6fdd69a3370f3fc44b94fe5d6039e41c2ed5e"`
