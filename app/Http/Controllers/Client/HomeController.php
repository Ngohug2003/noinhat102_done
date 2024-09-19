<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\GallerySlide;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(){
      $activeSlide = Slide::where('active', 1)->with('gallerySlides')->first();

      // Pass the active slide to the view
      return view('Pages.Client.index', compact('activeSlide'));
   }

}
