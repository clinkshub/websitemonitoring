<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('welcome_message');
        //echo json_encode($status);
    }

    public function get_check_site($site)
    {
        echo json_encode($this->check_site($site));
    }

    private function check_site($site)
    {
        error_reporting(0);
        $http = 'http://www.';
        $this->data['website'] = $http.$site;
        $contents = file_get_contents($this->data['website']);

        $time1 = new DateTime(date('H:i:s'));

        $status = array(
            'status' => true,
            'message' => '',
            'mdata' => $http_response_header,
            'duration' => '',
        );

        if ($contents != null || !empty($http_response_header)) {
            if (strstr($http_response_header[0], '200 OK')) {
                $status['status'] = 'success';
                $status['message'] = '200: Website is Live.';
            } elseif (strstr($http_response_header[0], '404 Not Found')) {
                $status['status'] = 'warning';
                $status['message'] = '404: website is Live. Index file not found';
            } elseif (strstr($http_response_header[0], '302 Found')) {
                $status['status'] = 'warning';
                $status['message'] = '302: This Account has been suspended.Contact your hosting provider.';
            } elseif (strstr($http_response_header[0], '301 Moved Permanently')) {
                if (strstr($http_response_header[10], '200 OK')) {
                    $status['status'] = 'success';
                    $status['message'] = '301/200: Redirection. Website is live.';
                } else {
                    $status['status'] = 'success';
                    $status['message'] = '301: Redirection. Website is live.';
                }
            }
        } else {
            $status['status'] = 'danger';
            $status['message'] = 'Website down/not exist.';
        }

        $time2 = new DateTime(date('H:i:s'));
        $interval = $time1->diff($time2);

        $status['duration'] = $interval->format('%s second(s)');

        return $status;
    }
}
