<?php

/**
 * @package helper functions
 */

/**
 * Helper function to generate Disabled/Enabled/Pending labels based on 0/1/2 status input
 * @param int $st
 * @param bool $label if true, it will add bootstrap label class
 * @return string
 */
function get_status_label($st, $label = TRUE) {
    if ($label) {
        switch ($st) {
            case 0:
                return "<span class='label label-danger'>Disabled</span>";
                break;
            case 1:
                return "<span class='label label-success'>Enabled</span>";
                break;
            case 2:
                return "<span class='label label-success'>Pending</span>";
                break;
            default:
                return $st;
        }
    } else {
        switch ($st) {
            case 0:
                return "Disabled";
                break;
            case 1:
                return "Enabled";
                break;
            case 2:
                return "Pending";
                break;
            default:
                return $st;
        }
    }
}



/**
 * Helper function to generate no/yes labels based on 0/1 input
 * @param integer $st
 * @param bool $label
 * @return string
 */
function get_yesno($st, $label = TRUE) {
    if ($label) {
        switch ($st) {
            case 0:
                return "<span class='label label-danger'>" . lang('no') . "</span>";
                break;
            case 1:
                return "<span class='label label-success'>" . lang('yes') . "</span>";
                break;
            default:
                return $st;
        }
    } else {
        switch ($st) {
            case 0:
                return "No";
                break;
            case 1:
                return "Yes";
                break;
            default:
                return $st;
        }
    }
}

/**
 * Wrap and text with bootstrap label
 * @param string $text
 * @param string $label
 * @return string
 */
function wrap_label($text, $label = 'success') {
    return "<span class='label label-$label'>$text</span>";
}

/**
 * Helper function to get clean string to be able to use in url
 * @param string $title
 * @return string
 * @author Ashikur Rahman
 */
