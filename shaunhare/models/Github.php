<?php 
namespace shaunhare\models;
use GuzzleHttp\Client;

class Github
{
	private $url; 

	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;   
	}
	
	public function __set($name,$value)
	{
	  $this->$name=$value;
	}	
	public function __get ($name)
	{
		return $this->$name;
	}
	
	public function searchRepos()
	{
	
	   $this->url = 'https://api.github.com/search/repositories?q=hack24';

	   $res=$this->client->get($this->url); 
		$hackurls=[];

          $status = $res->getStatusCode();
	  if($status==200)
          {
		
		$repos = json_decode($res->getBody()); 
		foreach($repos->items as $repo)
		{
			array_push($hackurls,$repo->url);
		}		
	
	  }
	  return $repos;
		
	}	

}
