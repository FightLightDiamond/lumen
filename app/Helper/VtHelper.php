<?php
/**
 * Description of VtHelper
 * @author pmdv_hoannv13
 */
class Helper
{

  const MOBILE_SIMPLE = '09x';
  const MOBILE_GLOBAL = '849x';
  private static $_logger;
  static $emotions = array(
    '0' => array("text" => ":)", "url" => "/theme/images/icon/1.gif"), //array("text" => ";)", "url" => "/theme/images/icon/3.gif"),
    '1' => array("text" => ":(", "url" => "/theme/images/icon/2.gif"),
    '2' => array("text" => ";)", "url" => "/theme/images/icon/3.gif"), //array("text" => ":)", "url" => "/theme/images/icon/1.gif"),
    '3' => array("text" => ":D", "url" => "/theme/images/icon/4.gif"),
    '4' => array("text" => ";;)", "url" => "/theme/images/icon/5.gif"),
    '5' => array("text" => ">:D<", "url" => "/theme/images/icon/6.gif"),
    '6' => array("text" => ":-/", "url" => "/theme/images/icon/7.gif"),
    '7' => array("text" => ":x", "url" => "/theme/images/icon/8.gif"),
    '8' => array("text" => ":\\\">", "url" => "/theme/images/icon/9.gif"),
    '9' => array("text" => ":P", "url" => "/theme/images/icon/10.gif"),
    '10' => array("text" => ":-*", "url" => "/theme/images/icon/11.gif"),
    '11' => array("text" => "=((", "url" => "/theme/images/icon/12.gif"),
    '12' => array("text" => ":-O", "url" => "/theme/images/icon/13.gif"),
    '13' => array("text" => "X(", "url" => "/theme/images/icon/14.gif"),
    '14' => array("text" => ":>", "url" => "/theme/images/icon/15.gif"),
    '15' => array("text" => "B-)", "url" => "/theme/images/icon/16.gif"),
    '16' => array("text" => ":-S", "url" => "/theme/images/icon/17.gif"),
    '17' => array("text" => "#:-S", "url" => "/theme/images/icon/18.gif"),
    '18' => array("text" => ">:)", "url" => "/theme/images/icon/19.gif"),
    '19' => array("text" => ":((", "url" => "/theme/images/icon/20.gif"),
    '20' => array("text" => ":))", "url" => "/theme/images/icon/21.gif"),
    '21' => array("text" => ":|", "url" => "/theme/images/icon/22.gif"),
    '22' => array("text" => "/:)", "url" => "/theme/images/icon/23.gif"),
    '23' => array("text" => "=))", "url" => "/theme/images/icon/24.gif"),
    '24' => array("text" => "O:-)", "url" => "/theme/images/icon/25.gif"),
    '25' => array("text" => ":-B", "url" => "/theme/images/icon/26.gif"),
    '26' => array("text" => "=;", "url" => "/theme/images/icon/27.gif"),
    '27' => array("text" => ":-c", "url" => "/theme/images/icon/28.gif"),
    '28' => array("text" => ":)]", "url" => "/theme/images/icon/29.gif"),
    '29' => array("text" => "~X(", "url" => "/theme/images/icon/30.gif"),
    '30' => array("text" => ":-h", "url" => "/theme/images/icon/31.gif"),
    '31' => array("text" => ":-t", "url" => "/theme/images/icon/32.gif"),
    '32' => array("text" => "8->", "url" => "/theme/images/icon/33.gif"),
    '33' => array("text" => "I-)", "url" => "/theme/images/icon/34.gif"),
    '34' => array("text" => "8-|", "url" => "/theme/images/icon/35.gif"),
    '35' => array("text" => "L-)", "url" => "/theme/images/icon/36.gif"),
    '36' => array("text" => "(:|", "url" => "/theme/images/icon/37.gif"),
    '37' => array("text" => "=P~", "url" => "/theme/images/icon/38.gif"),
    '38' => array("text" => ":-?", "url" => "/theme/images/icon/39.gif"),
    '39' => array("text" => "#-o", "url" => "/theme/images/icon/40.gif")
  );

  static $emotions_exeption = array(
    '0' => array("text" => ":\">", "url" => "/theme/images/icon/9.gif")
  );

  public static function getListEmotions()
  {
    return self::$emotions;
  }

  public static function replaceEmotions($string)
  {
    $res = $string;
    $count = count(self::$emotions);
    for ($i = $count - 1; $i >= 0; $i--) {
      $res = str_replace(self::$emotions[$i]['text'], self::__appendHeadURL(self::$emotions[$i]['url']), $res);
    }
    if (self::$emotions_exeption) {
      foreach (self::$emotions_exeption as $emotion) {
        $res = str_replace($emotion['text'], self::__appendHeadURL($emotion['url']), $res);
      }
    }
    return $res;
  }

  static function __appendHeadURL($file)
  {
    return '<img src="' . $file . '" alt="emoticon" title="emoticon" />';
  }

   public static function generatePath($path = "medias", $image = 1)
    {
        //return '/medias/'. $path . '/' . date('Y').'/'.date('m').'/'.date('d')."/";

        if ($image == 0){
            $listServers = sfConfig::get('app_media_server_servers');

            $media_number =  count($listServers);


            $days = substr(date('Y-m-d H:i:s', time()), 8, 2);

            $check_sever = $days%$media_number;

            $media_server_domain = $listServers ["server".($check_sever + 1)]["path"];

            $dayFolder = $media_server_domain . $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') . "/";
            $ydir = sfConfig::get('sf_web_dir') . $media_server_domain .$path . '/'. date('Y') . '/';
            $mdir = sfConfig::get('sf_web_dir') . $media_server_domain .$path . '/'. date('Y') . '/' . date('m'). '/';
        }
        else{
            $dayFolder = sfConfig::get('app_image_server_path') . $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') . "/";
            $ydir = sfConfig::get('sf_web_dir') .sfConfig::get('app_image_server_path') .$path . '/'. date('Y') . '/';
            $mdir = sfConfig::get('sf_web_dir') .sfConfig::get('app_image_server_path') .$path . '/'. date('Y') . '/' . date('m'). '/';

        }
        $fullDir = sfConfig::get('sf_web_dir') . $dayFolder;

        if (!is_dir($ydir)) {
            @mkdir($ydir, 0777, true);
            chmod($ydir, 0777);
        }

        if (!is_dir($mdir)) {
            @mkdir($mdir, 0777, true);
            chmod($mdir, 0777);
        }

        if (!is_dir($fullDir)) {
            @mkdir($fullDir, 0777, true);
            chmod($fullDir, 0777);
        }


        return $dayFolder;
    }

  //File will be rewritten if already exists
  public static function writeFile($filename, $newdata)
  {
    $f = fopen($filename, "w");
    fwrite($f, $newdata);
    fclose($f);
  }

  public static function appendFile($filename, $newdata)
  {
    $f = fopen($filename, "a");
    fwrite($f, $newdata);
    fclose($f);
  }

  public static function readFile($filename)
  {
    try {
      $f = fopen($filename, "r");
      $data = fread($f, filesize($filename));
      fclose($f);
      return $data;
    } catch (Exception $e) {
      return null;
    }
  }

  /**
   * Kiem tra co phai so dien thoai khong
   * @author NamDT5
   * @created on Jan 6, 2012
   * @param string $phone_no
   * @return boolean
   */
  public static function isPhoneNumber($phone_no)
  {
    $pattern = '/'. sfConfig::get('app_msisdn_regex_pattern').'/';
    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;

  }

  public static function isViettelPhoneNumber($phone_no)
  {
    $pattern = '/'.sfConfig::get('app_msisdn_regex_pattern_viettel').'/';

    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;
  }

  public static function isVinaPhoneNumber($phone_no)
  {
    $pattern = '/'.sfConfig::get('app_msisdn_regex_pattern_vinaphone').'/';

    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;
  }

  public static function isMobiFonePhoneNumber($phone_no)
  {
    $pattern = '/'.sfConfig::get('app_msisdn_regex_pattern_mobifone').'/';

    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;
  }


  public static function isTypePhone($phone_no)
  {
    $type_msisdn = '';
    if (VtHelper::isViettelPhoneNumber($phone_no)){
      $type_msisdn = 'VIETTEL';
    }else if (VtHelper::isVinaPhoneNumber($phone_no)){
      $type_msisdn = 'Vinaphone';
    }else if (VtHelper::isMobiFonePhoneNumber($phone_no)){
      $type_msisdn = 'MobiFone';
    }else if (VtHelper::isBeelinePhoneNumber($phone_no)){
      $type_msisdn = 'Beeline';
    }else if (VtHelper::isVietnammobilePhoneNumber($phone_no)){
      $type_msisdn = 'VietnamMobile';
    }
    return $type_msisdn;
  }


  public static function isBeelinePhoneNumber($phone_no)
  {
    $pattern = '/'.sfConfig::get('app_msisdn_regex_pattern_beeline').'/';

    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;
  }

  public static function isVietnammobilePhoneNumber($phone_no)
  {
    $pattern = '/'.sfConfig::get('app_msisdn_regex_pattern_vietnammobile').'/';

    preg_match($pattern, $phone_no, $matches);
    if (count($matches) > 0)
    return true;
    return false;
  }

  public static function strBeginWith($needle, $haystack)
  {
    return (substr($haystack, 0, strlen($needle)) == $needle);
  }

  public static function remove084PhoneNumber($phone_no)
  {
    //if (self::isViettelPhoneNumber($phone_no)) {
    if (self::strBeginWith('0', $phone_no)) {
      return substr($phone_no, 1, strlen($phone_no) - 1);
    }
    else if (self::strBeginWith('84', $phone_no)) {
      return substr($phone_no, 2, strlen($phone_no) - 2);
    }
    return $phone_no;
    //}
    return '';
  }

  public static function generatePathFront($path)
  {
    //return '/medias/'.date('Y').'/'.date('m').'/'.date('d')."/";
    $dayFolder = '/medias/' . $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') . "/";

    $fullDir = sfConfig::get('sf_web_dir') . $dayFolder;
    if (!is_dir($fullDir)) {
      @mkdir($fullDir, 0777, true);
    }

    return $dayFolder;
  }


  public static function getSecretPath()
  {
    return sfContext::getInstance()->getUser()->getDmUser()->getMediaDir();
  }


  /**
   * Lay link anh thumbnail<br />
   * Vi du su dung:<br />
   * <img src="<?php VtHelper::getThumbUrl('/medias/huypv/2011/06/15/abc.jpg', 90, 60); ?>" />
   * @param string $source /medias/huypv/2011/06/15/abc.jpg (nam trong thu muc web!)
   * @author huypv
   * @param int $width
   * @param int $height
   * @return string /medias/huypv/2011/06/15/thumbs/abc_90_60.jpg
   */
  public static function getThumbUrl_Local($source, $width = null, $height = null, $type = '')
  {

    switch ($type)
    {
      case 'video':
        $defaultImage = sfConfig::get('app_video_default_image');
        break;
      case 'album':
        $defaultImage = sfConfig::get('app_album_default_image');
        break;
      default:
        $defaultImage = sfConfig::get('app_default_image');
    }

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);