function make_alias($string) {
    //return str_replace(array(" ", ",", "'", "\"", "&#39;"), "-", strtolower(trim(html_entity_decode($title))));
    $string = strtolower($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

/**
 * Return multilingual url depending on the current language
 * @param string $url part of url. eg. controller/method
 * @return string
 * @author Ashikur Rahman
 */
function base_url_tr($url = "") {
    $CI = & get_instance();
    $lang = $CI->session->userdata('lang_code');  //suppose language code is saved in session
    if (!$lang || ($lang == "en")) {
        return base_url($url);
    } else {
        return base_url() . $lang . '/' . $url;  //first segement of url is language code. eg: http://www.example.com/it/about
    }
}



/**
 * Modified redirect() function to direct user to url with proper language
 * @param string $url
 * @author Ashikur Rahman
 */
function redirect_tr($url = "") {
    redirect(base_url_tr($url), 'refresh');
}



/**
 * Helper function to get sql formatted date
 * @param string $date input date that needs to be formatted
 * @param string $seperator default seperator is "-". It is provided to identify date seperator properly
 * @param string $format default format is d-m-Y
 * @return string date in SQL format
 */
function sqldate($date, $seperator = "-", $format = "d-m-Y") {
    if ($date) {
        $d = explode($seperator, $date);
        $f = explode($seperator, $format);

        $dd[$f[2]] = $d[2];
        $dd[$f[1]] = $d[1];
        $dd[$f[0]] = $d[0];

        //$finaldate = $m;
        return $dd['Y'] . "-" . $dd['m'] . "-" . $dd['d'];
    } else {
        return false;
    }
}

/**
 * Get d-m-Y formatted date from sql formatted date
 * @param string $d sql formatted date
 * @return string d-m-Y formatted date
 */
function mydate($d, $seperator = "-") {
    if ($d == "0000-00-00") {
        return "";
    }
    $d = explode("-", $d);
    $year = $d[0];
    $month = $d[1];
    $day = $d[2];

    $finaldate = $day . $seperator . $month . $seperator . $year;
    return $finaldate;
}


/**
 * This is a helper function to set an alert (by setting up flash session) and redirect to the desired url. So if you place a js alert script incase there is any flash session, alert will be shown immediately after redirection
 * @param string $url
 * @param string $alert alert message that needs to be displayed
 * @param string $alertType
 * @author Ashikur Rahman
 */
function redirectAlert($url, $alert, $alertType = "success") {
    $CI = & get_instance();
    $CI->session->set_flashdata('alertmsg', $alert); 
    $CI->session->set_flashdata('alertType', $alertType); //success, error etc
    redirect($url); //or redirect_tr()
}

/**
 * helper function to echo js alert with a message
 */
function showAlert($msg) {
    $CI = & get_instance();
    $CI->output->append_output("<script>show_alert('$msg');</script>");
}



/**
 * This function has been used to upload an image using codeigniter's upload library
 * @param string $field_name name of file input
 * @param string $file_name desired filename. if empty, a encrypted name will be used
 * @param string $folder folder to upload the image
 * @param integer $max_width maximum width of image. will be resized if it is more than this
 * @param integer $max_height maximum height of image. will be resized if it is more than this
 * @param integer $min_width minimum width
 * @param integer $min_height minimum height
 * @return array check the return value here: https://www.codeigniter.com/userguide3/libraries/file_uploading.html
 */
function uploadImage($field_name = "userfile", $file_name = "", $folder = "./uploads/", $max_width = "6000", $max_height = "6000", $min_width = "500", $min_height = "500") {
    $CI = & get_instance();
    $config['upload_path'] = $folder;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '6144';
    $config['max_width'] = $max_width;
    $config['max_height'] = $max_height;
    $config['min_width'] = $min_width;
    $config['min_height'] = $min_height;
    if ($file_name) {
        $config['file_name'] = $file_name;
    } else {
        $config['encrypt_name'] = TRUE;
    }


    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($field_name)) {

        return array('error' => $CI->upload->display_errors());
    } else {
        return array('upload_data' => $CI->upload->data());
    }
}

/**
 * This function has been used to upload a file
 * @param string $field_name
 * @param string $file_name
 * @param string $folder
 * @param integer $max_size
 * @return array https://www.codeigniter.com/userguide3/libraries/file_uploading.html
 */
function uploadFile($field_name = "userfile", $file_name = "", $folder = "./uploads/", $max_size = "10000") {
    $CI = & get_instance();
    $config['upload_path'] = $folder;
    $config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|txt|mp3|wav|m4a|oga';
    $config['max_size'] = $max_size;
    if ($file_name) {
        $config['file_name'] = $file_name;
    } else {
        $config['encrypt_name'] = TRUE;
    }

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($field_name)) {
        return array('error' => $CI->upload->display_errors());
    } else {
        return array('upload_data' => $CI->upload->data());
    }
}

/**
 * This function has been used to resize an image during upload
 * @param string $imgsrc path/filename of existing image that you want to resize
 * @param integer $width desired width
 * @param integer $height desired width
 * @param string $newimgsrc incase you need to copy the image to a new path or as a new file, use this. It can include path name also. otherwise keep it blank
 * @param boolean $maintainratio
 */
function resizeImage($imgsrc, $width, $height, $newimgsrc = "", $maintainratio = TRUE) {
    $CI = & get_instance();
    $CI->load->library('image_lib');
    $config['image_library'] = 'gd2';
    $config['source_image'] = $imgsrc;
    if ($newimgsrc) {
        $config['new_image'] = $newimgsrc;
    }
    $config['maintain_ratio'] = $maintainratio;
    $config['width'] = $width;
    $config['height'] = $height;
    $CI->image_lib->initialize($config);

    $CI->image_lib->resize();
    $CI->image_lib->clear();
}

/**
 * This function has been used to save cropped images. Incase coordinates are kept empty, image will be cropped from center based on cropwidth and cropheight.
 * @param integer $x1 x1 axis
 * @param integer $x2 x2 axis
 * @param integer $y1 
 * @param integer $y2
 * @param string $imgsrc
 * @param string $newimgsrc
 * @param integer $cropwidth
 * @param integer $cropheight
 * @return boolean
 */
