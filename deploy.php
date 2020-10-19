<?php

namespace Deployer;

(php_sapi_name() !== 'cli') && die('Not CLI');

require_once(__DIR__ . '/vendor/sourcebroker/deployer-loader/autoload.php');
new \SourceBroker\DeployerExtendedWordpress\Loader();

set('repository', 'git@example.com:vendor/project.git');

host('live', '111.111.111.111')
    ->hostname('example.com')->port(22)
    ->user('deploy')
    ->set('shared_files', array_merge(get('shared_files'), ['config/.env.live.local']))
    ->set('public_urls', ['https://www.example.com', 'https://sub.example.com'])
    ->set('deploy_path', '/var/www/example.com.live');

host('beta', '111.111.111.111')
    ->hostname('example.com')->port(22)
    ->user('deploy')
    ->set('shared_files', array_merge(get('shared_files'), ['config/.env.beta.local']))
    ->set('public_urls', ['https://beta.example.com', 'https://beta-sub.example.com'])
    ->set('deploy_path', '/var/www/example.com.beta');

host('dev')
    ->set('public_urls', ['https://wordpress-starter.ddev.site', 'https://sub-wordpress-starter.ddev.site'])
    ->set('vhost_nocurrent', true)
    ->set('deploy_path', getcwd());