      $app = sfContext::getInstance()->getConfiguration()->getApplication();
      if ($app == 'front') {
        $dir = '/cache' . '/f_' . substr($source, 1, $pos);
      } else if ($app == 'mobile') {
        $dir = '/cache' . '/m_' . substr($source, 1, $pos);
      }else if ($app == 'admin') {
        $dir = '/cache' . '/a_' . substr($source, 1, $pos);
      }

    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;

    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 75);
    if (!is_file($fullPath)) {
      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $dir . $thumbName : $defaultImage;

  }
  
  public static function getThumbUrl_Search_Flashhot($source, $width = null, $height = null, $type = '')
  {
    switch ($type)
    {
      case 'video':
        $defaultImage = sfConfig::get('app_video_default_image');
        break;
      case 'album':
        $defaultImage = sfConfig::get('app_album_default_image');
        break;
      default:
        $defaultImage = sfConfig::get('app_default_image');
    }

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);

      $app = sfContext::getInstance()->getConfiguration()->getApplication();
      //if ($app == 'front') {

      $dir = sfConfig::get('app_image_server_path') . 'images/images_thumb' . '/f_' . substr($source, 1, $pos);

      //} else if ($app == 'mobile') {
      //$dir = '/medias/images_thumb' . '/m_' . substr($source, 1, $pos);
      //}else if ($app == 'admin') {
      //$dir = '/medias/images_thumb' . '/a_' . substr($source, 1, $pos);
      //}

    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
    //$fullThumbPath = sfConfig::get('app_media_link') . $dir . $thumbName;


    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail(700, 293, $scale, true, 100);
    if (!is_file($fullPath)) {
      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');
  
    chmod($mediasDir.$monthdir, 0777);
    chmod($mediasDir . $dir, 0777);
      chmod($fullThumbPath, 0777);
      
    
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $dir . $thumbName : $defaultImage;

  }

  public static function getThumbUrl_Search($source, $width = null, $height = null, $type = '')
  {
    switch ($type)
    {
      case 'video':
        $defaultImage = sfConfig::get('app_video_default_image');
        break;
      case 'album':
        $defaultImage = sfConfig::get('app_album_default_image');
        break;
      default:
        $defaultImage = sfConfig::get('app_default_image');
    }

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);
      //if ($app == 'front') {

      $dir = sfConfig::get('app_image_server_path') . 'images/images_thumb' . '/f_' . substr($source, 1, $pos);

      //} else if ($app == 'mobile') {
      //$dir = '/medias/images_thumb' . '/m_' . substr($source, 1, $pos);
      //}else if ($app == 'admin') {
      //$dir = '/medias/images_thumb' . '/a_' . substr($source, 1, $pos);
      //}

    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
    
    //$fullThumbPath = sfConfig::get('app_media_link') . $dir . $thumbName;


    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 100);
    if (!is_file($fullPath)) {
      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');
	
    chmod($mediasDir.$monthdir, 0777);
    chmod($mediasDir . $dir, 0777);
    chmod($fullThumbPath, 0777);
	  
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $dir . $thumbName : $defaultImage;

  }
  
  public static function getThumbUrl_avatar($source, $width = null, $height = null)
  {
	$defaultImage = sfConfig::get('app_default_image');

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
	
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);

      $app = sfContext::getInstance()->getConfiguration()->getApplication();
      //if ($app == 'front') {

      $dir = sfConfig::get('app_image_server_path') . 'images/images_thumb' . '/f_' . substr($source, 1, $pos);



    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
	  
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
    //$fullThumbPath = sfConfig::get('app_media_link') . $dir . $thumbName;


    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 100);
    if (!is_file($fullPath)) {

      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');
	
    chmod($mediasDir . $dir, 0777);
    chmod($fullThumbPath, 0777);
      
	  
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $thumbName : $defaultImage;

	
	
  }