function saveCroppedImage($x1="", $x2="", $y1="", $y2="", $imgsrc, $newimgsrc, $cropwidth = 100, $cropheight = 100) {
    $CI = & get_instance();
    $data = array();
    $filename = $imgsrc;
    $image_info = getimagesize($filename);
    if ($image_info['mime'] == 'image/png') {
        $image = imagecreatefrompng($filename);
    } else if ($image_info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($filename);
    } else {
        $image = imagecreatefromjpeg($filename);
    }

    $width = imagesx($image);
    $height = imagesy($image);
    if (($x1 == "") && ($y1 == "") && ($x2 == "") && ($y2 == "")) {
        $realrat = $width / $height;
        $croprat = $cropwidth / $cropheight;

        if ($realrat < $croprat) {
            $factor = $width / $cropwidth;
            $cropwidth_new = $width;
            $cropheight_new = $cropheight * $factor;
        } else {
            $factor = $height / $cropheight;
            $cropwidth_new = $cropwidth * $factor;
            $cropheight_new = $height;
        }

        $x1 = $width / 2 - $cropwidth_new / 2;
        $x2 = $width / 2 + $cropwidth_new / 2;
        $y1 = $height / 2 - $cropheight_new / 2;
        $y2 = $height / 2 + $cropheight_new / 2;
    }

    $resized_width = ((int) $x2) - ((int) $x1);
    $resized_height = ((int) $y2) - ((int) $y1);
    //$resized_width = 340;  //We are maintaining the ratio in clientside. Now lets resize to our required size
    // $resized_height = 230;
    $resized_image = imagecreatetruecolor($resized_width, $resized_height);

    //$resized_image = imagecreatetruecolor(340, 230);
    imagecopyresampled($resized_image, $image, 0, 0, (int) $x1, (int) $y1, $width, $height, $width, $height);
    $new_file_name = $newimgsrc;
    imagejpeg($resized_image, $new_file_name);
	
    //$data['cropped_image'] = $img_name;
    //$data['cropped_image_axis'] = (int)$x1.",".(int)$y1.",".(int)$x2.",".(int)$y2;
    imagedestroy($resized_image);
	
	resizeImage($new_file_name,$cropwidth,$cropheight); // final resize using helper function
    return true;
}



/**
 * Get user detail of current user (from session)
 * @param type $key Provide if only particular field should be returned (email,type,displayName,user_id,is_admin)
 * @return mixed
 */
function getUserdata($key = "") {
    $CI = & get_instance();
    if ($CI->session->userdata('userdata')) {
        $userdata = $CI->session->userdata('userdata'); // suppor userdata is an array
        if ($key) {
            return @$userdata[$key];
        } else {
            return $userdata;
        }
    } else {
        return FALSE;
    }
}

/**
 * Helper function to get user detail
 * @param integer $user_id
 * @param string $field if blank, all fields are returned as object. If NOT blank, only provided field is returned.
 * @return mixed
 */
function getUser($user_id, $field = "") {
    $CI = & get_instance();
    $CI->db->where("user_id", $user_id);
    $result = $CI->db->get("user");  //suppose table name is user

    if ($result->num_rows()) {
        $row = $result->row();
        if ($field != "") {
            return $row->$field;
        } else {
            return $row;
        }
    } else {
        return FALSE;
    }
}




/**
 * This function has been used to check whether an email address exists in db or not
 * @param string $email
 * @return boolean
 * @author Ashikur Rahman
 */
function isEmailExist($email) {
    $CI = & get_instance();
    $CI->db->where("user_email", $email);
    $result = $CI->db->get("user");

    if ($result->num_rows()) {
        return TRUE;
    } else {
        return FALSE;
    }
}




/**
 * Makes an array of settings table. Return all the rows and makes an array like this: field1 => value1, field2 => value2
 * @return array
 */
function getSettings() {
    $CI = & get_instance();

    //select settings rows from settings table
    $result = $CI->db->get("settings")->result_array();  //suppose settings table has only 2 fields: set_name and set_value

    $settings = array();
    foreach ($result as $value) {
        $settings[$value["set_name"]] = $value["set_value"];
    }

    return $settings;
}

/**
 * This function returns a specific settings value
 * @return string
 */
function getSettingSingle($set_name) {
    $CI = & get_instance();

    //select settings rows from settings table
    $CI->db->where("set_name", $set_name);
    $q = $CI->db->get("settings");

    if ($q->num_rows()) {
        return $q->row()->set_value;
    } else {
        return FALSE;
    }
}


