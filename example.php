<?php

// Make sure to display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('src/jsonRPCClient.php');
require_once('src/daemonRPC.php');

$daemonRPC = new daemonRPC('127.0.0.1', 11787); // Change to match your daemon (waznd) IP address and port; 11787 is the default port for mainnet.
$getblockcount = $daemonRPC->getblockcount();
$on_getblockhash = $daemonRPC->on_getblockhash(50000);
$getlastblockheader = $daemonRPC->getlastblockheader();
$get_connections = $daemonRPC->get_connections();
$get_info = $daemonRPC->get_info();
$hardfork_info = $daemonRPC->hardfork_info();
// $setbans = $daemonRPC->setbans('8.8.8.8');
// $getbans = $daemonRPC->getbans();

require_once('src/walletRPC.php');

$walletRPC = new walletRPC('127.0.0.1', 11789); // Change to match your wallet (wazn-wallet-rpc) IP address and port; 11789 is the customary port for mainnet.
$create_wallet = $walletRPC->create_wallet('wazn_wallet', ''); // Creates a new wallet named wazn_wallet with no passphrase.  Comment this line and edit the next line to use your own wallet
$open_wallet = $walletRPC->open_wallet('wazn_wallet', '');
$get_address = $walletRPC->get_address();
$get_accounts = $walletRPC->get_accounts();
$get_balance = $walletRPC->get_balance();
// $create_address = $walletRPC->create_address(0, 'This is an example subaddress label'); // Create a subaddress on account 0
// $tag_accounts = $walletRPC->tag_accounts([0], 'This is an example account tag');
// $get_height = $walletRPC->get_height();
// $get_transfers = $walletRPC->get_transfers('in', true);
// $incoming_transfers = $walletRPC->incoming_transfers('all');
// $mnemonic = $walletRPC->mnemonic();

?>
<html>
  <body>
    <h1>
      <a href="https://github.com/vermin/wazn-api-php" title="WAZN API PHP">
        wazn-api-php
      </a>
    </h1>
    <p>WAZN API PHP was developed with the intent to create a PHP Library to integrate WAZN into any PHP based code with ease.</p>

    <h2><tt></tt>daemonRPC</h2>
    <p><i>Note: not all methods shown, nor all results from each method.</i></p>
    <dl>
      <dt><tt>getblockcount()</tt></dt>
      <dd>
        <p>Status: <tt><?php echo $getblockcount['status']; ?></tt></p>
        <p>Height: <tt><?php echo $getblockcount['count']; ?></tt></p>
      </dd>
      <dt><tt>on_getblockhash(42069)</tt></dt>
      <dd>
        <p>Block hash: <tt><?php echo $on_getblockhash; ?></tt></p>
      </dd>
      <dt><tt>getlastblockheader()</tt></dt>
      <dd>
        <p>Current block hash: <tt><?php echo $getlastblockheader['block_header']['hash']; ?></tt></p>
        <p>Previous block hash: <tt><?php echo $getlastblockheader['block_header']['prev_hash']; ?></tt></p>
      </dd>
      <dt><tt>get_connections()</tt></dt>
      <dd>
        <p>Connections: <?php echo count($get_connections['connections']); ?></p>
        <?php foreach ($get_connections['connections'] as $peer) { echo '<p><tt>' . $peer['address'] . ' (' . ( $peer['height'] == $getblockcount['count'] ? 'synced' : ( $peer['height'] > $getblockcount['count'] ? 'ahead; syncing' : 'behind; syncing') ). ')</tt></p>'; } ?>
      </dd>
      <dt><tt>get_info()</tt></dt>
      <dd>
        <p>Difficulty: <tt><?php echo $get_info['difficulty']; ?></tt></p>
        <p>Cumulative difficulty: <tt><?php echo $get_info['cumulative_difficulty']; ?></tt></p>
      </dd>
    </dl>

    <h2><tt></tt>walletRPC</h2>
    <p><i>Note: not all methods shown, nor all results from each method.</i></p>
    <dl>
      <!--
      <dt><tt>get_address()</tt></dt>
      <dd>
        <?php foreach ($get_address['addresses'] as $account) { echo '<p>' . $account['label'] . ': <tt>' . $account['address'] . '</tt></p>'; } ?>
      </dd>
      -->
      <dt><tt>get_accounts()</tt></dt>
      <dd>
        <p>Accounts: <?php echo count($get_accounts['subaddress_accounts']); ?></p>
        <?php
          foreach ($get_accounts['subaddress_accounts'] as $account) {
            echo '<p>Account ' . $account['account_index'] . ': <tt>' . $account['base_address'] . '</tt><br />';
            echo 'Balance: <tt>' . $account['balance'] / pow(10, 12) . '</tt> (<tt>' . $account['unlocked_balance'] / pow(10, 12) . '</tt> unlocked)<br />';
            echo ( $account['label'] ) ? 'Label: <tt>' . $account['label'] . '</tt><br />' : '';
            echo ( $account['tag'] ) ? 'Tag: <tt>' . $account['tag'] . '</tt><br />' : '';
            echo '</p>';
          }
        ?>
      </dd>
      <dt><tt>get_balance()</tt></dt>
      <dd>
        <p>Balance: <tt><?php echo $get_balance['balance'] / pow(10, 12); ?></tt></p>
        <p>Unlocked balance: <tt><?php echo $get_balance['unlocked_balance'] / pow(10, 12); ?></tt></p>
      </dd>
    </dl>
  </body>
  <!-- ignore the code below, it's just CSS styling -->
  <head>
    <style>
      body {
        color: #fff;
        background: #081217;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
      }

      a, a:active, a:hover, a:visited {
        text-decoration: none;
        display: inline-block;
        position: relative;
        color: #339933;
      }
      a::after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #339933;
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
      }
      a:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
      }

      dt tt {
        padding: 0.42em;
        background: #1a2637;
        text-shadow: 1px 1px 0px #081217;
      }
      dd tt {
        font-size: 14px;
      }
    </style>
  </head>
</html>
