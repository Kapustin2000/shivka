<?php
/**
 *
 * @package WordPress
 * @subpackage nt_conversi
 * @since nt_conversi 1.0
 *
 */



function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
function shapeSpace_include_custom_jquery() {

    wp_deregister_script('jquery');

}
function add_async_forscript($url)
{
    if (strpos($url, '#defer')===false)
        return $url;
    else if (is_admin())
        return str_replace('#defer', '', $url);
    else
        return str_replace('#defer', '', $url)."' defer='defer";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

function shivka_Subscribe_Save_AJAX( WP_REST_Request $request)
{
    return validate_pod_data('subscribers',$request);
}
function shivka_save_files(){
    $files = [];
    if(isset($_FILES['files'])){
        $files = shivka_reArrayFiles( $_FILES['files']);
        foreach($files as $key=>$attachment){
            if($attachment['error'] == 0 || $attachment['size']<=10*1024*1024){
                move_uploaded_file($attachment['tmp_name'],$attachment['tmp_name']);
            }else{
                unset($files[$key]);
            }
        }
    }
    return $files;
}
add_filter('shivka_save_files','shivka_save_files', 10,1);
function shivka_reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'files/v1', 'save' , array(
        'methods' => 'post',
        'callback' => 'shivka_save_files',
    ) );
} );
add_action( 'rest_api_init', function () {
    register_rest_route( 'blog/v1', 'subscribe' , array(
        'methods' => 'post',
        'callback' => 'shivka_Subscribe_Save_AJAX',
    ) );
} );

function shivka_delete_cv(){
    $res = false;
    if (isset($_POST['files'])) {
        foreach ($_POST['files'] as $attachment) {
            $res = unlink($attachment['tmp_name']);
        }
    }
    return $res;
}
add_filter('shivka_delete_cv','shivka_delete_cv', 10,1);
add_action( 'rest_api_init', function () {
    register_rest_route( 'files/v1', 'delete' , array(
        'methods' => 'post',
        'callback' => 'shivka_delete_cv',
    ) );
} );
function shivka_Contact_Save_AJAX( WP_REST_Request $request)
{
    $validation = validate_pod_data('contact',$request);
    if($validation) {
        foreach($_POST['data'] as $key=>$item){
            $request_data[$item['name']] = $item['value'];
        }
        try {
            require_once 'wp-content/plugins/swift-mailer/lib/swift_required.php';
            $request_data = array();
            foreach($_POST['data'] as $key=>$item){
                $request_data[$item['name']] = $item['value'];
            }
            set_query_var('data', $request_data);
            ob_start();
            include 'wp-content/themes/nt-conversi/templates/post_print.php';
            $html = ob_get_clean();
            $transport = (new Swift_SmtpTransport(SWIFT_server, SWIFT_port, SWIFT_protocol))
                ->setUsername(SWIFT_email)
                ->setPassword(SWIFT_pass)
                ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message("Submitted files"))
                ->setFrom(['info@smarthoop.com.ua' => 'New apply'])
                ->setTo('smarthoop2@gmail.com')
                ->setContentType("text/html")
                ->setBody($html);
            if (isset($_FILES['files'])) {
                foreach ($_FILES['files'] as $attachment) {
                    if ($attachment['size'] <= 10 * 1024 * 1024 && $attachment['tmp_name']) {
                        $message->attach(
                            Swift_Attachment::fromPath($attachment['tmp_name'])->setFilename($attachment['name'])
                        );
                    }
                }
            }
            if ($result = $mailer->send($message)) {
            }
            return $result;
        } catch (Exception $e) {
            //var_dump($e->getMessage(), $e->getTraceAsString());
            $result = $e->getMessage();
            return $result;
        }
    }
    return $validation;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'blog/v1', 'contact' , array(
        'methods' => 'post',
        'callback' => 'shivka_Contact_Save_AJAX',
    ) );
} );


