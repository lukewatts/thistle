<?php

class HTTP {

  public $page;

  /**
   * Return current URI or a specific page URI
   * 
   * @param  string $page A specific page to return
   * @return string       Specified pages URI or current pages uri. Default: Current URI
   *
   * @since 1.0.0
   */
  public function get_uri( $page = null ) {

    global $site;

    $this->page = ( !isset( $page ) || empty( $page ) ) ? '' : $page;

    $uri = $site['url'] . $this->page;

    $uri = strtolower( $uri );
    
    return $uri;

  }

  /**
   * Outputs current URI or a specific page URI
   * 
   * @param  string $page A specific page to return
   * @return void
   *
   * @since 1.0.0
   */
  public function uri( $page = null ) {
    echo $this->get_uri( $page );
  }

  /**
   * Checks if the current page is the home page
   * 
   * @return boolean
   *
   * @since 1.0.0
   */
  public function is_home() {

    $this->page = '/index.php';

    if ( $this->page != $_SERVER[ 'SCRIPT_NAME' ] ) {
      return false;
    }
    else {
      return true;
    }

  }

  /**
   * Return the home page URI unless the current page is the homepage in which case it returns '#'
   * 
   * @return string  Homepage uri or '#' if the current page is home
   *
   * @since 1.0.0
   */
  protected function get_home_uri() {
    global $site;

    $this->page = ( !$this->is_home() ) ? $site['url'] : '#';

    return $this->page;

  }


  /**
   * Outputs the home page URI unless the current page is the homepage in which case it returns '#'
   * 
   * @return string  Homepage uri or '#' if the current page is home
   *
   * @since 1.0.0
   */
  public function home_uri() {
    echo $this->get_home_uri();
  }


  /**
   * Return the page name unless it is the the current page is the current page in which case it returns '#'
   * 
   * @return string  Homepage uri or '#' if the current page is home
   *
   * @since 1.0.0
   */
  protected function get_page() {

    if ( !$this->is_home() ) {
      $page = $_SERVER[ 'SCRIPT_NAME' ];

      $this->page = str_replace( '.php', '', $page );

    }
    else {
      $this->page = '#';
    }

    return $this->page;

  }


  /**
   * Returns the current page name. Can be used to format the name if needed
   * 
   * @param  string $format Format the string to be returned
   * @return string
   * @since  1.1.0
   */
  public function get_page_name( $format = null ) {

    if ( !$this->is_home() ) {
      $page = $_SERVER[ 'SCRIPT_NAME' ];

      $this->page = str_replace( '.php', '', $page );
      $this->page = str_replace('/', '', $this->page );

      if ( !is_null( $format ) ) {
        $formats = array(
          'ucfirst' => ucfirst( $this->page )
        );

        return $formats[$format];
      }
      else {
        return $this->page;
      }

    }
    else {
      return false;
    }

    return $this->page;

  }

  /**
   * Checks if the current page matches the desired page
   * 
   * @return boolean
   *
   * @since 1.0.0
   */
  public function is_page( $page = null ) {

    if ( !$this->is_home() ) {

      if ( !empty( $page ) || !isset( $page ) ) {

        $this_page = $this->get_page_name();

        if ( $this_page == $page ) {
          return true;
        }
        else {
          return false;
        }

      }

    }
    else {
      return false;
    }
  }

  /**
   * Page
   * 
   * Page method is used in links to pages. It will convert page names to lowercase.
   * When on the current page it will output '#' to avoid reload of current page when links
   * are clicked, otherwise it returns the link to the page specified. If no page name
   * is passed in it will simply echo the page it is on.
   * 
   * @param  string $page name of the page you wish to link to
   * @return void
   *
   * @since  1.0.0
   */
  public function page( $page = null ) {

    global $site;

    // Echos the full uri for the page passed through or '#' on current page
    if ( !empty( $page ) || !isset( $page ) ) {

      $page = strtolower($page);

      $this->page = $page;

      $output = ( !$this->is_page( $this->page ) ) ? $site['url'] . $page : '#';

      echo $output;

    }
    
    // Echos the lowercase page name
    if ( $page == null || $page == '' ) {
      $page = $_SERVER['SCRIPT_NAME'];

      $page = str_replace( '/', '', $page );
      $page = str_replace( '.php',  '', $page );

      $this->page = $page;

      $output = ( $this->page == 'index' ) ? 'home' : $this->page;

      echo $output;
    }

  }

}
