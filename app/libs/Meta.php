<?php

class Meta {

  protected $http;

  // TODO: make_title() method to allow easy "on-the-fly" formatting / customizing of get_title()
  
  /**
   * __construct Dependency Injection of HTTP class
   * 
   * @param Object $http HTTP object
   * @return Object $this->http;
   * 
   * @since  1.1.0
   */
  public function __construct( HTTP $http ) {

    $this->http = $http;

  }
  
  /**
   * Returns the title for use in the <title>
   * 
   * @param  array  $sep    The order and charachters to use for separators. (Optional)
   * @return string|boolean Returns string on sucess or false on failure       
   *
   * @since 1.0.0
   */
  public function get_title( $sep = array(': ', ' - ', ' | ') ) {

    if ( !$this->http->is_home() ) {

      $page = $this->http->get_page_name( 'ucfirst' );

      if ( !empty( $page ) || !isset( $page ) ) {

        global $site;

        return $site['seotitle'] . $sep[0] . $site['title'] . $sep[1] . $page;

      }
      else {
        return false;
      }

    }
    else {
      global $site;

      return $site['seotitle'] . $sep[0] . $site['title'];
    }

  }


  /**
   * Outputs the title
   * 
   * @param  array  $sep  The order and charachters to use for separators. (Optional)
   * @return void
   *
   * @since 1.0.0
   */
  public function title( $sep = null ) {
    echo ( !is_null( $sep ) ) ? $this->get_title( $sep ) : $this->get_title();
  }

}