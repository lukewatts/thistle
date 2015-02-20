<?php

class HTML {

  public $atts;


  /**
   * Generate a link to a CSS file.
   *
   * @param  string $href The path to the css file
   * @param  array  $atts The HTML attributes and properties to be added
   * @return string
   *
   * @since 1.0.0
   */
  public function get_css( $href, $atts = array() ) {

    global $site;
    
    if ( in_array( 'media', $atts ) ) {
      $defaults = array('type' => 'text/css', 'rel' => 'stylesheet');
    }
    else {
      $defaults = array('media' => 'all', 'type' => 'text/css', 'rel' => 'stylesheet');
    }
    
    $atts = $atts + $defaults;
    $atts['href'] = $site['url'] . $site['assets'] . '/' . $href;

    return '<link'. $this->attributes( $atts ) . '>' . PHP_EOL;

  }


  /**
   * Outputs a link to a CSS file.
   *
   * @param  string $href The path to the css file
   * @param  array  $atts The HTML attributes and properties to be added
   * @return string
   *
   * @since 1.0.0
   */
  public function css( $href, $atts = array() ) {

    echo $this->get_css( $href, $atts );

  }


  /**
   * Generate a link to a JavaScript file.
   *
   * @param string $src  The path to the js file
   * @param array  $atts The HTML attributes and properties to be added 
   * @return string
   *
   * @since  1.0.0
   */
  public function get_js( $src, $atts = array() ) {

    global $site;

    $atts['src'] = $site['url'] . $site['assets'] . '/' . $src;

    return '<script'.$this->attributes($atts).'></script>'.PHP_EOL;
  }


  /**
   * Outputs a link to a JS file.
   *
   * @param  string $href The path to the jss file
   * @param  array  $atts The HTML attributes and properties to be added
   * @return string
   *
   * @since 1.0.0
   */
  public function js( $src, $atts = array() ) {

    echo $this->get_js( $src, $atts );

  }


  /**
   * Generate an img tag.
   *
   * @param  string $src  The path to the image
   * @param  array  $atts The HTML attributes and properties to be added
   * @return string
   *
   * @since 1.0.0
   */
  public function get_img( $src, $alt_tag, $atts = array() ) {

    global $site;

    $src = $site['url'] . $site['assets'] . '/' . $src;

    return '<img src="' . $src . '" alt="' . $alt_tag . '"' . $this->attributes( $atts ) . ' />';

  }

  
  /**
   * Outputs an img tag.
   *
   * @param  string $src  The path to the image
   * @param  array  $atts The HTML attributes and properties to be added
   * @return string
   *
   * @since 1.0.0
   */
  public function img( $src, $alt_tag, $atts = array() ) {

    echo $this->get_img( $src, $alt_tag, $atts );

  }
  

  /**
   * Build a single attribute element.
   *
   * @param  string $key
   * @param  string $value
   * @return string
   *
   * @since 1.0.0
   */
  public function attribute( $key, $value ) {
    
    if ( is_numeric( $key ) ) $key = $value;

    if ( ! is_null( $value ) ) return $key . '="' . $value .'"';

  }


  /**
   * Build an HTML attribute string from an array.
   *
   * @param  array $atts
   * @return string
   *
   * @since  1.0.0
   */
  public function attributes( $atts ) {
    
    $html = array();
    
    // For numeric keys we will assume that the key and the value are the same
    // as this will convert HTML attributes such as "required" to a correct
    // form like required="required" instead of using incorrect numerics.
    foreach ( (array) $atts as $key => $value) {
      
      $element = $this->attribute($key, $value);

      if ( ! is_null( $element ) ) $html[] = $element;

    }
    
    return count( $html ) > 0 ? ' ' . implode(' ', $html) : '';

  }

  /**
   * Convert an HTML string to entities.
   *
   * @param  string $value
   * @return string
   *
   * @since 1.0.0
   */
  public function entities( $value ) {
    return htmlentities( $value, ENT_QUOTES, 'UTF-8', false );
  }

}