function shivka_Calls_Save_AJAX( WP_REST_Request $request)
{
    $validation = validate_pod_data('calls',$request);
    if($validation) {
        foreach($_POST['data'] as $key=>$item){
            $request_data[$item['name']] = $item['value'];
        }
        try {
            require_once 'wp-content/plugins/swift-mailer/lib/swift_required.php';
            $request_data = array();
            foreach($_POST['data'] as $key=>$item){
                $request_data[$item['name']] = $item['value'];
            }
            set_query_var('data', $request_data);
            ob_start();
            include 'wp-content/themes/nt-conversi/templates/post_print.php';
            $html = ob_get_clean();
            $transport = (new Swift_SmtpTransport(SWIFT_server, SWIFT_port, SWIFT_protocol))
                ->setUsername(SWIFT_email)
                ->setPassword(SWIFT_pass)
                ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message())
                ->setSubject('ПЕРЕЗВОНИТЕ МНЕ')
                ->setFrom(['info@smarthoop.com.ua' => 'SMARTHOOP'])
                ->setTo('smarthoop2@gmail.com')
                ->setContentType("text/html")
                ->setBody($html);
            if (isset($_FILES['files'])) {
                foreach ($_FILES['files'] as $attachment) {
                    if ($attachment['size'] <= 10 * 1024 * 1024 && $attachment['tmp_name']) {
                        $message->attach(
                            Swift_Attachment::fromPath($attachment['tmp_name'])->setFilename($attachment['name'])
                        );
                    }
                }
            }
            if ($result = $mailer->send($message)) {

            }
            return $result;
        } catch (Exception $e) {
            //var_dump($e->getMessage(), $e->getTraceAsString());
            $result = $e->getMessage();
            return $result;
        }
    }
    return $validation;
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'blog/v1', 'calls' , array(
        'methods' => 'post',
        'callback' => 'shivka_Calls_Save_AJAX',
    ) );
} );


function shivka_offset($count) {
    if (!$offset = get_query_var('paged')) $offset = 0;
    if($offset!=1){
        return $count*$offset;
    }else{
        return 0;
    }
}
add_action('filter_query', 'shivka_offset');

function hys_reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
function shivka_save_cv(){
    $files = [];
    if(isset($_FILES['files'])){
        $files = hys_reArrayFiles( $_FILES['files']);
        foreach($files as $key=>$attachment){
            if($attachment['error'] == 0 || $attachment['size']<=10*1024*1024){
                move_uploaded_file($attachment['tmp_name'],$attachment['tmp_name']);
            }else{
                unset($files[$key]);
            }
        }
    }
    return $files;
}
/* CV saving endpoint */
add_filter('shivka_save_cv','shivka_save_cv', 10,1);
add_action( 'rest_api_init', function () {
    register_rest_route( 'cv/v1', 'save' , array(
        'methods' => 'post',
        'callback' => 'shivka_save_cv',
    ) );
} );
function hys_delete_cv(){
    $res = false;
    if (isset($_POST['files'])) {
        foreach ($_POST['files'] as $attachment) {
            $res = unlink($attachment['tmp_name']);
        }
    }
    return $res;
}
add_filter('hys_delete_cv','hys_delete_cv', 10,1);
add_action( 'rest_api_init', function () {
    register_rest_route( 'cv/v1', 'delete' , array(
        'methods' => 'post',
        'callback' => 'hys_delete_cv',
    ) );
} );


function shivka_send_cv(WP_REST_Request $request){
    $validation = validate_pod_data('contact',$request);
    if($validation) {
        try {
            require_once 'wp-content/plugins/swift-mailer/lib/swift_required.php';
            $request_data = array();
            foreach($_POST['data'] as $key=>$item){
                $request_data[$item['name']] = $item['value'];
            }
            set_query_var('data', $request_data);
            ob_start();
            include 'wp-content/themes/nt-conversi/templates/post_print.php';
            $html = ob_get_clean();
            $transport = (new Swift_SmtpTransport(SWIFT_server, SWIFT_port, SWIFT_protocol))
                ->setUsername(SWIFT_email)
                ->setPassword(SWIFT_pass)
                ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message("ЗАПРОС НА ВЫШИВКУ"))
                ->setFrom(['info@smarthoop.com.ua' => 'SMARTHOOP'])
                ->setTo('smarthoop2@gmail.com')
                ->setContentType("text/html")
                ->setBody($html);
            if (isset($_POST['files'])) {
                foreach ($_POST['files'] as $attachment) {
                    if ($attachment['size'] <= 10 * 1024 * 1024 && $attachment['tmp_name']) {
                        $message->attach(
                            Swift_Attachment::fromPath($attachment['tmp_name'])->setFilename($attachment['name'])
                        );
                    }
                }
            }
            return $mailer->send($message);
        } catch (Exception $e) {
            //var_dump($e->getMessage(), $e->getTraceAsString());
            $result = $e->getMessage();
            return $result;
        }
    }
    return $validation;
}
add_filter('shivka_send_cv','shivka_send_cv', 10,1);
add_action( 'rest_api_init', function () {
    register_rest_route( 'cv/v1', 'send' , array(
        'methods' => 'post',
        'callback' => 'shivka_send_cv',
    ) );
} );
function shivka_Order_Save_AJAX( WP_REST_Request $request)
{
    return validate_pod_data('orders',$request);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'order/v1', 'save' , array(
        'methods' => 'post',
        'callback' => 'shivka_Order_Save_AJAX',
    ) );
} );

