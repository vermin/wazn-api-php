Wazn API PHP
======================

[![License](https://img.shields.io/badge/license-MIT-brightgreen)](https://opensource.org/licenses/MIT)

Wazn PHP Library & JsonRPC Client for making calls to Wazn Daemon & Wallet RPC API.

## How It Works
This library has 3 main parts:

1. A Wazn Daemon JSON RPC API wrapper, `daemonRPC.php`
2. A Wazn Wallet (`wazn-wallet-rpc`) JSON RPC API wrapper, `walletRPC.php`
3. A Wazn/Cryptonote toolbox, `cryptonote.php`, with both lower level functions used in Wazn related cryptography and higher level methods for things like generating Wazn private/public keys.

In addition to these features, there are other lower-level libraries included for portability, *eg.* an ed25519 library, a SHA3 library, *etc.*

## Documentation
Documentation can be found in the [`/docs`](https://github.com/vermin/wazn-api-php/tree/dev/docs) folder.

## Configuration
### Requirements
 - Wazn Daemon (`waznd`)
 - Webserver with PHP, for example XMPP, Apache, or NGINX
    - cURL PHP extension for JSON RPC API(s)
    - GMP PHP extension for about 100x faster calculations (as opposed to BCMath)

Debian (or Ubuntu) are recommended.

### Getting Started

1. Start the Wazn Daemon (`waznd`) on testnet.
```bash
waznd --testnet --detach
```

2. Start the Wazn Wallet RPC interface (`wazn-wallet-rpc`) on testnet.
```bash
wazn-wallet-rpc --rpc-bind-port 11789 --disable-rpc-login --wallet-dir /path/to/wallet/directory
```

3. Edit `example.php` with your IP address of `waznd` and `wazn-wallet-rpc`.

4. Serve `example.php` with your webserver (*eg.* XMPP, Apache/Apache2, NGINX, *etc.*) and navigate to it.  If everything has been set up correctly, information from your Wazn daemon and wallet will be displayed.

## License
```
Licensed under the MIT
Copyright (c) 2020-2021 WAZN Project
```