public static function getThumbUrl_SearchAlbumFlash($source, $width = null, $height = null, $type = '')
  {
    switch ($type)
    {
      case 'video':
        $defaultImage = sfConfig::get('app_video_default_image');
        break;
      case 'album':
        $defaultImage = sfConfig::get('app_album_default_image');
        break;
      default:
        $defaultImage = sfConfig::get('app_default_image');
    }

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);

      $app = sfContext::getInstance()->getConfiguration()->getApplication();
      //if ($app == 'front') {

      $dir = sfConfig::get('app_image_server_path') . 'images/images_thumb' . '/f_' . substr($source, 1, $pos);

      //} else if ($app == 'mobile') {
      //$dir = '/medias/images_thumb' . '/m_' . substr($source, 1, $pos);
      //}else if ($app == 'admin') {
      //$dir = '/medias/images_thumb' . '/a_' . substr($source, 1, $pos);
      //}

    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_246_159.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
    //$fullThumbPath = sfConfig::get('app_media_link') . $dir . $thumbName;


    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 100);
    if (!is_file($fullPath)) {
      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

     if (!is_dir($mediasDir . $dir)) {mkdir($mediasDir . $dir, 0777, true);chmod($mediasDir . $dir, 0777); };
    $thumbnail->save($fullThumbPath, 'image/jpeg');

      chmod($mediasDir . $dir, 0777);
      chmod($fullThumbPath, 0777);
    
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $dir . $thumbName : $defaultImage;

  }
  public static function getThumbUrl($source, $width = null, $height = null, $type = '')
  {

    switch ($type)
    {
      case 'video':
        $defaultImage = sfConfig::get('app_video_default_image');
        break;
      case 'album':
        $defaultImage = sfConfig::get('app_album_default_image');
        break;
      default:
        $defaultImage = sfConfig::get('app_default_image');
    }

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }

    $mediasDir = sfConfig::get('sf_web_dir');

    //    $fullPath = $mediasDir . $source;

    $fullPath = sfConfig::get('app_media_server_domain') . str_replace('/medias', '', $source);

    $pos = strrpos($source, '/');

    if ($pos !== false) {
      $filename = substr($source, $pos + 1);

      $app = sfContext::getInstance()->getConfiguration()->getApplication();
      //if ($app == 'front') {

      $dir = '/medias/images/images_thumb' . '/f_' . substr($source, 1, $pos);

      //} else if ($app == 'mobile') {
      //$dir = '/medias/images_thumb' . '/m_' . substr($source, 1, $pos);
      //}else if ($app == 'admin') {
      //$dir = '/medias/images_thumb' . '/a_' . substr($source, 1, $pos);
      //}

    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return $defaultImage;
      #return false;
    }

    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    //    $fullThumbPath = $mediasDir . $dir . $thumbName;
     
    //$fullThumbPath = sfConfig::get('app_image_server_domain') . str_replace('/medias', '', $dir) . $thumbName;

    $fullThumbPath = sfConfig::get('app_image_server_domain') . $dir . $thumbName;

    return $fullThumbPath;

    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {

      //      if ($type == 'album'){
      //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 10) . $thumbName;
      //      } elseif ($type == 'video') {
      //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 9) . $thumbName;
      //      } else {
      //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 15) . $thumbName;
      //      }
      return $fullThumbPath;

    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 100);
    if (!is_file($fullPath)) {

      //      return $defaultImage;

    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');

    //    if ($type == 'album'){
    //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 10) . $thumbName;
    //    } elseif ($type == 'video') {
    //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 9) . $thumbName;
    //    } else {
    //        return sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 15) . $thumbName;
    //    }
    //return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? sfConfig::get('app_media_link') . '/images_thumb' . '/f_' . substr($source, 1, $pos - 9) . $thumbName : $defaultImage;

  }

  public static function getMobileNumber($msisdn, $type)
  {
    if (empty($type)) $type = self::MOBILE_SIMPLE;
    switch ($type) {
      case self::MOBILE_GLOBAL:
        if ($msisdn[0] == '0')
        return '84' . substr($msisdn, 1);
        else if ($msisdn[0] . $msisdn[1] != '84')
        return '84' . $msisdn;
        else
        return $msisdn;
        break;
      case self::MOBILE_SIMPLE:
        if ($msisdn[0] != '0') return '0' . substr($msisdn, 2);
        else return $msisdn;
        break;
    }
  }

  public static function getExtension($fileName)
  {
    $pos = strrpos($fileName, '.');
    if ($pos !== false) {
      $ext = substr($fileName, $pos + 1);
    } else {
      $ext = 'bin';
    }
    return $ext;
  }
  /**
   * Tao so ngau nhieu
   * @author cuonglv16
   * @created on 04 10, 2012
   * @param int $len Do dai mat khau
   * @return string
   */
  public static function generateRandom($len=6)
  {
    $stringNumber = '';
    for ($i = 1; $i <= $len; $i++)
    {
      $stringNumber .= rand(0, 9);
    }
    return $stringNumber;
  }
  /**
   * Sinh mat khau ngau nhien
   * @author huypv5
   * @created on 03 15, 2011
   * @param int $len Do dai mat khau
   * @return string
   */
  public static function generatePassword($len = 6)
  {
    $len = max(6, $len);
    $chars = '1234567890adgjmptw';
    $nchar = strlen($chars);
    $randPass = '';
    for ($i = 0; $i < $len; $i++) {
      $randomIndex = rand(0, $nchar - 1);
      $randPass .= $chars[$randomIndex];
    }
    return $randPass;
  }

  /**
   * Tao folder khi upload
   * @author ducda2
   * @created on 04 04, 2011
   * @return string
   */
  public static function generateFolder()
  {
    $yearFolder = sfConfig::get('sf_web_dir') . '/medias/' . date('Y');
    $monthFolder = sfConfig::get('sf_web_dir') . '/medias/' . date('Y') . '/' . date('m');
    $dayFolder = sfConfig::get('sf_web_dir') . '/medias/' . date('Y') . '/' . date('m') . '/' . date('d') . "/";

    if (!is_dir($yearFolder)) {
      mkdir($yearFolder, 0777);
    }
    if (!is_dir($monthFolder)) {
      mkdir($monthFolder, 0777);
	  
    }
    if (!is_dir($dayFolder)) {
      mkdir($dayFolder, 0777);
    }
	chmod($dayFolder, 0777);
	
    return $dayFolder;
  }

  /**
   * Tao folder khi upload
   * @author ducda2
   * @created on 04 04, 2011
   * @return string
   */
  public static function generateUserUploadFolder()
  {
    $yearFolder = '/medias/user_upload/' . date('Y');
    $monthFolder = '/medias/user_upload/' . date('Y') . '/' . date('m');
    $dayFolder = '/medias/user_upload/' . date('Y') . '/' . date('m') . '/' . date('d') . "/";

    if (!is_dir(sfConfig::get('sf_web_dir') . $yearFolder)) {
      mkdir(sfConfig::get('sf_web_dir') . $yearFolder, 0777);
    }
    if (!is_dir(sfConfig::get('sf_web_dir') . $monthFolder)) {
      mkdir(sfConfig::get('sf_web_dir') . $monthFolder, 0777);
    }
    if (!is_dir(sfConfig::get('sf_web_dir') . $dayFolder)) {
      mkdir(sfConfig::get('sf_web_dir') . $dayFolder, 0777);
    }
	
	chmod($dayFolder, 0777);
    return $dayFolder;
  }

  /**
   * Lay ra ten folder khi upload
   * @author ducda2
   * @created on 04 04, 2011
   * @return string
   */
  public static function generateShortPath()
  {
    return 'medias/' . date('Y') . '/' . date('m') . '/' . date('d');
  }

  /**
   * Tao ra 1 ten UUID (Universally Unique IDentifier)
   * @author huypv5
   * @created on 03 23, 2011
   * @param string $dir
   * @param int $timestamp
   * @param string $ext
   * @return string
   */
  public static function generateUniqueFileName($ext)
  {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    // 32 bits for "time_low"
    mt_rand(0, 0xffff), mt_rand(0, 0xffff),

    // 16 bits for "time_mid"
    mt_rand(0, 0xffff),

    // 16 bits for "time_hi_and_version",
    // four most significant bits holds version number 4
    mt_rand(0, 0x0fff) | 0x4000,

    // 16 bits, 8 bits for "clk_seq_hi_res",
    // 8 bits for "clk_seq_low",
    // two most significant bits holds zero and one for variant DCE1.1
    mt_rand(0, 0x3fff) | 0x8000,

    // 48 bits for "node"
    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    ) . '.' . $ext;
  }

  /**
   *
   * Kiem tra neu chua login thi khong dung duoc chuc nang tuong ung
   * @author Namdt
   * @created on 04 07, 2011
   * @return sfUser
   */
  /*  public static function checkLoginToUse()
   {
   $context = sfContext::getInstance();

   $sf_user = $context->getUser();


   $isLogin     = $sf_user->isPixAuthenticated();

   if (!$isLogin)
   {
   $sf_user->setFlash('msg', sfConfig::get('app_msg1'));

   if($context->getConfiguration()->getApplication() == 'mobile')
   {
   $context->getController()->redirect('@message');
   }else
   {
   $context->getController()->redirect('@login');
   }

   }
   // Neu da login thi tra ve user tuong ung
   return $sf_user;
   }*/
  /**
   * Tra ve duong dan toi file default
   * @author NamDT5
   * @created on Apr 21, 2011
   * @param string $type
   */
  public static function getDefault($w = null, $h = null, $type = 'media')
  {
    // 'http://'. sfConfig::get('app_domain'). '/'.
    $domain = $domain = 'http://' . $_SERVER['HTTP_HOST'] . '/';

    if (!$w && !$h) {
      // Neu khong truyen width height thi tra ve anh default goc
      return $domain . sfConfig::get('app_default_' . $type . '_path');
    }

    $thumbName = $type . '_' . (($w) ? $w : 'auto') . '_' . (($h) ? $h : 'auto') . '.jpg';
    $thumbPath = sfConfig::get('sf_web_dir') . '/medias/defaults/';

    switch ($type)
    {
      case 'media':
        $source = sfConfig::get('sf_web_dir') . '/' . sfConfig::get('app_default_media_path');
        break;
      case 'avatar':
        $source = sfConfig::get('sf_web_dir') . '/' . sfConfig::get('app_default_avatar_path');
        break;
      default:
    }
    $scale = ($w != null && $h != null) ? false : true;
    $thumbnail = new sfThumbnail($w, $h, $scale, true, 90);
    $thumbnail->loadFile($source);
    // Luu anh thumb
    $thumbnail->save($thumbPath . $thumbName, 'image/jpeg');

    return $domain . 'medias/defaults/' . $thumbName;
    die();
  }

  /**
   * Ham loai bo tat ca cac the html
   * @author NamDT5
   * @created on May 19, 2011
   * @param string $str - Xau can loai bo tag
   * @param array $tags - Mang cac tag se strip, vi du: array('a', 'b')
   * @param boolean $stripContent
   * @return String
   */
  public static function strip_html_tags($str, $tags = array(), $stripContent = false)
  {
    if (empty($tags)) {
      $tags = array("!--", "!--...--", '!doctype', 'a', 'abbr', 'address', 'area', 'article', 'aside', 'audio', 'b', 'base', 'bb', 'bdo', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'cite', 'code', 'col', 'colgroup', 'command', 'datagrid', 'datalist', 'dd', 'del', 'details', 'dfn', 'div', 'dl', 'dt', 'em', 'embed', 'eventsource', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'mark', 'map', 'menu', 'meta', 'meter', 'nav', 'noscript', 'object', 'ol', 'optgroup', 'option', 'output', 'p', 'param', 'pre', 'progress', 'q', 'ruby', 'rp', 'rt', 'samp', 'script', 'section', 'select', 'small', 'source', 'span', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'ul', 'var', 'video', 'wbr');
    }

    $content = '';
    if (!is_array($tags)) {
      $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
      if (end($tags) == '') array_pop($tags);
    }
    foreach ($tags as $tag)
    {
      if ($stripContent)
      $content = '(.+</' . $tag . '(>|\s[^>]*>)|)';
      $str = preg_replace('#</?' . $tag . '(>|\s[^>]*>)' . $content . '#is', '', $str);
      $str = str_replace('<' . $tag, $tag, $str);
    }
    return $str;
  }

  public static function encodeOutput($string)
  {
    $app = sfContext::getInstance()->getConfiguration()->getApplication();

    if ($app == 'front' || $app == 'mobile')
    {
      /*Thuc hien ma hoa va khong ma hoa cac ky tu dac biet thuong dc su dung */
      $string = htmlentities($string, ENT_COMPAT, 'UTF-8');
      $string = str_replace("&lt;","<",$string);
      $string = str_replace("&gt;",">",$string);
      $string = str_replace("&quot;",'"',$string);
      $string = str_replace("&amp;",'&',$string);
      return $string;
    } else
    {
      return $string;
    }
  }
  public static function encodeOutputRemarketing($string)
    {

        /* Thuc hien ma hoa va khong ma hoa cac ky tu dac biet thuong dc su dung */
        $string = strip_tags($string);
        $string = htmlspecialchars($string, ENT_QUOTES);
        //$string = htmlspecialchars($string, ENT_NOQUOTES);
        $string = str_replace("&apos;s", "", $string);
        $string = str_replace("&#039;", "", $string);
        $string = str_replace("&lt;", "<", $string);
        $string = str_replace("&gt;", ">", $string);
        $string = str_replace("&quot;", '"', $string);
        $string = str_replace("&amp;", '&', $string);
        $string = preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $string);


        return $string;
    }


  function mysubstr($str, $length = 6)
  {
    return (strlen($str) > $length) ? substr($str, 0, $length) . '..' : $str;
  }

  function base64url_encode($plainText)
  {
    $base64 = base64_encode($plainText);
    $base64url = strtr($base64, '+/=', '');
    return $base64url;
  }

  function timeago($date)
  {
    if (empty($date)) {
      return _vi("No date provided");
    }

    #$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $periods = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỷ");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $unix_date = strtotime($date);

    // check validity of date
    if (empty($unix_date)) {
      return "Bad date";
    }

    if (abs($unix_date - $now) < 60)
    return _vi('vừa xong');

    // is it future date or past date
    if ($now > $unix_date) {
      $difference = $now - $unix_date;
      $tense = _vi("trước");
    } else {
      $difference = $unix_date - $now;
      $tense = "sau";
    }

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
      $difference /= $lengths[$j];
    }

    $difference = round($difference);
    #if($difference != 1) {
    #    $periods[$j].= "s";
    #}

    return _vi("$difference $periods[$j] {$tense}");
  }

  function _vi($str)
  {
    return $str;
  }

  public static function formatDay($time, $format = "D, d/m/Y | h:i")
  {
    $str_search = array(
      "Mon",
      "Tue",
      "Wed",
      "Thu",
      "Fri",
      "Sat",
      "Sun",
    );

    $str_replace = array(
      "Thứ Hai",
      "Thứ Ba",
      "Thứ Tư",
      "Thứ Năm",
      "Thứ Sáu",
      "Thứ Bảy",
      "Chủ Nhật",
    );

    $timenow = date($format, $time);
    return str_replace($str_search, $str_replace, $timenow);
  }

  /**
   * Kiem tra so dien thoai va ma so ca nhan co khop nhau khong
   * @author huypv
   * @created on 04 27, 2011
   * @param string $msisdn So dien thoai kiem tra 849x
   * @param string $mscn Ma so ca nhan (SMS: TRAMA gui 143)
   * @return boolean
   */
  public static function checkMSCN($msisdn, $mscn)
  {
    $arrService = sfYaml::load(sfConfig::get('sf_config_dir') . '/webservice.yml');
    $arrMSCNService = $arrService['mscn'];

    $wsdl = $arrMSCNService['wsdl'];
    $appCode = $arrMSCNService['appCode'];
    $appPassword = $arrMSCNService['appPassword'];
    sfContext::getInstance()->getLogger()->log('{msisdn} WSDL kiem tra MSCN: ' . $wsdl);
    $options = array(
      'connect_timeout' => $arrMSCNService['connect_timeout'],
      'timeout' => $arrMSCNService['response_timeout']
    );

    $result = null;
    try {
      $client = new TimeoutSoapClient($wsdl, $options);
      $result = $client->__soapCall('checkMSCN', array(array('msisdn' => $msisdn, 'mscn' => $mscn,
        'appCode' => $appCode,
        'appPassword' => $appPassword
      )));
    } catch (Exception $e) {
      sfContext::getInstance()->getLogger()->log('{msisdn} Kiem tra MSCN gap ngoai le: ' . $e->getMessage());
    }

    if (is_object($result)) {
      sfContext::getInstance()->getLogger()->log('{msisdn} Kiem tra MSCN cho: ' . $msisdn . ' - ' . $mscn . ' -> ' . $result->checkMSCN);
      return intval($result->checkMSCN) === 0;
    } else {
      sfContext::getInstance()->getLogger()->log('{msisdn} Kiem tra MSCN cho: ' . $msisdn . ' - ' . $mscn . ' -> response no object!');
      return false;
    }
    return true;
  }

  public static function genRandomString($length = 8)
  {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($p = 0; $p < $length; $p++) {
      $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
  }

  public static function getWeekRange($date)
  {
    $ts = strtotime($date);

    $start = (date('w', $ts) == 0) ? $ts : strtotime('last monday', $ts);
    return array('start' => date('Y-m-d', $start),
      'end' => date('Y-m-d', strtotime('next sunday', $start)));
  }

  public static function getWeekFromDay($str)
  {
    $iStr = strtotime($str);

    $i = date('N', strtotime($str));

    $d = $i - 1;
    $d2 = 7 - $i;

    $start = date('Y-m-d', strtotime("- $d days", $iStr));
    $end = date('Y-m-d', strtotime("+ $d2 days", $iStr));

    return array('start' => $start, 'end' => $end);
  }
  public static function getDayofWeekAgo($str)
  {
    $iStr = strtotime($str);

    $start = date('Y-m-d', strtotime("- 7 days", $iStr));

    return array('start' => $start);
  }
  public static function getDayofMonthAgo($str)
  {
    $iStr = strtotime($str);

    $start = date('Y-m-d', strtotime("- 30 days", $iStr));

    return array('start' => $start);
  }
  public static function getWeekNoByDay($year = 2007,$month = 5,$day = 5)
  {
    return ceil(($day + date("w",mktime(0,0,0,$month,1,$year)))/7);
  }
  public static function bindAddMusicBox($VtSong, $type = 0)
  {
    if ($VtSong)
    {
      if(sfContext::getInstance()->getUser()->isVtAuthenticated())
      {
        if (!$type) {
          $res = '<a title="Thêm vào musicbox" href="javascript: addSongToFavourite({'
          . 'id:\'' . $VtSong->getIdentify() . '\'})"'
          . 'class="icon-add add-box-music link_fav_' . $VtSong->getIdentify() . '"></a>';
        } else if ($type == 1) {
          $res = '<a title="Thêm vào musicbox" href="javascript: addSongToFavourite({'
          . 'id:\'' . $VtSong->getIdentify() . '\'})"'
          . 'class="icon2 add-box-music link_fav_' . $VtSong->getIdentify() . '"></a>';
        }
      }else
      {
        $res = '<a title="Thêm vào musicbox" href="#sign-in" vthref="/user/getsignin" rel="#overlay-login"'
        . 'class="icon-add add-box-music link_fav_' . $VtSong->getIdentify() . ' link_signin "></a>';
      }
      return $res;
    }
    return '';
  }

  /*
   * Author: ducnmi.evnit@evn.com.vn
   * Update Ajact Click Play Counter
   */

  public static function bindPlayHiddenPlayer($buid, $uid, $path, $Identify=NULL)
  {
    if($Identify)
    {

      if ($path) {
        $res = '<a class="icon-play iplay' . $uid . '" '
        . 'href="javascript:playMusicHidden(\'hiddenPlayerMagic' . $buid . '\',\''
        . $uid . '\',\'' . base64_encode($path) . '\',205);" vthref="'
        . url_for('@countlisten_ajax?song_identify=' . $Identify) . '"></a>';
        return $res;
      }
    }
    else
    {
      if ($path) {
        $res = '<a title="Play bài hát" class="icon-play iplay' . $uid . '" '
        . 'href="javascript:playMusicHidden(\'hiddenPlayerMagic' . $buid . '\',\''
        . $uid . '\',\'' . base64_encode($path) . '\',205);"></a>';
        return  $res;
      }
    }
    return '';
  }

  /*
   * Author: ducnmi.evnit@evn.com.vn
   *
   */
  public static function bindPlayHiddenPlayerCountAjax($buid, $uid, $path, $Identify )
  {
    if ($path) {
      $res = '<a class="icon-play iplay' . $uid . '" '
      . 'href="javascript:playMusicHidden(\'hiddenPlayerMagic' . $buid . '\',\''
      . $uid . '\',\'' . base64_encode($path) . '\',205);" vthref="'
      . url_for('@countlisten_ajax?song_identify=' . $Identify) . '"></a>';
      echo $res;
    }
    return '';
  }

  public static function bindPlayHiddenPlayerWithName($buid, $uid, $path, $name, $max_length = 30)
  {
    if ($path) {
      if (!$max_length) {
        $res = '<a title="' . str_replace('"', '\"', $name) . '" class="icon-play iplay<?php echo $uid ?>"'
        . 'href="javascript:playMusicHidden(\'hiddenPlayerMagic' . $buid . '\',\''
        . $uid . '\',\'' . base64_encode($path) . '\',205);">' . VtHelper::substring($name, 30)
        . '</a>';
      } else {
        $res = '<a title="' . str_replace('"', '\"', $name) . '" class="name-song color"'
        . 'href="javascript:playMusicHidden(\'hiddenPlayerMagic' . $buid . '\',\''
        . $uid . '\',\'' . base64_encode($path) . '\',205);">' . VtHelper::substring($name, $max_length)
        . '</a>';
      }
      echo $res;
    }
    return '';
  }

  /**
   * Cat bot ky tu
   * @author NamDT5
   * @created on Dec 26, 2011
   * @param integer $length
   * @return string
   */
  public static function substring($str, $leng = 22)
  {
    // Do some thing
    return htmlentities(dmString::truncate($str, $leng, '...', true), ENT_COMPAT, 'UTF-8');
  }

  /**
   * Ham tra ve so dien thoai theo IP cua thiet bi
   * @author hanhvt
   * @modified by namdt
   * @created on Dec 26, 2011
   * @param string $id
   * @return string  - unknown neu ko nhan dien dc
   */
  public static function getMsisdn()
  {
    if(isset($_SERVER['HTTP_MSISDN']))
    {
      return $_SERVER['HTTP_MSISDN'];
    }

    $ip = self::getDeviceIp();
    if (!$ip)
    {
      return 'unknown';
    }

    $param = array(
          'username' => "keeng",
          'password' => "kee22032012ng",
          'ip' => $ip       
    );
    $options = array('connect_timeout'=>5,'timeout'=>5);
    try {
      // http://10.58.32.212:8180/RadiusGW/Radius?wsdl
      $client = new SoapClient('http://10.58.32.212:8190/RadiusGW/Radius?wsdl', $options);

      $result = $client->__soapCall('getMSISDN', array($param));

      if (is_object($result))
      {
        if($result->return->code == 0)
        {
          return self::remove084PhoneNumber($result->return->desc);
        }
        else
        {
          sfContext::getInstance()->getLogger()->log(date('Y-m-d H:i:s').' GET MSISDN: ' . $ip .' -> ' . $result->return->desc .'\n');
          return 'unknown';
        }
      } else {
        sfContext::getInstance()->getLogger()->log(date('Y-m-d H:i:s').' GET MSISDN: ' . $ip . ' -> response no object!');
        return 'unknown';
      }

    } catch (Exception $e) {
      if (sfConfig::get('sf_environment') == 'dev')
      {
        echo 'Error '.$e->getCode().': '. $e->getMessage();
      }
      return 'unknown';
    }
  }

  /**
   * Tra ve IP cua thiet bi truy cap
   * @author NamDT5
   * @created on Mar 26, 2012
   * @return string
   */
  public static function getDeviceIp()
  {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $mobileIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $mobileIp = $_SERVER['REMOTE_ADDR'];
    }

    if(!empty($mobileIp)){
      $addr = explode(",",$mobileIp);
      return $addr[0];
    }else{
      return $mobileIp;
    }

    /*
     return trim($mobileIp);

     $ipString=@getenv("HTTP_X_FORWARDED_FOR");
     if(!empty($ipString)){
     $addr = explode(",",$ipString);
     return $addr[0];
     }else{
     return $_SERVER['REMOTE_ADDR'];
     }
     */
  }

  /**
   * Ham gui SMS ve cho nguoi dung
   * @author NamDT5
   * @created on Dec 26, 2011
   * @param string $phone_no
   * @param string $message
   * @return string
   */
  public static function sendSMS($phone_no, $message)
  {
    /*
     $listPhone = array(
     '977929922',
     '983825860',
     '1663080916',
     '974616785',
     '1629314296'
     );
     */

    try {
      return smsServices::sendSMS($phone_no, $message);
    } catch (Exception $e) {
      return array(
          'resultCode' => 1 // Lỗi đường truyền.
      );
    }
  }

  /**
   * Ham tru tien va gui nhac chuong ve cho KH
   * @author NamDT5
   * @created on Jan 9, 2012
   * @return int
   */
  public static function setRingtone($phone_no, $ringtone_code, $price, $message)
  {
    try {
      return smsServices::orderRingtone($phone_no, $ringtone_code);
    } catch (Exception $e) {
      return array(
          'resultCode' => 1 // Lỗi đường truyền.
      );
    }

  }

  /**
   * Ham tru tien va tang nhac chuong
   * @author NamDT5
   * @created on Jan 9, 2012
   * @return int
   */
  public static function presentRingtone($sender_no, $receiver_no, $ringtone_code, $price, $message1, $message2 = '')
  {
     
    try {
      return smsServices::presentRingtone($sender_no, $receiver_no, $ringtone_code);
    } catch (Exception $e) {
      return array(
          'resultCode' => 1 // Lỗi đường truyền.
      );
    }

  }

  public static function WriteLog($item_type, $item_id, $user_id, $type_id)
  {
    $log_table = '';
    switch ($item_type) {
      case 1 :
        $log_table = new VtSongLog();
        $log_table->setSongId($item_id);
        break;
      case 2 :
        $log_table = new VtVideoLog();
        $log_table->setVideoId($item_id);
        break;
      case 3 :
        $log_table = new VtAlbumLog();
        $log_table->setAlbumId($item_id);
        break;
      case 4 :
        $log_table = new VtRingBacktoneLog();
        $log_table->setRingBacktoneId($item_id);
        break;
        //Ducnm: Bo sung them ghi Log Day
      case 6 :
        $log_table = new VtSongLogDay();
        $log_table->setSongId($item_id);
        break;
      default:
        $log_table = new VtRingtoneLog();
        $log_table->setRingtoneId($item_id);
        break;
    }


    if (!$user_id) {
      $log_table->setCreatorId(-1);
    } else {
      $log_table->setCreatorId($user_id);
    }
    $log_table->setType($type_id);
    $log_table->save();
    return;
  }

  public static function loggedForIndex($itemid, $action, $content, $type, $published_time)
  {
    $VtIndexLog = new VtSearchIndexLog();
    $VtIndexLog->setItemId($itemid);
    $VtIndexLog->setContent(removeOnlySignClass::removeSign($content));
    $VtIndexLog->setLoggedTime(date('Y-m-d H:i:s', time()));
    $VtIndexLog->setAction($action);
    $VtIndexLog->setType($type);
    $VtIndexLog->setPublishedTime($published_time);
    $VtIndexLog->save();
  }



  public static function renderRingtoneCode($song)
  {
    $vtRingtone = VtRingtoneTable::getInstance()->getRingtoneBySong($song->getId());
    if (!$vtRingtone){

      $ringtone_code = VtHelper::generateRandom(6).'F';
      //Kiem tra trung RingBacktoneCode
      $vtRingtone = VtRingtoneTable::getInstance()->getValidRingtoneByCode($ringtone_code);

      while($vtRingtone)
      {
        //echo $RingBacktone_code; die;
        //Khi con ton tai thi check;
        $ringtone_code = VtHelper::generateRandom(6).'F';
        $vtRingtone = VtRingtoneTable::getInstance()->getValidRingtoneByCode($ringtone_code);
      }

      //Create ringtone fulltrack
      $vtRingtone= new VtRingtone();
      $temp = removeSignClass::removeSignName($song->name);
      $vtRingtone->name = $temp;
      $vtRingtone->ringtone_code = $ringtone_code;
      $vtRingtone->is_active = true;
      $vtRingtone->path = $song->path;
      $vtRingtone->published_time = date('Y-m-d H:i:s', time());
      $vtRingtone->save();
      //$vtRingtone = VtRingtoneTable::getInstance()->getValidRingtoneByCode($ringtone_code);
      if ($vtRingtone){

        $VtSongRingtone= new VtSongRingtone();
        $VtSongRingtone->song_id = $song->getId();
        $VtSongRingtone->ringtone_id = $vtRingtone->getId();
        $VtSongRingtone->position = 0;
        $VtSongRingtone->save();
        // Su ly downlaod Ringtone
         

        VtHelper::addSinger($song,$vtRingtone);

        VtHelper::addAuthor($song,$vtRingtone);

      }


    }
    return $vtRingtone;
  }


  public static function addAuthor($song,$vtRingtone)
  {
    $listauthor = $song->getVtAuthor();
    if($listauthor && count($listauthor)>0)
    {
      foreach ($listauthor as $author)
      {
        $vtRingtoneAuthor= new vtRingtoneAuthor();
        $vtRingtoneAuthor->author_id = $author->getId();
        $vtRingtoneAuthor->ringtone_id = $vtRingtone->getId();
        $vtRingtoneAuthor->position = 0;
        $vtRingtoneAuthor->save();
      }
    }
  }


  public static function addSinger($song,$vtRingtone)
  {
    $listsinger= $song->getVtSinger();
    if($listsinger && count($listsinger)>0)
    {
      foreach ($listsinger as $singer)
      {
        $vtRingtoneSinger = new vtRingtoneSinger();
        $vtRingtoneSinger->singer_id = $singer->getId();
        $vtRingtoneSinger->ringtone_id = $vtRingtone->getId();
        $vtRingtoneSinger->position = 0;
        $vtRingtoneSinger->save();
      }
    }
  }

  public static function searchSorl($preQuery, $typeIndex, $pageNo, $pageSize, $is_song = false)
  {
    /*Thuc hien ma hoa query */
    $query = removeOnlySignClass::removeSign($preQuery);
    $query = preg_replace("/[^a-zA-Z0-9\s]/", "", $query);
    $query = urlencode($query);

    /*Phan loai kieu tim kiem*/
    switch ($typeIndex) {
      case 'song':
        $serializedResult = file_get_contents('http://10.58.62.210:8081/solr/mbartists/select/?wt=phps&q='.$query.'&indent=true&fq=type:(song)&qt=artistAutoComplete&mm=2&fl=id,a_name,score&qf=a_name^3.0+singer^1.0&rows='.$pageSize.'&start='.($pageNo-1)*$pageSize);
        $resultsss = unserialize($serializedResult);
        break;
      case 'video':
        $serializedResult = file_get_contents('http://10.58.62.210:8081/solr/mbartists/select/?wt=phps&q='.$query.'&indent=true&fq=type:(video)&qt=artistAutoComplete&mm=2&fl=id,a_name,score&qf=a_name^3.0+singer^1.0&rows='.$pageSize.'&start='.($pageNo-1)*$pageSize);
        $resultsss = unserialize($serializedResult);
        break;
      case 'album':
        $serializedResult = file_get_contents('http://10.58.62.210:8081/solr/mbartists/select/?wt=phps&q='.$query.'&indent=true&fq=type:(album)&qt=artistAutoComplete&mm=2&fl=id,a_name,score&qf=a_name^3.0+singer^1.0&rows='.$pageSize.'&start='.($pageNo-1)*$pageSize);
        $resultsss = unserialize($serializedResult);
        break;
      case 'lyric':
        $serializedResult = file_get_contents('http://10.58.62.210:8081/solr/searchkeeng/select/?wt=phps&q='.$query.'&indent=true&qt=seachLyric&fl=id&qf=a_lyric&rows='.$pageSize.'&start='.($pageNo-1)*$pageSize);
        $resultsss = unserialize($serializedResult);
        break;

    }

    /*Thuc hien xu ly lay ra danh sach*/
    $total = $resultsss["response"]["numFound"];

    $sodu = $total%$pageSize;

    $max = $total - $sodu;

    $hits = array();

    for ($i = 0; $i < $max; $i++) {
      array_push($hits, $i);
    }

    if($total > 0)
    {

      $strIds = $resultsss["response"]["docs"][0]["id"];

      $arrIds = array();
      $arrNames = array();
      if($total < $pageSize)
      {
        for ($i = 0; $i < $total; $i++) {
          $id = $resultsss["response"]["docs"][$i]["id"];
          $name = $resultsss["response"]["docs"][$i]["a_name"];
          array_push($arrIds, $id);
          array_push($arrNames, $name);
          $strIds .= ',' . $id;
        }
      }
      else
      {
        for ($i = 0; $i < $pageSize; $i++) {
          $id = $resultsss["response"]["docs"][$i]["id"];
          $name = $resultsss["response"]["docs"][$i]["a_name"];
          array_push($arrIds, $id);
          array_push($arrNames, $name);
          $strIds .= ',' . $id;
        }
      }
      if($is_song)
      {
        /*
         * Xu ly sap xep theo so luot nghe group
         */
        $count = 0;

        $result_ids = array();

        foreach($arrNames as $name)
        {
          if(count($arrIds) == 0)
          {
            break;
          }
          else
          {
            $ids = Doctrine_Core::getTable('VtSong')->getListIdsForSearch($name,$arrIds,$strIds);

            foreach($ids as $id_song)
            {
              $key = array_search($id_song, $arrIds);
              array_push($result_ids, $id_song);
              unset($arrIds[$key]);
              unset($arrNames[$key]);

            }
            $count = count($arrIds);
          }
        }
        /* Xu ly string ids*/
        $strId = '';
        if($total > 0 && $result_ids)
        {
          $strId = $result_ids[0];
          for ($i = 0; $i < count($result_ids); $i++) {
            $strId .= ',' .$result_ids[$i];
          }
        }
        /*ket thuc*/
        $strIds = $strId;
        $arrIds = $result_ids;
      }

      return array(
                    "strIds" => $strIds,
                    "arrIds" => $arrIds,
                    "total" => $total,
                    "hits" => $hits
      );
    }
    return null;


  }
  /**
   * Ham hien thi ngay sinh
   * @author NamDT5
   * @created on Feb 1, 2012
   * @param string $birthday
   * @return string
   */
  public static function getDisplayBirthday($birthday)
  {
    if ($birthday && $birthday != '0000-00-00')
    {
      $dateArr = explode('-', $birthday);
      if ($dateArr[0] == '0000')
      {
        return $dateArr[2]. '/'. $dateArr[1];
      } elseif ($dateArr[1] == '00' && $dateArr[2] == '00')
      {
        return $dateArr[0];
      } else {
        return $dateArr[2]. '/'. $dateArr[1]. '/'. $dateArr[0];
      }
    } else {
      return null;
    }
  }
  /**
   * Ham chuan hoa xau, viet hoa ky tu dau tien cua tu trong xau
   * @author NamDT5
   * @created on Feb 3, 2012
   * @param unknown_type $str
   * @return string
   */
  public static function ucwords($str)
  {
    $str = trim($str);
    if (function_exists('mb_strtolower'))
    {
      $str = mb_strtolower($str);
    } else
    {
      $str = strtolower($str);
    }

    if(!function_exists('mb_ucwords'))
    {
      if (function_exists('mb_convert_case'))
      {
        $str =  mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
      } else
      {
        $str = ucwords($str);
      }
    } else
    {
      $str = mb_ucwords($str);
    }
    return $str;
  }
  /**
   * Ham tra ve thong tin cau hinh database trong file databases.yml
   * @author NamDT5
   * @created on Feb 9, 2012
   * @return array(
   'db_host'     => $host,
   'db_name'  => $dbName,
   'db_username' => $username,
   'db_password' => $password
   )
   */
  public function getDbConfig($type = 'doctrine')
  {
    $databaseConf = sfYaml::load(sfConfig::get('sf_config_dir') . '/databases.yml');
    $dsn      = $databaseConf['all']['doctrine']['param']['dsn'];
     
    $dsnArr = explode(';', $dsn);
    $host = explode('=', $dsnArr[0]);
    $host = $host[1];
     
    $dbName = explode('=', $dsnArr[1]);
    $dbName = $dbName[1];
     
    $username = $databaseConf['all'][$type]['param']['username'];
    $password = $databaseConf['all'][$type]['param']['password'];
    $result = array(
  	  'db_host'     => $host,
  	  'db_name'  => $dbName, 
  	  'db_username' => $username, 
  	  'db_password' => $password 
    );
     
    return $result;
  }
  public static function searchLucence($preQuery, $typeIndex, $pageNo, $pageSize)
  {
    $query = removeOnlySignClass::removeSign($preQuery);
    $query = preg_replace("/[^a-zA-Z0-9\s]/", "", $query);
    if ($pageNo < 1)
    $pageNo = 1;
    $offset = $pageSize * ($pageNo - 1);
    $index = null;


    switch ($typeIndex) {
      case SearchLucenceType::AlbumName:
        $index = VtAlbumTable::getLuceneIndex();
        break;
      case SearchLucenceType::VideoName:
        $index = VtVideoTable::getLuceneIndex();
        break;
      case SearchLucenceType::SingerName:
        $index = VtSingerTable::getLuceneIndex();
        $query = '"'. $query. '"';
        break;
      case SearchLucenceType::AuthorName:
        $index = VtAuthorTable::getLuceneIndex();
        $query = '"'. $query. '"';
        break;
      case SearchLucenceType::SongName:
        $index = VtSongTable::getLuceneIndex();
        break;
      case SearchLucenceType::SongLyric:
        $index = VtSongTable::getLuceneIndexLyric();
        break;
    }


    /*
     if ($typeIndex == SearchLucenceType::SongLyric) {
     $multiQuery = explode(' ', $query);
     $newQuery = new Zend_Search_Lucene_Search_Query_MultiTerm();
     foreach ($multiQuery as $squery) {
     $newQuery->addTerm(new Zend_Search_Lucene_Index_Term($squery, 'lyric'), null);
     }
     $hits = $index->find($newQuery);
     } else {
     //$multiQuery = explode(' ', $query);
     $newQuery = new Zend_Search_Lucene_Search_Query_MultiTerm();
     //foreach ($multiQuery as $squery) {
     $newQuery->addTerm(new Zend_Search_Lucene_Index_Term($query, 'name'), null);
     //}

     }
     */

    $hits = $index->find($query);

    $total = count($hits);
    $strIds = '';
    $arrIds = array();
    if ($hits) {
      if ($total < $pageSize) {
        $offset = 0;
      } else if ($offset == $total) {
        $offset = $total - $pageSize;
      } elseif ($offset > $total)
      $offset = $total - ($total % $pageSize);
      if ($hits) {
        $end = $offset + $pageSize;
        if ($end > $total)
        $end = $total;
        for ($i = $offset; $i < $end; $i++) {
          if ($i == $offset) {
            $strIds = $hits[$i]->pk;
          }
          array_push($arrIds, $hits[$i]->pk);
          $strIds .= ',' . $hits[$i]->pk;
        }

        return array(
			          "strIds" => $strIds,
			          "arrIds" => $arrIds,
			          "hits" => $hits,
			          "total" => $total
        );
      }
    }
    return null;
  }
  public static function super_unique($array,$key)
  {
    $temp_array = array();
    foreach ($array as &$v)
    {
      if (!isset($temp_array[$v[$key]]))
      $temp_array[$v[$key]] =& $v;
    }
    $array = array_values($temp_array);
    return $array;
  }

  function orderby(&$array,$key1,$keyOrder)
  {
    $tg=array();
    for ($i=0;$i<count($array)-1;$i++)
    {
      for($j=$i+1;$j<count($array);$j++)
      {
        if($array[$i][$key1]==$array[$j][$key1]&&(int)$array[$i][$keyOrder]<(int)$array[$j][$keyOrder])
        {
          $tg=$array[$i];
          $array[$i]=$array[$j];
          $array[$j]=$tg;
        }
      }
    }
    return $array;
  }
  public static function getCountryText($value)
  {
    return Country::getAliasOfValue($value);
  }
  public static function getTypeText($value)
  {
    return typeMusician::getAliasOfValue($value);
  }
  public static function orderbyListenNo()
  {
    $ids = Doctrine::getTable('VtSong')->getListIdsForSearch($latin_name,$array_id);
  }
  public static function hiddenNumberSubcriber($str)
  {
    $str = "0".$str;

    $substr = substr($str, 4, 3);

    $output = str_replace($substr, 'xxx', $str);

    return Helper::encodeOutput($output);
  }
  public static function array_random($arr, $num = 1)
  {
    shuffle($arr);
     
    $r = array();
    for ($i = 0; $i < $num; $i++) {
      $r[] = $arr[$i];
    }
    return $num == 1 ? VtHelper::encodeOutput($r[0]) : $r;
  }
  public static function convertStringToTime($string)
  {
    $years = substr($string, 0,4);

    $months = substr($string, 4,2);

    $day = substr($string, 6,2);

    $hour = substr($string, 8,2);

    $minute = substr($string, 10,2);

    $second = substr($string, 12,2);

    $result = $years.'-'.$months.'-'.$day.' '.$hour.':'.$minute.':'.$second;

    return $result;
  }

