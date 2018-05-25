<?php 
/*
*@author        Alex
*@copyritht     Alex
* @since        1.29 2018 
*/

class Base_Controller extends CI_Controller
{

    public $controllerUrl = "";
    public $backUrl = "";

    function __construct()
    {
        parent::__construct();

        $this->load->model('Base_model', 'baseM');

        $this->load->helper('cookie');
    }

    /**
     * Function: show view pages.
     * name of viewfile is classname.
     * @param $data is data to show in view file
     */
    protected function _showPage($data, $viewname='')
    {
        if (empty($viewname))
            $viewname = $this->router->fetch_class();
        $this->load->view('page_layout/head', $data);
        $this->load->view($viewname, $data);
        $this->load->view('page_layout/footer', $data);
    }

    public function validate($data)
    {
        $this->load->library('form_validation');
        $count = sizeof($data);

        for ($i = 0; $i < $count; $i++) {
            $this->form_validation->set_rules($data[$i][0], $data[$i][1], $data[$i][2]);
        }

        return $this->form_validation->run();
    }

    /**
    * json method
    * @param array|object $data
    * @param string $status
    * @param string $message
    * @return json
    * */
    protected function json($data, $status = "success", $message = "")
    {
        return json_encode([
            'response' => $data,
            'status' => $status,
            'message' => $message
        ]);
    }

    /**
    * Session check and Redirect
    **/
    protected function session_check($section) {
        $user_id = $this->session->userdata('id');
        $user_name = $this->session->userdata('username');
        $access = $this->session->userdata($section);
        $session = $this->session->userdata();
        if($user_name == "admin") {
            redirect('users');
        }
        
        if(empty($user_id)) 
            redirect('login');
        else if (!empty($user_id) && $access == 0) {
            $i = 0;
            foreach ($session as $key => $value) {
                if ($value == 1 && $i > 8)
                    redirect($key);
                $i++;
            }
        }
    }

    protected function admin_check() {
        if ($this->session->userdata('username') != 'admin' && $this->session->userdata('ceo') != 1) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    protected function check_session() {
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    protected function get_fcontent( $url,  $javascript_loop = 0, $timeout = 5 ) {
        $url = str_replace( "&amp;", "&", urldecode(trim($url)) );

        // $cookie = tempnam("/tmp", "CURLCOOKIE");
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
        curl_setopt( $ch, CURLOPT_URL, $url );
        // curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        $content = curl_exec( $ch );
        $response = curl_getinfo( $ch );
        curl_close ( $ch );

        if ($response['http_code'] == 301 || $response['http_code'] == 302) {
            ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

            if ( $headers = get_headers($response['url']) ) {
                foreach( $headers as $value ) {
                    if ( substr( strtolower($value), 0, 9 ) == "location:" )
                        return get_url( trim( substr( $value, 9, strlen($value) ) ) );
                }
            }
        }

        if (    ( preg_match("/>[[:space:]]+window\.location\.replace\('(.*)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.*)\"/i", $content, $value) ) && $javascript_loop < 5) {
            return get_url( $value[1], $javascript_loop+1 );
        } else {
            return array( $content, $response );
        }
    }
}