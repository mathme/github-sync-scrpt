<?php
//$githubIPs   = array("207.97.227.253", "50.57.128.197", "108.171.174.178", "50.57.231.61", "204.232.175.64", "192.30.252.0" );
//$errorStatus = "HTTP/1.1 500 Internal Server Error";
//if( !in_array( $_SERVER[ "REMOTE_ADDR" ], $githubIPs ) )
//{
//    header( $errorStatus );
//    die;
//}

chdir("/var/www/html/github/reponame" );
//shell_exec( "sudo -u gitwrite sh /var/www/html/github/reponame/sync.sh" );

shell_exec( "sudo -u gitwrite git pull" );
//shell_exec( "sudo -u gitwrite cp -rf /var/www/html/github/reponame /var/www/html/web/reponame" );
//shell_exec( "sudo -u gitwrite rm -rf /var/www/html/web/reponame/.git /var/www/html/web/reponame/sync.sh" );

?>