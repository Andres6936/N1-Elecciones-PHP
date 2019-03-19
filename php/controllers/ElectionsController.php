<?php

/**
 * Singleton Class.
 * This class cannot be extended.
 */
final class ElectionsController
{
    // Fields

    /**
     * @var ElectionsController Hold the class instance.
     */
    private static $instance = null;

    // Constructs

    /**
     * The constructor is private to prevent initiation
     * with outer code.
     */
    private function __construct()
    {

    }

    // Methods Static

    /**
     * The object is created from within the class itself
     * only if the class has no instance.
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new ElectionsController();
        }

        return self::$instance;
    }

    // Methods

    public function home()
    {
        ob_start();

        include __DIR__ . '/../../Urn.html.php';

        $output = ob_get_clean();

        return ['output' => $output];
    }

    public function list()
    {
        ob_start();

        include __DIR__ . '/../../html/Urn.html.php';

        $output = ob_get_clean();

        return ['output' => $output];
    }

    public function edit()
    {

    }

    public function vote()
    {
        ob_start();

        include __DIR__ . '/../../html/Vote.html';

        $output = ob_get_clean();

        return ['output' => $output];
    }
}