function shivka_SERVICESAjax()
{
    get_template_part('templates/services-block');
    exit;

}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_shivka_SERVICESAjax', 'shivka_SERVICESAjax');
add_action('wp_ajax_shivka_SERVICESAjax', 'shivka_SERVICESAjax');




function shivka_WORKSAjax()
{
    get_template_part('templates/works-block');
    exit;

}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_shivka_WORKSAjax', 'shivka_WORKSAjax');
add_action('wp_ajax_shivka_WORKSAjax', 'shivka_WORKSAjax');


function shivka_WORKSCATEGORYAjax()
{
    get_template_part('templates/works-category-block');
    exit;

}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_shivka_WORKSCATEGORYAjax', 'shivka_WORKSCATEGORYAjax');
add_action('wp_ajax_shivka_WORKSCATEGORYAjax', 'shivka_WORKSCATEGORYAjax');

function shivka_escapeParam($id){
    return addslashes_gpc($id);
}
function shivka_SetPodsSeo($postId, $isTaxonomy = false,$taxonomy_name = false) {
    if (!empty($postId)) {
        if ($isTaxonomy) {
            if (($taxonomiesMeta = get_option('wpseo_taxonomy_meta')) && (!empty($taxonomiesMeta[$taxonomy_name][$postId]))) {
                $seoTitle = isset($taxonomiesMeta[$taxonomy_name][$postId]['wpseo_title']) ? $taxonomiesMeta[$taxonomy_name][$postId]['wpseo_title'] : '';
                $seoDesc = isset($taxonomiesMeta[$taxonomy_name][$postId]['wpseo_desc']) ? $taxonomiesMeta[$taxonomy_name][$postId]['wpseo_desc'] : '';
                $postUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $seoImage = isset($taxonomiesMeta[$taxonomy_name][$postId]['wpseo_opengraph-image']) ? $taxonomiesMeta[$taxonomy_name][$postId]['wpseo_opengraph-image'] : '' ;
            }
        } else {
            $seoTitle = get_post_meta($postId, '_yoast_wpseo_title', true);
            $seoDesc = get_post_meta($postId, '_yoast_wpseo_metadesc', true);
            $postUrl = get_post_permalink($postId);
            $seoImage = get_post_meta($postId, '_yoast_wpseo_opengraph-image', true);
        }
        if (isset($seoTitle)) {
            add_filter('wpseo_opengraph_title', function () use ($seoTitle) {
                return $seoTitle;
            });
            add_filter('wpseo_title',function () use ($seoTitle) {
                return $seoTitle;
            });
        }
        if (isset($seoDesc)) {
            add_filter('wpseo_opengraph_desc', function () use ($seoDesc) {
                return $seoDesc;
            });
        }
        if (isset($postUrl)) {
            add_filter('wpseo_opengraph_url', function () use ($postUrl) {
                return $postUrl;
            });
        }

        if (isset($seoImage) && $seoImage!="") {
            add_action('wp_head',function() use ($seoImage){
                $sizes = getimagesize($seoImage);
                echo '<meta property="og:image" content="'.$seoImage.'" />';
                echo '<meta property="og:image:width" content="'.$sizes[0].'" />';
                echo '<meta property="twitter:card" content="summary_large_image" />';
                echo '<meta property="og:image:height" content="'.$sizes[1].'" />';
            },10,1);
        }

    }
}



