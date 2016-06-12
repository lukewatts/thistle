<?php
return [
    /**
     * ------------------------------------------------------------
     * Doctrine Service Provider
     * ------------------------------------------------------------
     *
     * Twig is used for all of Thistle's templates and views
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
     * Twig is used for all of Thistle's templates and views
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.1
     */
    'App\Core\Provider\Model\ModelServiceProvider' => [
        'models' => model_files_array()
    ]
];