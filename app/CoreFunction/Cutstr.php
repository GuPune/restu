<?php

namespace App\CoreFunction;


use Illuminate\Database\Eloquent\Model;
use App;
use App\Models\Branch;
use App\Models\Captcha;
use App\Models\ConfigImage;
use App\Models\NewContent;
use App\Models\SlideImage;
use App\Models\System;
use DB;
use DOMDocument;
use Log;





class Cutstr extends Model
{

    public static function findimgInhtml($urlPage)
    {

  //Send a GET request to the URL of the web page using file_get_contents.
    //This will return the HTML source of the page as a string.
    // $htmlString = file_get_contents('https://en.wikipedia.org/wiki/Main_Page');

    $htmlString = file_get_contents($urlPage);
    //Create a new DOMDocument object.
    $htmlDom = new DOMDocument();

    //Load the HTML string into our DOMDocument object.
    @$htmlDom->loadHTML($htmlString);

    //Extract all img elements / tags from the HTML.
    $imageTags = $htmlDom->getElementsByTagName('img');

    //Create an array to add extracted images to.
    $extractedImages = array();



    //Loop through the image tags that DOMDocument found.
    foreach ($imageTags as $imageTag) {

        //Get the src attribute of the image.
        $imgSrc = $imageTag->getAttribute('src');

        //Get the alt text of the image.
        $altText = $imageTag->getAttribute('alt');

        //Get the title text of the image, if it exists.
        $titleText = $imageTag->getAttribute('title');

        //Add the image details to our $extractedImages array.
        $extractedImages[] = array(
            'src' => $imgSrc,
            'alt' => $altText,
            'title' => $titleText
        );
    }

    ///Exit img=null
    if (count($extractedImages) <= 0) {
        return false;
        exit;
    }
    //var_dump our array of images.
    // var_dump($extractedImages);
    $first_img = $extractedImages[0]["src"];
    if ($first_img != NULL) {
        return $first_img;
    } else {
        return false;
    }
    //return  $extractedImages[0]["src"];
    // return  print_r($extractedImages);


    }



    public static function random_password($max_length = 20)
    {
        $text = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $text_length = mb_strlen($text, 'UTF-8');
        $pass = '';
        for ($i = 0; $i < $max_length; $i++) {
            $pass .= @$text[rand(0, $text_length)];
        }
        return $pass;
    }

    public static function getnew()
    {
        $data = NewContent::where('status','Y')->where('type','1')->orderBy("id", "desc")->get();

        return $data;
    }

    public static function confi()
    {
        $data = ConfigImage::first();

        return $data;
    }



    public static function getbussines()
    {
        $data = NewContent::where('status','Y')->where('type','2')->orderBy("id", "desc")->get();
        return $data;
    }

    public static function getproduct()
    {
        $data = NewContent::where('status','Y')->where('type','3')->orderBy("id", "desc")->get();
        return $data;
    }


    public static function getconfig()
    {
        $data = ConfigImage::where('id','1')->first();
        return $data;
    }

    public static function gettype($type)
    {
        if($type == '1'){
            return 'new';
        }else if($type == '2'){
            return 'bussines';
        }else {
            return 'product';
        }
    }

    public static function customer()
    {
        $data = SlideImage::where('status','Y')->where('slide_type','4')->orderBy("id", "desc")->get();
        return $data;
    }

    public static function cr()
    {
        $data = SlideImage::where('status','Y')->where('slide_type','5')->orderBy("id", "desc")->get();
        return $data;
    }

    public static function brand()
    {
        $data = SlideImage::where('status','Y')->where('slide_type','2')->orderBy("id", "desc")->get();
        return $data;
    }

    public static function getbu($id)
    {
        $data = SlideImage::where('status','Y')->where('slide_type',$id)->orderBy("id", "desc")->get();
        return $data;
    }

    public static function carou($type)
    {


        if($type == 'en'){
            $data = SlideImage::where('status','Y')->where('slide_type','3')->where('lang','E')->orderBy("id", "desc")->get();
        }elseif($type == 'th'){
            $data = SlideImage::where('status','Y')->where('slide_type','3')->where('lang','T')->orderBy("id", "desc")->get();
        }elseif($type == 'cn'){
            $data = SlideImage::where('status','Y')->where('slide_type','3')->where('lang','C')->orderBy("id", "desc")->get();
        }else{
            $data = SlideImage::where('status','Y')->where('slide_type','3')->where('lang','T')->orderBy("id", "desc")->get();
        }
        return $data;
    }


    public static function updateview($id)
    {




        NewContent::find($id)->increment('view', 1); // +10


    }



    public static function ask()
    {


        $ran = Captcha::all()->random(1)->first();

       return $ran;


    }

    public static  function language () {

        $locale = session()->get('locale');
        $lean = 'th';
        if($locale == null){
        App::setLocale($lean);
        session()->put('locale', $lean);
        }

        return $locale;
    }


    public static  function menufr ($me) {

$menu = System::where('type',$me)->get();

return $menu;
    }


    public static  function typelan ($me) {

        $getfir = System::where('system_menu',$me)->first();

        return $getfir;
            }



    public static  function messages ($me) {

         $getfir = System::where('system_menu',$me)->get();
\Log::info($getfir);
         return $getfir;
     }











}
