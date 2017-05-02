<?php
	include "config.php";
	
	/**
	* Main function to discover position of an url on a 
	* Search Engine given a key expression. 
	* 
	* @param {String} myUrl - Url to search for
	* @param {String} myKeyExpression - A word or expression to search for
	* @param {String} searchEngine - A search engine to use (Optional) (default = "google")
	* @param {Integer} limitPages - Maximum pagination (Optional) (default = 10)
	*/
	function mySearchPosition($myUrl, $myKeyExpression, $searchEngine = "google", $limitPages = 10) {
		global $config;
		
		$searchProperties = $config[$searchEngine];

		$result = array();
		
		for($page = 0; $page < $limitPages; $page++) {

			$tries = 0;
			while( empty($searchResults = htmlXpathToArray(getHtml(getSearchPageUrl($myKeyExpression, $page, $searchProperties)), $searchProperties)) && $tries < 3) {
				$tries++;
				if ($tries >= 4) {
					return $result['error'] = ucwords($searchEngine) . " unreachable at page " . $page . ".";
				}
			}
			
			if(empty($searchResults)) {
				$page--;
				break;
			}
			
			foreach($searchResults as $position=>$url){
				if(strpos($url, $myUrl) !== false){
					$result['page'] = $page;
					$result['position'] = $position;
					
					return $result;
				}
			}
		}
		
		return $result['error'] = "Your url '" . $myUrl . "' does not appear on " . ucwords($searchEngine) . " with key expression '" . $myKeyExpression . "' in the top " . $limitPages . " pages.";
	}
	
	/**
	* Function that parses the searched HTML looking for 
	* result Url by Xpath
	* 
	* @param {String} html - String containing searched HTML code to be parsed
	* @param {String} searchProperties - Array containing xpath for url element on search engine page
	*/
	function htmlXpathToArray($html, $searchProperties) {
		$dom = new DOMDocument;
		@$dom->loadHTML(utf8_encode($html));
		
		$domXpath = new DOMXPath ($dom);
		
		$nodes = $domXpath->query($searchProperties["xpath"]);
		
		$result = array();
		
		foreach ($nodes as $node) {
			array_push($result, $node->nodeValue);		
		}
		
		return $result;
	}
	
	/**
	* Function to sum thing up and create the Url
	* 
	* @param {String} myKeyExpression - A word or expression to search for
	* @param {Integer} page - Current page (Optional) (default = 0)
	* @param {String} searchProperties - Array containing baseUrl and pagePproperty
	*/
	function getSearchPageUrl($myKeyExpression, $page = 0, $searchProperties) {
		return $searchProperties["baseUrl"] . urlencode($myKeyExpression) . "&" . $searchProperties["pageProperty"] . "=" . $page*10;
	}
	
	/**
	* Function that uses curl to access Search Engine and retrieve HTML from given Url 
	* 
	* @param {String} url - Url to be used
	*/
	function getHtml($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

?>