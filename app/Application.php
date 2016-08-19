<?php
namespace Thistle;

use Symfony\Component\HttpFoundation\Request;

class Application extends \Silex\Application
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $index_contents;

    /**
     * @var string
     */
    private $url;

    /**
     * @var boolean
     */
    private $debug;

    /**
     * @var array
     */
    private $request;

    /**
     * @var array
     */
    private $thistle_providers;

    /**
     * ------------------------------------------------------------
     * App constructor
     * ------------------------------------------------------------
     * 
     * Thistle App constructor
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);
    }

    public function providers($providers)
    {
        $this->setThistleProviders($providers);
        foreach ($this->getThistleProviders() as $provider => $options) {
            if (!is_array($options)) $this->register(new $options());
            else $this->register(new $provider(), $options);
        }
    }

    public function debug()
    {
        return (isset($this->getConfig()['debug']) && $this->getConfig()['debug'] === true) ? true : false;
    }

    /**
     * @return mixed|string
     */
    public function url()
    {
        $this->setRequest(Request::createFromGlobals());
        return (isset($this->getConfig()['url'])) ? $this->getConfig()['url'] : sprintf('http://%s', $this->getRequest()->server->get('SERVER_NAME'));
    }

    /**
     * ------------------------------------------------------------
     * Version
     * ------------------------------------------------------------
     * 
     * Sets the version from the docblock in index.php
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return string
     */
    public function version()
    {
        foreach ($this->serializeIndexContents() as $row) {
            if (preg_match('/(@version )([0-9.]+[-a-z]*)/', $row, $matches))
                break;
        }

        $this->setVersion($matches[2]);

        return $this->getVersion();
    }

    /**
     * ------------------------------------------------------------
     * Serialize Index Contents
     * ------------------------------------------------------------
     * 
     * Creates array from the rows of index.php
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return array
     */
    public function serializeIndexContents()
    {
        $this->setIndexContents();

        // Clean Windows newlines
        $this->setIndexContents(str_replace("\r\n", "\n", $this->getIndexContents()));

        // Clean Classic Mac newlines
        $this->setIndexContents(str_replace("\r", "\n", $this->getIndexContents()));

        $rows = explode("\n", $this->getIndexContents());

        return $rows;
    }

    /**
     * ------------------------------------------------------------
     * Set Index Contents
     * ------------------------------------------------------------
     * 
     * Sets the Application::index_contents property with the
     * contents of index.php
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param string $index_contents
     */
    public function setIndexContents($index_contents = null)
    {
        $this->index_contents = ($index_contents === null) ? file_get_contents(dirname(__DIR__) . '/index.php') : $index_contents;
    }

    /**
     * ------------------------------------------------------------
     * Get Index Contents
     * ------------------------------------------------------------
     *
     * Returns the contents of index.php
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return string
     */
    public function getIndexContents()
    {
        return $this->index_contents;
    }

    /**
     * ------------------------------------------------------------
     * Set Config
     * ------------------------------------------------------------
     * 
     * Load array of config values
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = json_decode(file_get_contents($config), true);
    }

    /**
     * ------------------------------------------------------------
     * Get Configuration
     * ------------------------------------------------------------
     *
     * Returns array of config values for use throughout our
     * application
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * ------------------------------------------------------------
     * Set Version
     * ------------------------------------------------------------
     *
     * Sets the current version
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * ------------------------------------------------------------
     * Get Version
     * ------------------------------------------------------------
     * 
     * Return version
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return string The current version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * ------------------------------------------------------------
     * Set Url
     * ------------------------------------------------------------
     * 
     * Sets the Application Url
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * ------------------------------------------------------------
     * Get Url
     * ------------------------------------------------------------
     *
     * Return the App Url
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * ------------------------------------------------------------
     * Set Debug
     * ------------------------------------------------------------
     * 
     * Sets the debug property
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * ------------------------------------------------------------
     * Get Debug
     * ------------------------------------------------------------
     * 
     * Return the value of debug
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param array $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param array $thistle_providers
     */
    public function setThistleProviders($thistle_providers)
    {
        $this->thistle_providers = $thistle_providers;
    }

    /**
     * @return array
     */
    public function getThistleProviders()
    {
        return $this->thistle_providers;
    }
}