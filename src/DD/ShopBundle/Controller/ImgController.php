<?php
namespace DD\ShopBundle\Controller;

use Cloudinary\Api;
use Cloudinary\Uploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImgController extends Controller
{
    public function imgAction()
    {

       //Cloudinary:Uploader::destroy('xjlkykhm9yjxdttb8dmn');

        //:Uploader::upload("http://upload.wikimedia.org/wikipedia/commons/a/af/Bonsai_IMG_6426.jpg");
       // Cloudinary:Uploader::upload("http://upload.wikimedia.org/wikipedia/commons/a/af/Bonsai_IMG_6426.jpg");
        echo cl_image_tag("mdrn2mwsjntzodfugejp.jpg", array( "alt" => "Sample Image" ));

       }
}