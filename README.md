# WAZN Library
A WAZN Library written in PHP for private payment processing.

## How It Works
This library has 3 main parts:

1. A WAZN daemon JSON RPC API wrapper, `daemonRPC.php`
2. A WAZN wallet (`wazn-wallet-rpc`) JSON RPC API wrapper, `walletRPC.php`
3. A WAZN/Cryptonote toolbox, `cryptonote.php`, with both lower level functions used in WAZN related cryptography and higher level methods for things like generating WAZN private/public keys.

In addition to these features, there are other lower-level libraries included for portability, *eg.* an ed25519 library, a SHA3 library, *etc.*

## Documentation
Documentation can be found in the [`/docs`](https://github.com/vermin/wazn-api-php/tree/dev/docs) folder.

## Configuration
### Requirements
 - WAZN daemon (`waznd`)
 - Webserver with PHP, for example XMPP, Apache, or NGINX
    - cURL PHP extension for JSON RPC API(s)
    - GMP PHP extension for about 100x faster calculations (as opposed to BCMath)

Debian (or Ubuntu) are recommended.

### Getting Started

1. Start the WAZN daemon (`waznd`) on testnet.
```bash
waznd --testnet --detach
```

2. Start the WAZN wallet RPC interface (`wazn-wallet-rpc`) on testnet.
```bash
wazn-wallet-rpc --rpc-bind-port 11789 --disable-rpc-login --wallet-dir /path/to/wallet/directory
```

3. Edit `example.php` with your IP addresses of `waznd` and `wazn-wallet-rpc`

4. Serve `example.php` with your webserver (*eg.* XMPP, Apache/Apache2, NGINX, *etc.*) and navigate to it.  If everything has been set up correctly, information from your WAZN daemon and wallet will be displayed.
