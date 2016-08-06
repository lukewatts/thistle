<?php
return [
    /**
     * ------------------------------------------------------------
     * Password Service Provider
     * ------------------------------------------------------------
     *
     * Provides access to the Password class. The Password class
     * encrypts and verifies passwords as well as setting the
     * appropriate cost for the current server configuration.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.7
     */
    'Thistle\App\Core\Provider\Password\PasswordServiceProvider' => [
        'password.encryption' => PASSWORD_BCRYPT,
        'password.cost' => 8,
        'password.tolerance' => 0.05
    ],

    /**
     * ------------------------------------------------------------
     * Doctrine ORM Service Provider
     * ------------------------------------------------------------
     *
     * Providers access to the Doctrine ORM including the Entity
     * Manager. Requires DoctrineServiceProvider
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.6
     */
    'Thistle\App\Core\Provider\DoctrineORM\DoctrineORMServiceProvider' => [
        'orm.isDevMode' => true,
        'orm.paths'     => [
            __DIR__ . '/entities'
        ]
    ],

    /**
     * ------------------------------------------------------------
     * Doctrine Service Provider
     * ------------------------------------------------------------
     *
     * The Doctrine Service is used to connect to the database and
     * abstract the stand PDO class. It also is required by the
     * DoctrineORMServiceProvider.
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.2
     */
    'Silex\Provider\DoctrineServiceProvider' => [
        'db.options' => $config['db']
    ],

    /**
     * ------------------------------------------------------------
     * Twig Service Provider
     * ------------------------------------------------------------
     *
     * Twig is used for all of Thistle's templates and views
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.1
     */
    'Silex\Provider\TwigServiceProvider' => [
        'twig.path' => __DIR__ . '/views'
    ],

    /**
     * ------------------------------------------------------------
     * Repository Service Provider
     * ------------------------------------------------------------
     *
     * Repositories are a CRUD approximation of the Entity Manager
     *
     * @deprecated 0.0.6 in favour of Entities. Deprecated by Luke Watts
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.1
     */
    'Thistle\App\Core\Provider\Model\ModelServiceProvider' => [
        'models' => model_files_array()
    ],

    /**
     * ------------------------------------------------------------
     * URL Generator Service Provider
     * ------------------------------------------------------------
     *
     * This allow for use or the url and path functions in Twig
     * as well as other benefits outside of Twig
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.3
     */
    'Silex\Provider\UrlGeneratorServiceProvider',
];