/**
 * function to check if a mysql date is actually 0.
 * @param date $date
 * @return boolean
 */
function isDateZero($date) {
    if ($date == '0000-00-00') {
        return TRUE;
    } else {
        return FALSE;
    }
}

/**
 * Sometimes we need to print date after making a db query. but problem occurs whtn date is 0. it prints 0 date which looks odd. so this function is used to print nothing incase of 0
 * @param date $date
 * @return boolean
 */
function getValidDate($date) {
    if ($date == '0000-00-00') {
        return "";
    } else {
        return $date;
    }
}



/**
 * This function returns the latitude and longitude from the given address
 * @param string $address
 * @return array
 */
function getGeocode($address) {
    //$cityclean = str_replace(" ", "+", str_replace("#", " ", $address)); //str_replace("-"," "$address)
    //$cityclean = urlencode($address);
    $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geoloc = json_decode(curl_exec($ch), true);

    if ($geoloc['status'] != "OK") {//when there is error
        return array("lat" => "", "long" => "");
    } else {
        $lat = $geoloc["results"][0]["geometry"]["location"]["lat"];
        $long = $geoloc["results"][0]["geometry"]["location"]["lng"];
        return array("lat" => $lat, "long" => $long);
    }
}

/**
 * This function converts from one currency to another. it stores conversion rate in cookie so that rate doesn't need to be fetched frequently
 * @param float $amount
 * @param string $from 3 character currency code. eg. USD
 * @param string $to 3 character currency code. eg. EUR
 * @param integer $symbol_flag
 * @return float
 */
function currency_convert($amount=0, $from, $to, $symbol_flag = 0) {
    $CI = & get_instance();

    if ($from == $to) {

        if ($symbol_flag == "1") {
            return ($amount * 1) . " " . getCurrencySymbol($to);
        } else {
            return ($amount * 1);
        }
    } else {
		
        $cokiename = $from . $to;
        if ($CI->input->cookie($cokiename)) {
            $dollarValue = $CI->input->cookie($cokiename);
        } else {

            $dollarValue = get_currency_conversion_rate($to,$from);

            $CI->input->set_cookie($cokiename, $dollarValue, 43200);
        }

        if ($symbol_flag == "1") {
            return number_format(($dollarValue * $amount), 2, '.', '') . " " . getCurrencySymbol();
        } else {
            return number_format(($dollarValue * $amount), 2, '.', '');
        }

        /*$cokiename = $from . $to;
        if ($CI->input->cookie($cokiename)) {
            $dollarValue = $CI->input->cookie($cokiename);
        } else {
            $url = 'http://download.finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s=' . $from . $to . '=X';
            $handle = fopen($url, 'r');

            if ($handle) {
                $result = fgets($handle, 4096);
                fclose($handle);
            }
            $allData = explode(',', $result); /* Get all the contents to an array */
            /*$dollarValue = $allData[1];

            $CI->input->set_cookie($cokiename, $dollarValue, 43200);
        }

        if ($symbol_flag == "1") {
            return number_format(($dollarValue * $amount), 2, '.', '') . " " . getCurrencySymbol();
        } else {
            return number_format(($dollarValue * $amount), 2, '.', '');
        }*/

        //return number_format(($dollarValue*$amount), 2, '.', '');
        //return $dollarValue*$amount;
    }
}

/**
 * this function returns converstion rate between base currency and currently selected currency. fixer.io is used
 * @return int
 */
function get_currency_conversion_rate($to = "",$base="") {
    if($base){
      $from = $base;
    }else{
      $from = getSettingSingle("currency_code"); //suppose base currency is saved in settings table
    }

    if (!$to) {
        $to = get_currency(); //suppose it returns current currency
    }
    if ($from == $to) {
        return 1;
    }else {
      $url = 'https://api.fixer.io/latest?base='.$from.'&symbols='.$to;
      $handle = fopen($url, 'r');

      if ($handle) {
          $result = fgets($handle, 4096);
          fclose($handle);
      }
      $allData = json_decode($result,true); /* Get all the contents to an array */
      $dollarValue = $allData['rates'][$to];
      return $dollarValue;
    }

}