function validate_pod_data($pod_name,$data){
    if(isset($data['data'])){
        $request_data = array();
        foreach($data['data'] as $key=>$item){
            $request_data[$item['name']] = $item['value'];
        }
        $pod = pods( $pod_name);
        $fields = $pod->fields();
        $data = array();
        foreach($fields as $key=>$item){
            if(isset($request_data[$key]) && !empty($request_data[$key])){
                $param = shivka_escapeParam($request_data[$key]);
                if(trim($param) === "" || trim($param) === null){
                    if((bool) $fields[$key]['options']['required']) {
                        header("HTTP/1.0 " . $key . "  can't be empty");
                        exit();
                    }else{
                        $param = "";
                    }
                }
                $data[$key] = $param;
            }else if((bool) $fields[$key]['options']['required']){
                header("HTTP/1.0 ".$key." is required");
                exit();
            }
        }
        $data['post_title'] = date("Y/m/d");

        $new_id = $pod->add($data);

        return $new_id;

    }
    header("HTTP/1.0 No POST Data");
    exit();
}



function nt_conversi_theme_setup() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'nt_conversi_theme_setup' );

function shivka_filters($used_ids = null) {
    $where = '';

    if( isset($_GET['type']) && $_GET['type'] != 'null' && !empty($_GET['type']) && (bool) $_GET['type']){
        $filter1 = explode(',',$_GET['type']);
        foreach($filter1 as $key=>$item){
            $item = (int) shivka_escapeParam($item);
            if($item<=3){
                if ($key == 0) {
                    if(strlen($where)>1){
                        $where .= ' AND ';
                    }
                    $where.=' blog_type.meta_value = '.$item;
                }else{
                    $where.=' OR blog_type.meta_value = "'.$item.'"';
                }
            }
        }
    }

    if($used_ids){
        foreach($used_ids as $key=>$item){
            if ($key == 0) {
                if(strlen($where)>1){
                    $where .= ' AND ';
                }
                $where .= ' id != '.$item;
            }else{
                $where .= ' AND id != '.$item;
            }
        }
    }
    return $where;

}
add_action('filter_query', 'shivka_filters');


add_action( 'pods_api_post_save_pod_item_stock', 'before_stock_create', 10, 3 );

/**
 * Update post terms on save for another associated taxonomy.
 *
 * @param array   $pieces      List of data.
 * @param boolean $is_new_item Whether the item is new.
 * @param int     $id          Item ID.
 */
function before_stock_create( $pieces, $is_new_item, $id ) {
    $emails = array();
    $params = array(
        'where' => "id = ".$id,
    );
    $data = pods('stock')->find($params);
    $template = [
        'title' => 	$data->display('title'),
        'description' =>        $data->display('description'),
        'patch' =>  $data->display('patch'),
        'start_date' =>  $data->display('start_date'),
        'end_date' => $data->display('end_date'),
        'full_description' =>  $data->display('full_description'),
        'image' =>  $data->display('image')

    ];
    set_query_var('template', $template);
    $params = array(
        'where'=>' t.post_status="Draft"',
    );
    $contact  = pods('contact')->find($params);
    while($contact->fetch()){
        array_push($emails,$contact->field('email'));
    }
    $subscribers = pods('subscribers')->find($params);
    while($subscribers->fetch()){
        array_push($emails,$subscribers->field('email'));
    }
    $emails = array_unique($emails);
    try {
        require_once '../wp-content/plugins/swift-mailer/lib/swift_required.php';
        ob_start();
        include '../wp-content/themes/nt-conversi/templates/emails/stock.php';
        $html = ob_get_clean();
        $transport = (new Swift_SmtpTransport(SWIFT_server, SWIFT_port, SWIFT_protocol))
            ->setUsername(SWIFT_email)
            ->setPassword(SWIFT_pass)
            ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
        $message = (new Swift_Message("ЗАПРОС НА ВЫШИВКУ"))
            ->setFrom(['info@smarthoop.com.ua' => 'SMARTHOOP'])
            ->setTo('mikhail.kapustin@hys-enterprise.com')
            ->setContentType("text/html")
            ->setBody($html);
        if (isset($_POST['files'])) {
            foreach ($_POST['files'] as $attachment) {
                if ($attachment['size'] <= 10 * 1024 * 1024 && $attachment['tmp_name']) {
                    $message->attach(
                        Swift_Attachment::fromPath($attachment['tmp_name'])->setFilename($attachment['name'])
                    );
                }
            }
        }
        return $mailer->send($message);
    } catch (Exception $e) {
        //var_dump($e->getMessage(), $e->getTraceAsString());
        $result = $e->getMessage();
        return $result;
    }
}