public static function rounTime($string)
  {
    $years = substr($string, 0, 4);

    $months = substr($string, 5, 2);

    $days = substr($string, 8, 2);

    $hour = substr($string, 11, 2);

    $minute = substr($string, 14, 2);

    $second = substr($string, 17, 2);

    if ($minute != '00' || $second != '00')
    {
      /* Thuc hien lam tron */
      /* Tang gio */
      if (intval($hour) < 24)
      {
        $hour = intval($hour) + 1;

        $hour = strval($hour);

        if (strlen($hour) == 1)
        {
          $hour = '0' . $hour;
        } else
        {
          $hour = $hour;
        }
        /* Ket qua tra ve */
        $result = $years . '-' . $months . '-' . $days . ' ' . $hour . ':00:00';
      } else
      {
        $result = $years . '-' . $months . '-' . $days . ' 23:59:59';
      }
    } else
    {
      /* Tra lai chuoi ban dau */
      $result = $string;
    }
    return $result;
  }

  public static function buildSingerLinkForSong($listSinger, $songIds, $values1 = 36, $values2 = 18, $values3 = 12){
  	$singerData = array();	
  	if(count($listSinger) > 0)
  	{
  		foreach ( $listSinger as $singer){
  			$songId = $singer->getSongId();
  			$singerData[$songId][] = $singer;  				
  		}
  		$singerLinks = array();
  		foreach ( $singerData as $i => $singers){
  			$count = count($singers);
  			$singerName = '<p class="name-single">';
  			switch ($count){
  				case 1:
  					$singer = $singers[0];
  					$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  					->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values1))
  					->set('title', $singer->getVtSinger()->getAliasName());
  					break;
  				case 2:
  					foreach ($singers as $key => $singer)
  					{
  						if ($key != $count - 1) {
  							$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  							->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
  							->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
  						} else
  						{
  							$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  							->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
  							->set('title', $singer->getVtSinger()->getAliasName());
  						}
  					}
  					break;
  				case 3:
  					foreach ($singers as $key => $singer)
  					{
  						if ($key != $count - 1) {
  							$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  							->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
  							->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
  						} else
  						{
  							$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  							->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
  							->set('title', $singer->getVtSinger()->getAliasName());
  						}
  					}
  					break;
  				default:
  					$singerName .= '<span class="">Nhiều ca sĩ</span>';
  					break;
  			}
  			$singerName .= '</p>';
  			$singerLinks[$i] = $singerName;
  		}
  		foreach ($songIds as $songId){
  			if(empty($singerLinks[$songId])){
  				$singerLinks[$songId] = '<p class="name-single"><span class="">Đang cập nhật</span></p>';
  			}
  		}  		
  		return $singerLinks;
  	}
  }

  public static function buildIconLinksForSong($listIcon){
    $iconData = array();
    foreach ($listIcon as $icon){
      $songId = $icon->getSongId();

      $iconData[$songId][] = $icon;
    }

    $iconLinks = array();
    foreach ($iconData as $i => $icons){
      if (count($icons) == 1){
        $icon = $icons[0];
        $srcIcon = '<img  src=" ' . sfConfig::get('app_image_server_domain') . $icon->getVtIcon()->getPath() . ' " />';
      } else {
        foreach ($icons as $icon){
          $srcIcon = '<img  src=" ' . sfConfig::get('app_image_server_domain') . $icon->getVtIcon()->getPath() . ' " />';
        }
      }
      $iconLinks[$i] = $srcIcon;
    }

    return $iconLinks;
  }

  public static function buildRbtLinksForSong($listRbt){
    $rbtData = array();
    foreach ($listRbt as $rbt){
      $songId = $rbt->getSongId();

      $rbtData[$songId][] = $rbt;
    }

    $rbtLinks = array();
    foreach ($rbtData as $i => $rbts){
      $rbt = $rbts[0];
      $srcRbt = $rbt->getVtRingBacktone();

      $rbtLinks[$i] = $srcRbt;
    }

    return $rbtLinks;
  }
  
  public static function getSingerLink($listSinger, $songIds, $values1 = 36, $values2 = 18, $values3 = 12)
  {  	  	
  	$singerData = array();
  	foreach ( $listSinger as $singer){
  		$songId = $singer->getSongId();
  		$singerData[$songId][] = $singer;
  	}
  	$singerLinks = array();
  	foreach ( $singerData as $i => $singers){
  		$count = count($singers);
  		$singerName = '<p class="name-single">';
  		switch ($count){
  			case 1:
  				$singer = $singers[0];
  				$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  				->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values1))
  				->set('title', $singer->getVtSinger()->getAliasName());
  				break;
  			case 2:
  				foreach ($singers as $key => $singer)
  				{
  					if ($key != $count - 1) {
  						$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  						->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
  						->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
  					} else
  					{
  						$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  						->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
  						->set('title', $singer->getVtSinger()->getAliasName());
  					}
  				}
  				break;
  			case 3:
  				foreach ($singers as $key => $singer)
  				{
  					if ($key != $count - 1) {
  						$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  						->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
  						->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
  					} else
  					{
  						$singerName .= $singer->getVtSinger()->getLink()->set('.under')
  						->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
  						->set('title', $singer->getVtSinger()->getAliasName());
  					}
  				}
  				break;
  			default:
  				$singerName .= '<span class="">Nhiều ca sĩ</span>';
  				break;
  		}
  		$singerName .= '</p>';
  		$singerLinks[$i] = $singerName;
  	}
  	foreach ($songIds as $songId){
  		if(empty($singerLinks[$songId])){
  			$singerLinks[$songId] = '<p class="name-single"><span class="">Đang cập nhật</span></p>';
  		}
  	}  	 
  	return $singerLinks;
  }
 
  
  public static function buildSingerLinkForVideo($listSinger, $videoIds, $values1 = 36, $values2 = 18, $values3 = 12){
  	$singerData = array();
  	if(count($listSinger) > 0)
  	{
	    foreach ( $listSinger as $singer){
	    	$videoId = $singer->getVideoId();
	    	$singerData[$videoId][] = $singer;
	    }

	    $singerLinks = array();
	    foreach ( $singerData as $i => $singers){
	    	$count = count($singers);
	    	$singerName = '<p class="name-single">';
	    	switch ($count){
	    		case 1:
	    			$singer = $singers[0];
	    			$singerName .= $singer->getVtSinger()->getLink()->set('.under')
	    			->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values1))
	    			->set('title', $singer->getVtSinger()->getAliasName());
	    			break;
	    		case 2:
	    			foreach ($singers as $key => $singer)
	    			{
	    				if ($key != $count - 1) {
	    					$singerName .= $singer->getVtSinger()->getLink()->set('.under')
	    					->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
	    					->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
	    				} else
	    				{
	    					$singerName .= $singer->getVtSinger()->getLink()->set('.under')
	    					->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
	    					->set('title', $singer->getVtSinger()->getAliasName());
	    				}
	    			}
	    			break;
	    		case 3:
	    			foreach ($singers as $key => $singer)
	    			{
	    				if ($key != $count - 1) {
	    					$singerName .= $singer->getVtSinger()->getLink()->set('.under')
	    					->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
	    					->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
	    				} else
	    				{
	    					$singerName .= $singer->getVtSinger()->getLink()->set('.under')
	    					->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
	    					->set('title', $singer->getVtSinger()->getAliasName());
	    				}
	    			}
	    			break;
	    		default:
	    			$singerName .= '<span class="">Nhiều ca sĩ</span>';
	    			break;
	    	}
	    	$singerName .= '</p>';
	    	$singerLinks[$i] = $singerName;
	    }
	    foreach ($videoIds as $videoId){
	    	if(empty($singerLinks[$videoId])){
	    		$singerLinks[$videoId] = '<p class="name-single"><span class="">Đang cập nhật</span></p>';
	    	}
	    }
    	return $singerLinks;
  	}
  }

  public static function buildSingerLinkForAlbum($listSinger, $albumIds, $values1 = 22, $values2 = 15, $values3 = 15){
    $singerData = array();
    foreach ( $listSinger as $singer){
      $albumId = $singer->getAlbumId();
      $singerData[$albumId][] = $singer;
    }
    $singerLinks = array();
    foreach ( $singerData as $i => $singers){
      $count = count($singers);
      $singerName = '<p class="name-single">';
      switch ($count){
        case 1:
          $singer = $singers[0];
          $singerName .= $singer->getVtSinger()->getLink()->set('.under')
          ->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values1))
          ->set('title', $singer->getVtSinger()->getAliasName());
          break;
        case 2:
          foreach ($singers as $key => $singer)
          {
            if ($key != $count - 1) {
              $singerName .= $singer->getVtSinger()->getLink()->set('.under')
              ->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
              ->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
            } else
            {
              $singerName .= $singer->getVtSinger()->getLink()->set('.under')
              ->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values2))
              ->set('title', $singer->getVtSinger()->getAliasName());
            }
          }
          break;
        case 3:
          foreach ($singers as $key => $singer)
          {
            if ($key != $count - 1) {
              $singerName .= $singer->getVtSinger()->getLink()->set('.under')
              ->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
              ->set('title', $singer->getVtSinger()->getAliasName()) . ' &nbsp;ft&nbsp; ';
            } else
            {
              $singerName .= $singer->getVtSinger()->getLink()->set('.under')
              ->text(VtHelper::substring($singer->getVtSinger()->getAliasName(), $values3))
              ->set('title', $singer->getVtSinger()->getAliasName());
            }
          }
          break;
        default:
          $singerName .= '<span class="">Nhiều ca sĩ</span>';
          break;
      }
      $singerName .= '</p>';
      $singerLinks[$i] = $singerName;
    }
    foreach ($albumIds as $albumId){
    	if(empty($singerLinks[$albumId])){
    		$singerLinks[$albumId] = '<p class="name-single"><span class="">Đang cập nhật</span></p>';
    	}
    }
    
    return $singerLinks;
  }

  public static function convertListSingerToArrayIndexBySingerId($listSinger){
  	if(!is_array($listSinger)){
  		return $listSinger;
  	}
  	$ret = array();
  	foreach ($listSinger as $singer){
  		$ret[$singer->getId] = $singer;
  	}
  	return $ret;
  }
  
  static public function check_app()
  {
    $ip = sfConfig::get('app_ip_private');
    
    return $ip;
  }
  
  public static function strong_password($pwd,$test = false,$str = false)
  {
    $pattern = '/^.*(?=.{8,})(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[a-zA-Z]).*$/';
    $sameCharPattern = '/(.)\1{3,}/';  // Khong co qua 4 ky tu giong nhau lien tiep
    $error = "Chú ý: Mật khẩu mới phải";
    $success = "Mật khẩu của bạn có mức độ bảo mật cao. Cảm ơn bạn";
    $check = false;
    if( strlen($pwd) < 8 ) {
      $check = false;
      $error = $error." , chứa tối thiểu 8 ký tự,";
    }
    else if( strlen($pwd) > 20 )
    {
      $check = false;
      $error = $error." , chứa tối đa 20 ký tự,";
    }
    else if( !preg_match("#[0-9]+#", $pwd) )
    {
      $check = false;
      $error = $error." , 1 ký tự số,";
    }
    else if( !preg_match("#[a-z]+#", $pwd) )
    {
      $check = false;
      $error = $error." , 1 ký tự chữ thường,";
    }
    else if( !preg_match("#[A-Z]+#", $pwd) )
    {
      $check = false;
      $error = $error." , tối thiểu 1 ký tự chữ hoa,";
    }
    else if( !preg_match("#\W+#", $pwd) )
    {
      $check = false;
      $error = $error." , 1 ký tự đặc biệt,";
    }
    else if( preg_match("/(123456|123456a@|112233|111222|qwerty|111111|password|matkhau|12345678|abc123|123456789|1234567|iloveyou|adobe123|123123|Admin|1234567890|password1|azerty|000000)/", $pwd) )
    {
      $check = false;
      $error = $error." , không phải là mật khẩu dễ đoán dạng 123456, 123456a@, 112233, 111222, qwerty, 111111, password, matkhau";
    }
    elseif(!preg_match($pattern, $pwd)) 
    {
        // Khong thoa man loai ky tu hoac co chua 4 ky tu giong nhau lien tiep
        //Pass invalid: weak_password - nho hon 8 ky tu hoac ko chua du chu, so, ky tu dac biet...
        //$this->throwValidatorError('weak_password', $password, $rePassword);
        $check = false;
        $error = $error." , không chứa 4 ký tự giống nhau tiên tiếp dạng 1111, 2222, aaaa...";
    } 
    elseif (preg_match($sameCharPattern, $pwd)) 
    {
        //$loger->err('Pass invalid: weak_password - 4 ky tu giong nhau lien tiep');
        //$this->throwValidatorError('weak_password', $password, $rePassword);
        $check = false;
        $error = $error." , không phải là mật khẩu dễ đoán,";
    } 
    elseif (VtSecurity::checkStrongPass($pwd) == false) {
         // Kiem tra password de doan
         //$loger->err('Pass invalid: weak_password - pass de doan tang giam ... ');
         //$this->throwValidatorError('weak_password', $password, $rePassword);
         $check = false;
         $error = $error." , mật không để 4 ký tự liên tiếp dạng tăng dễ đoán có dạng 1234, abcd..";
    }
    else
    {
      $check = true;
    }
    if($test == true)
    {
      return $check;
    }
    if($str == true)
    {
      if($check == false)
      {
        return $error;
      }
    }
  }
 

    /**
     * Check chuoi theo thu tu keyboard (2 chieu xuoi/ nguoc)
     * Check chuoi theo thu tu abc (xuoi / nguoc )
     * @author NamDT5
     * @param $type
     * @param $countByKeyboard
     * @param $input
     * @param $i
     * @return bool
     */
    public static function checkPassByKey($type, &$countByKeyboard, $input, $i)
    {
        if (function_exists('mb_strtolower')) {
            $input = mb_strtolower($input, 'UTF-8');
        } else {
            $input = strtolower($input);
        }

        switch ($type) {
            case 'keyboard_asc':
                $checkStr = "1234567890-=qwertyuiop[]asdfghjkl;'zxcvbnm,./~!@#$%^&*()_+";
                break;
            case 'keyboard_desc':
                $checkStr = "=-0987654321/.,mnbvcxz';lkjhgfdsa][poiuytrewq+_)(*&^%$#@!~";
                break;
            case 'abc_asc':
                $checkStr = "abcdefghijklmnopqrstuvwxyz";
                break;
            case 'abc_desc':
                $checkStr = "zyxwvutsrqponmlkjihgfedcba";
                break;
        }

        $before = strpos($checkStr, $input[$i - 1]);
        $after = strpos($checkStr, $input[$i], $before);

        $test = $after - $before;

        if ($countByKeyboard == 4)
        {
            // Return de break vong lap ngay khi phat hien truong hop dau tien
            return false;
        } elseif ($test == 1)
        {
            $countByKeyboard ++;
        } else {
            $countByKeyboard = 1;
        }

        return true;
    }
  
  public static function getBackendPath($pre, $locatePath){    
    $listServers = sfConfig::get('app_media_servers');
    foreach($listServers as $server){
        if($locatePath == $server['domain']){
            foreach($server['mapping'] as $map){
                if($map['cms_path'] == $pre) {
                    return $map['front_path'];
                }
            }
        }
    }
    return null;
}
  
  public static function getVideoLink($vtVideo){
    
    if($vtVideo==null)     return '';
    
    if(!$vtVideo->getPath())    return '';
    
    $pos = strrpos($vtVideo->getPath(), '/');  
	$pre = substr($vtVideo->getPath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
    $locatePath = $vtVideo->getLocatePath();
    $link=$locatePath . str_replace($pre, VtHelper::getBackendPath($pre,$locatePath), $vtVideo->getPath());
    
    return $link;	
}

public static function getVideoWapLink($vtVideo){
    
    if($vtVideo==null)     return '';
    
    if(!$vtVideo->getWapPath())    return '';
    
    $pos = strrpos($vtVideo->getWapPath(), '/');  
	$pre = substr($vtVideo->getWapPath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
    $locatePath = $vtVideo->getLocatePath();
    $link=$locatePath . str_replace($pre, VtHelper::getBackendPath($pre,$locatePath), $vtVideo->getWapPath());
    
    return $link;	
}

public static function getMediaWapMonoLink($song){
    
    if($song==null)     return '';
    
    if(!$song->getWapPathMono())    return '';
    
    $pos_wap_mono = strrpos($song->getWapPathMono(), '/');  
  	$pre_wap_mono = substr($song->getWapPathMono(), 1, $pos_wap_mono);
   	$pos_2_wap_mono = strpos($pre_wap_mono, '/');
   	$pre_wap_mono = substr($pre_wap_mono, 0, $pos_2_wap_mono);
        $locatePath = $song->getLocatePath();
    $link=$locatePath . str_replace($pre_wap_mono, VtHelper::getBackendPath($pre_wap_mono,$locatePath), $song->getWapPathMono());
    
    return $link;	
}

public static function getMediaWapLink($song){
    
    if($song==null)     return '';
    
    if(!$song->getWapPath())    return '';
    
    $pos_wap = strrpos($song->getWapPath(), '/');  
	$pre_wap = substr($song->getWapPath(), 1, $pos_wap);
	$pos_2_wap = strpos($pre_wap, '/');
	$pre_wap = substr($pre_wap, 0, $pos_2_wap);
        $locatePath = $song->getLocatePath();
    $link=$locatePath . str_replace($pre_wap, VtHelper::getBackendPath($pre_wap,$locatePath), $song->getWapPath());
    
    return $link;	
}

public static function getMediaLink($song){
    
    if($song==null)     return '';
    
    if(!$song->getPath())    return '';
    
    $pos = strrpos($song->getPath(), '/');  
	$pre = substr($song->getPath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
    $locatePath = $song->getLocatePath();
  if($locatePath== 'http://medias.cdn.keeng.vn'){
    $link='http://medias.keeng.vn'.$song->getPath();
  }else{
    $link=$locatePath . str_replace($pre, VtHelper::getBackendPath($pre,$locatePath), $song->getPath());
  }

    return $link;
}

public static function getMediaPreviewLink($song){
    
    if($song==null)     return '';
    
    if(!$song->getPreviewPath())    return '';
    
    $pos = strrpos($song->getPreviewPath(), '/');  
	$pre = substr($song->getPreviewPath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
    $locatePath = $song->getLocatePathPreview();
    $link=$locatePath . str_replace($pre, VtHelper::getBackendPath($pre,$locatePath), $song->getPreviewPath());
    
    return $link;	
}

public static function getRBTMediaLink($rbt){
    
    if($rbt==null)     return '';
    
    if(!$rbt->getPath())    return '';
    
    $pos = strrpos($rbt->getPath(), '/');  
	$pre = substr($rbt->getPath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
        $locatePath = $rbt->getLocatePath();
    $link= $locatePath. str_replace($pre, VtHelper::getBackendPath($pre,$locatePath), $rbt->getPath());
    
    return $link;	
}



public static function getRingtoneMediaLink($object){
    
    if($object==null)     return '';
    
    if(!$object->getRingtonePath())    return '';
    
    $pos = strrpos($object->getRingtonePath(), '/');  
	$pre = substr($object->getRingtonePath(), 1, $pos);
	$pos_2 = strpos($pre, '/');
	$pre = substr($pre, 0, $pos_2);
        $locatePath = $object->getRingtoneLocate();
    if($locatePath== 'http://medias.cdn.keeng.vn'){
      $link='http://medias.keeng.vn'.$object->getPath();
    }else {
      $link = $locatePath . str_replace($pre, VtHelper::getBackendPath($pre, $locatePath), $object->getRingtonePath());
    }
    return $link;	
}
    /*
     * @function makeIdentifyByStr()
     * @param $str
     * @author hungbq4@viettel.com.vn
     * @created on Mar 06, 2013
     */

    public static function makeIdentifyByStr($str) {
        $key = md5($str."www.keeng.vn");

        $identify = strtoupper(substr($key, 8, 8));
        return $identify;
    }
	public static function getThumbUrl4($source, $width = null, $height = null) {
 	
    if ($width == null && $height == null)
    return $source;
    $pos = strpos($source, "thumbs");
    if($pos != false)
    return $source;
    if (empty($source)) {
      return '/theme/images/defaultImage.jpg';
    }

    $mediasDir = sfConfig::get('sf_web_dir');
    $fullPath = $mediasDir . $source;
    
    if (@$infos = getimagesize($fullPath))
    {
      $imagewidth = $infos[0];
      $imageheight = $infos[1];
      if($width && $width == $imagewidth && $height && $height == $imageheight)
      {
        return $source;
      }
    }
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);
      $dir = substr($source, 0, $pos + 1);
      $dir .= 'thumbs/';
    } else {
      return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
    } else {
      return false;
    }
	if($extension =='mp4' || $extension =='flv'|| $extension =='css'|| $extension =='js'){
		return $source;
	}
    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
	
    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }

    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 70);
    if (!is_file($fullPath)) {
      return '/theme/images/defaultImage.jpg';
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) {
		mkdir($mediasDir . $dir, 0777);
		chmod($mediasDir . $dir, 0777);
	}
	
	
    $thumbnail->save($fullThumbPath, 'image/jpeg');

    return $dir . $thumbName;
  }
  public static function getNoDuplicateInArray($a, $b){
    
    $i = 0;
    foreach ($b as $c)
    {
      if($c == $a)
      {
        $i = $i + 1;
      }
    }
    
    return $i;
  }
  
  public static function exportExcel($prefix, $args, $data) {
        $excel = new PHPExcel();

        $excel->setActiveSheetIndex(0);
        $activeSheet = $excel->getActiveSheet();

        foreach($args as $key => $value) {
            $activeSheet->SetCellValue($key . "1", $value[0]);
        }

        $row = 1;
        foreach ($data as $row_value) {
            $row++;
            foreach($args as $key => $value) {
                $field = $value[1];
                $cell_value = is_object($row_value) ? $row_value->$field : $row_value["$field"];
                $activeSheet->SetCellValue($key . $row, $cell_value);
            }
        }

        $writer = new PHPExcel_Writer_Excel2007($excel);
        $reportDir = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR .
            'web' . DIRECTORY_SEPARATOR . 'report';
        $fileName = $prefix . '_' . date('d_m_Y_H_i_s').'.xls';
        $writer->save($reportDir . DIRECTORY_SEPARATOR . $fileName);
        $location = sfConfig::get('app_host_url').'report/' . $fileName;
        header("Location: $location");exit();
    }
    
    public static function exportExcelCustom($prefix, $args, $data,$moduleName) {

        $excel = new PHPExcel();

        $excel->setActiveSheetIndex(0);
        $activeSheet = $excel->getActiveSheet();

        foreach($args as $key => $value) {
            $activeSheet->SetCellValue($key . "1", $value[0]);
        }

        $row = 1;
        foreach ($data as $row_value) {
            $row++;
            foreach($args as $key => $value) {
                $field = $value[1];
                $cell_value = is_object($row_value) ? $row_value->$field : $row_value["$field"];
                $activeSheet->SetCellValue($key . $row, $cell_value);
            }
        }

        $writer = new PHPExcel_Writer_Excel2007($excel);
        $reportDir = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR .
            'report' . DIRECTORY_SEPARATOR. $moduleName;
        $fileName = $prefix . '_' . date('d_m_Y_H_i_s').'.xls';
        
        $writer->save($reportDir . DIRECTORY_SEPARATOR . $fileName);
        
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . basename($reportDir . DIRECTORY_SEPARATOR . $fileName));
        
        $writer->save('php://output');
        exit();
    }
   
    public static function get_filter_time($time) {
        return DateTime::createFromFormat('d-m-Y H:i', $time)->format("Y-m-d H:i");
    }
    
    public static function writeErrorGetDataForUrl($content) {
        self::$_logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/system-out.fail.log'));
        self::$_logger->log($content, sfFileLogger::ERR);
    }

    public static function writeSuccessGetDataForUrl($content) {
        self::$_logger = new sfFileLogger(new sfEventDispatcher(), array('file' => sfConfig::get('sf_log_dir') . '/system-out.success.log'));
        self::$_logger->log($content, sfFileLogger::INFO);
    }
    public static function putDataToServiceRemartketing($param, $type) {
        $url = sfConfig::get('app_server_remarketing', 'http://10.58.82.111/Remarketting/requestInput.asmx?wsdl');
        $options = array(
            'soap_version' => SOAP_1_1,
            'exceptions' => true,
            'timeout' => sfConfig::get("app_nusoap_timeout", 30),
            'connection_timeout' => sfConfig::get("app_nusoap_timeout", 30),
            'trace' => 1,
            'cache_wsdl' => WSDL_CACHE_BOTH,
            "stream_context" => stream_context_create(
                    array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        )
                    )
            )
        );
        libxml_disable_entity_loader(false);

        try {
            $client = new SoapClient($url, $options);
            $result = $client->Input_ItemData($param);
          
            if ($result) {
                $content = date('Y-m-d H:i:s') . '|' . $type . '|' . $url . '|' . $result->OutputRandom_ItemDataResult . '|' . 'success';
                VtHelper::writeSuccessGetDataForUrl($content);
                return json_decode($result->Input_ItemDataResult);
            } else {
                $content = date('Y-m-d H:i:s') . '|' . $type . '|' . $url . '|' . 'time out';
                VtHelper::writeErrorGetDataForUrl($content);
            }
        } catch (Exception $e) {
            VtHelper::writeErrorGetDataForUrl($e->getMessage());
            return '';
        }
    }
   public static function getThumbUrlAvatar($source, $width = null, $height = null)
  {
   
       $defaultImage = sfConfig::get('app_default_image');

    if ($width == null && $height == null)
    return (file_exists(sfConfig::get('sf_web_dir') . $source)) ? $source : $defaultImage;
    if (empty($source)) {
      return $defaultImage;
    }
     
    $mediasDir = sfConfig::get('sf_web_dir');

    $fullPath = $mediasDir . $source;
	
    $pos = strrpos($source, '/');
    if ($pos !== false) {
      $filename = substr($source, $pos + 1);
      $dir = '/sata11/upload/avatar/thumb/';
    } else {
      return $defaultImage;
      #return false;
    }

    $pos = strrpos($filename, '.');
    if ($pos !== false) {
      $basename = substr($filename, 0, $pos);
      $extension = substr($filename, $pos + 1);
	  
    } else {
      return $defaultImage;
      #return false;
    }
    
    if ($width == null) {
      $thumbName = $basename . '_auto_' . $height . '.' . $extension;
    } else if ($height == null) {
      $thumbName = $basename . '_' . $width . '_auto.' . $extension;
    } else {
      $thumbName = $basename . '_' . $width . '_' . $height . '.' . $extension;
    }

    $fullThumbPath = $mediasDir . $dir . $thumbName;
    //$fullThumbPath = sfConfig::get('app_media_link') . $dir . $thumbName;


    # Neu thumbnail da ton tai roi thi khong can generate
    if (file_exists($fullThumbPath)) {
      return $dir . $thumbName;
    }
    # Neu thumbnail chua ton tai thi su dung plugin de tao ra
    $scale = ($width != null && $height != null) ? false : true;
    $thumbnail = new sfThumbnail($width, $height, $scale, true, 100);
    if (!is_file($fullPath)) {

      return $defaultImage;
    }
    $thumbnail->loadFile($fullPath);

    if (!is_dir($mediasDir . $dir)) mkdir($mediasDir . $dir, 0777, true);
    $thumbnail->save($fullThumbPath, 'image/jpeg');
	
    chmod($mediasDir . $dir, 0777);
    chmod($fullThumbPath, 0777);
    return (file_exists(sfConfig::get('sf_web_dir') . $dir . $thumbName)) ? $thumbName : $defaultImage;
  }

  public static function getDataForUrl($url, $type = '', $timeout = 1) {
    //if ($type == 'ServerMocha' && sfConfig::get('app_server_mocha_onoff') == 0) {
//            $data = '{"code":200,"desc":"Successful","errorCode":200,"mocha":0}';
//        } else {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, sfConfig::get("app_connect_service_timeout", 30)); //30 giây
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $data = curl_exec($ch);
    $curl_errno = curl_errno($ch);
    if ($curl_errno) {
      $content = date('Y-m-d H:i:s') . '|' . $type . '|' . $url . '|' . $curl_errno . '|' . curl_error($ch);
      VtHelper::writeErrorGetDataForUrl($content);
    } else {
      $content = date('Y-m-d H:i:s') . '|' . $type . '|' . $url . '|' . $data . '|' . 'success';
      VtHelper::writeSuccessGetDataForUrl($content);
    }
    curl_close($ch);
    //}
    return $data;
  }

}

