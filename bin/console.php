#!/usr/bin/env php
<?php
require(__DIR__.'/../vendor/autoload.php');

$app = new \Illuminate\Container\Container();
$console = new Illuminate\Console\Application($app, new Illuminate\Events\Dispatcher($app), 'dev-master');

$app['config'] = [
    'view.paths' => [__DIR__.'/../build/template'],
    'view.compiled' => __DIR__.'/../build/template/compiled',
];

(new Illuminate\View\ViewServiceProvider($app))->register();
(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();
(new Illuminate\Events\EventServiceProvider($app))->register();

$app->alias('view', \Illuminate\View\Factory::class);

$console->resolve(\Phln\Build\Command\CreateFunctionCommand::class);
$console->resolve(\Phln\Build\Command\CreateBundleCommand::class);
$console->resolve(\Phln\Build\Command\CreateDocsCommand::class);

$console->run();
