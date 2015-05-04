<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use shaunhare\models\Github; 
use GuzzleHttp\Client;

class HackController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index() 
    {
        $github = new Github(new Client()); 
	$repos=	$github->searchRepos(); 
	return view('hack.index',array('hackurls'=>$repos));
    }

}

