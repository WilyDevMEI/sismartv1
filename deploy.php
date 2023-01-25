<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

// set('repository', 'git@github.com:WilyDevMEI/sismartv1.git');
set('repository', 'https://github.com/WilyDevMEI/sismartv1');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

task('nipe', function () {
    run('git fetch --all');
})->addAfter('deploy:update_code');
// Hosts

set('ssh_type', 'native');
set('remote_user', 'mitoener');
set('identity_file', '~/.ssh/id_ed25519');
set('port', 423);

host('103.55.39.211')
    ->set('http_user', 'mitoener')
    ->set('branch', 'develop')
    ->set('deploy_path', '/home/mitoener/test');
    // ->set('remote_user', 'mitoener')
    // ->set('port', 432)
    // ->set('deploy_path', '~/sismartv1');

// Hooks

desc('Prepares a new release');
task('deploy:prepare', [
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    // 'deploy:writable',
]);


// after('deploy:failed', 'deploy:unlock');