/**
 * This function returns the current systen currency code i.e. EUR, USD etc
 * @return string
 * @author Jamiul Hasan
 * @author Ashikur Rahman
 */
function get_currency() {
    $CI = & get_instance();

    $userdata = $CI->session->userdata('userdata');
    $user_id = $userdata['user_id'];

    if ($user_id) {
        $currency = $CI->db->where('user_id', $user_id)->get('user')->row()->user_currency; //suppose user's preferred currency is saved in user table

        if ($currency != "") {
            return $currency;
        } elseif ($CI->input->cookie('currency')) {
            return $CI->input->cookie('currency');
        } else {
            return "EUR";
        }
    } elseif (isset($_COOKIE['currency'])) {
        return $_COOKIE['currency'];
    } else {
        return "EUR";
    }
}

/**
 * This function returns the currency symbol from the given curreny code
 * @param string $currency_code
 * @return string|boolean
 * @author Jamiul Hasan
 * @author Ashikur Rahman
 */
function getCurrencySymbol($currency_code = "") {
    if ($currency_code == "") {
        $currency_code = get_currency();
    }

    $CI = & get_instance();
    $CI->db->select("currency_symbol");
    $CI->db->where("currency_code", $currency_code);
    $row = $CI->db->get("currency");
    if ($row->num_rows()) {
        return $row->row()->currency_symbol;
    } else {
        return FALSE;
    }
}





/**
 * Generates pagination links
 * @param string $base_url
 * @param int $total_rows
 * @param int $per_page
 * @return string
 */
function prepare_pagination($base_url, $total_rows, $per_page) {
    $CI = & get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = base_url($base_url);
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['uri_segment'] = $CI->uri->total_segments();

    $config["last_tag_close"] = "</li>";
    $config['full_tag_open'] = '<ul class="pagination pull-right margin-top-0 noti_paging" type="' . $base_url . '">';
    $config['full_tag_close'] = '</ul>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}




/**
 * This function returns full image url incase parameter is not empty, otherwise returns path of a default image
 * @param string $user_image image file name
 * @return string
 */
function load_userImage($user_image) {
    return $user_image ? base_url('uploads/users/thumbs/' . $user_image) : base_url('assets/images/icons/avatar.png');
}



function make_no_cache() {
    header("cache-Control: no-store, no-cache, must-revalidate");
    header("cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
}

/**
*	Get difference between two times
*/
function getTimeDiff($timeFirst, $timeSecond) {
    $timeFirst = strtotime($timeFirst);
    $timeSecond = strtotime($timeSecond);
    $seconds = $timeSecond - $timeFirst;

    $hours = floor($seconds / 3600);
    $mins = floor(($seconds - ($hours * 3600)) / 60);
    $secs = floor($seconds % 60);

    return sprintf("%1$02d:%2$02d:%3$02d", $hours, $mins, $secs);
}



/**
*	Get OS of user
*/

function getOS() {

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $os_platform = "Unknown OS Platform";

    $os_array = array(
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
            break;
        }
    }

    return $os_platform;
}


function get_currencies() {
    $CI = &get_instance();

    $CI->db->select("*");
    $CI->db->where("currency_status", 1);
    $CI->db->order_by("currency_order ASC, currency_code ASC");
    $results = $CI->db->get("currency")->result_array();
    $currencies = array();
    foreach ($results as $row) {
        $currencies[] = $row;
    }

    return $currencies;
}

/**
*	For multilingual site, when we use php date printing month name, it prints in English. We couldn't find a direct way to localize it. So we used this function with language file.
*/
function getTranslatedDate($date) {
    $converted_date = new DateTime($date);
    return lang('month_' . $converted_date->format('M')) . " " . $converted_date->format("j Y"); //Suppose in the language file months are defined like this - $lang['month_Jan'], $lang['month_Feb']
}

/**
*	pass user array (retreived from db), define here an array of fields that you want to count for profile completeness. Finally get the completeness percentage
*/
function get_profile_complete_percentage($user_data) {
    $array = array("user_image", "country_id", "city_id", "user_address", "user_phone");
    $c = 0;
    foreach ($array as $key => $val) {
        if ($user_data[$val]) {
            $c++;
        }
    }
    $percentage = ($c * 100) / count($array);
    return $percentage;
}


