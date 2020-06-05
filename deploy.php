<?php

namespace Deployer;

(php_sapi_name() !== 'cli') && die('Not CLI');

require_once(__DIR__ . '/vendor/sourcebroker/deployer-loader/autoload.php');
new \SourceBroker\DeployerExtendedWordpress\Loader();

set('repository', 'git@example.com:vendor/project.git');

host('live', '111.111.111.111')
    ->hostname('example.com')->port(22)
    ->user('deploy')
    ->set('public_urls', ['https://www.example.com', 'https://sub.example.com'])
    ->set('deploy_path', '/var/www/example.com.live');

host('beta', '111.111.111.111')
    ->hostname('example.com')->port(22)
    ->user('deploy')
    ->set('public_urls', ['https://beta.example.com', 'https://beta-sub.example.com'])
    ->set('deploy_path', '/var/www/example.com.beta');

host('local')
    ->set('public_urls', ['https://example-com.dev', 'https://sub-example-com.dev'])
    ->set('vhost_nocurrent', true)
    ->set('deploy_path', getcwd());
