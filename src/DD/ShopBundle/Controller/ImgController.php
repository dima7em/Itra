<?php
namespace DD\ShopBundle\Controller;

use Cloudinary\Uploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImgController extends Controller
{
    public function imgAction()
    {
        $cloudinary = new \Cloudinary();
        $cloudinary::config(array(
            "cloud_name"=>"localhost-all-web",
            "api_key"=>"787221372966778",
            "api_secret"=>"X3fO_ct2jQUBucxkBn7XyhQ85hM"
        ));
        //:Uploader::upload("http://upload.wikimedia.org/wikipedia/commons/a/af/Bonsai_IMG_6426.jpg");
        Cloudinary:Uploader::upload("http://upload.wikimedia.org/wikipedia/commons/a/af/Bonsai_IMG_6426.jpg");
        echo cl_image_tag("beurlw94buorqn7v2vs3.jpg", array( "alt" => "Sample Image" ));
    }
}