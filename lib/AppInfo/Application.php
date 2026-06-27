<?php

namespace OCA\Grauphel\AppInfo;

use \OCP\AppFramework\App;
use \OCA\Grauphel\Tools\Dependencies;
use \OCP\AppFramework\Bootstrap\IBootContext;
use \OCP\AppFramework\Bootstrap\IBootstrap;
use \OCP\AppFramework\Bootstrap\IRegistrationContext;
use \OCP\IDBConnection;
use \OCP\IDateTimeFormatter;
use \OCP\IURLGenerator;
use \OCP\IUserSession;

class Application extends App implements IBootstrap
{
    public const APP_ID = 'grauphel';

    public function __construct(array $urlParams=array())
    {
        parent::__construct('grauphel', $urlParams);

	\OCP\Util::addscript('grauphel', 'loader');
    }

    public function register(IRegistrationContext $context): void
    {
        $context->registerService(
            'Session',
            function($c) {
                return $c->get(IUserSession::class);
            }
        );

        /**
         * Controllers
         */
        $context->registerService(
            'ApiController',
            function($c) {
                Dependencies::init(
                    $c->get(IDBConnection::class),
                    $c->get(IURLGenerator::class)
                );
                return new \OCA\Grauphel\Controller\ApiController(
                    $c->query('AppName'),
                    $c->query('Request'),
                    $c->query('Session')->getUser(),
                    $c->get(IDBConnection::class)
                );
            }
        );
        $context->registerService(
            'OauthController',
            function($c) {
                Dependencies::init(
                    $c->get(IDBConnection::class),
                    $c->get(IURLGenerator::class)
                );
                return new \OCA\Grauphel\Controller\OauthController(
                    $c->query('AppName'),
                    $c->query('Request'),
                    $c->query('Session')->getUser()
                );
            }
        );
        $context->registerService(
            'GuiController',
            function($c) {
                Dependencies::init(
                    $c->get(IDBConnection::class),
                    $c->get(IURLGenerator::class)
                );
                return new \OCA\Grauphel\Controller\GuiController(
                    $c->query('AppName'),
                    $c->query('Request'),
                    $c->query('Session')->getUser(),
                    $c->get(IURLGenerator::class),
                    $c->get(IDateTimeFormatter::class),
                    $c->get(IDBConnection::class)
                );
            }
        );
        $context->registerService(
            'NotesController',
            function($c) {
                Dependencies::init(
                    $c->get(IDBConnection::class),
                    $c->get(IURLGenerator::class)
                );
                return new \OCA\Grauphel\Controller\NotesController(
                    $c->query('AppName'),
                    $c->query('Request'),
                    $c->query('Session')->getUser()
                );
            }
        );
        $context->registerService(
            'TokenController',
            function($c) {
                Dependencies::init(
                    $c->get(IDBConnection::class),
                    $c->get(IURLGenerator::class)
                );
                return new \OCA\Grauphel\Controller\TokenController(
                    $c->query('AppName'),
                    $c->query('Request'),
                    $c->query('Session')->getUser()
                );
            }
        );

        $context->registerSearchProvider('OCA\Grauphel\Search\Provider');
    }

    public function boot(IBootContext $context): void {}
}
?>