<?PHP
/******************************************************************************
 Pepper
 
 Developer		: Mike Valstar
 Plug-in Name	: Referrer Aggregator
 
 http://www.thrasher7.net/pepper/

 Some ideas stolen from Scott McMillin (a little bit of code too)
 Yet other ideas copied from Shaun Inman (and a little code too)
 ******************************************************************************/

$installPepper = "MV_ReferrerAggregator";

class MV_ReferrerAggregator extends Pepper{
	
	var $version 	= 40;
	var $info 		= array(
						'pepperName'	=> 'Referrer Aggregator',
						'pepperUrl'		=> 'http://www.thrasher7.net/pepper/',
						'pepperDesc'	=> 'Referrer Aggregation.',
						'developerName'	=> 'Mike Valstar',
						'developerUrl'	=> 'http://thrasher7.net/'
						);
	var $panes		= array(
						'Referrer Aggregator' => array(
							'All',
							'Websites',
							'Search Engines'
							)
						);
	var $prefs		= array(
						'hideMyDomain'				=> 0,
					    'referrerTimespan'          => 0,
						'report'          			=> 0,
						'searchClean'          		=> 1,
						'moreSearchEngines'         => ''
						);
						
	var $searchEngines = array(
						'Google' => array(
							'google.com',
							'google.ca',
							'google.fr',
							'google.co.uk',
							'google.de',
							'google.com.au',
							'google.it',
							'google.es',
							'google.be',
							'google.sk',
							'google.no',
							'google.nl',
							'goole.com.br',
							'google.pl',
							'google.fi',
							'google.dk',
							'google.ie',
							'google.com.mx',
							'google.com.br',
							'google.se',
							'google.ch',
							'google.com.gr',
							'google.pt',
							'google.ro',
							'google.co.hu',
							'google.at',
							'google.com.ar',
							'google.com.ua',
							'google.co.nz',
							'google.com.co',
							'google.co.jp',
							'google.ru',
							'google.cl',
							'google.co.kr',
							'google.com.ph',
							'google.com.tr',
							'ww.google.fr',
							'google.co.th',
							'google.co.ve',
							'google.com.sg',
							'google.lt',
							'google.co.id',
							'google.co.in',
							'google.com.hk',
							'google.co.za',
							'google.bg',
							'google.lv',
							'google.com.tw',
							'google.com.my',
							'google.co.il',
							'google.hr',
							'google.ae',
							'google.is',
							'google.com.pk',
							'google.com.pe',
							'google.lu'
							),
						'Google Directory' => array(
							'directory.google.com'
							),
						'Google Images' => array(
							'images.google.com',
							'images.google.ca',
							'images.google.co.uk',
							'images.google.com.tw',
							'images.google.com.br', 
							'images.google.at', 
							'images.google.ch', 
							'images.google.cl', 
							'images.google.sk', 
							'images.google.co.za', 
							'images.google.com.ar', 
							'images.google.com.mx', 
							'images.google.com.my', 
							'images.google.com.ua', 
							'images.google.ie', 
							'images.google.co.nz', 
							'images.google.be', 
							'images.google.ro', 
							'images.google.com.gr', 
							'images.google.com.mx', 
							'images.google.co.hu,', 
							'images.google.ie', 
							'images.google.be', 
							'images.google.com', 
							'images.google.ca', 
							'images.google.fr', 
							'images.google.co.uk', 
							'images.google.gr', 
							'images.google.co.in', 
							'images.google.com.au',  
							'images.google.ae',  
							'images.google.de', 
							'images.google.nl', 
							'images.google.it', 
							'images.google.se', 
							'images.google.pl', 
							'images.google.com.ph', 
							'images.google.fi', 
							'images.google.com.fn', 
							'images.google.co.jp', 
							'images.google.co.za', 
							'images.google.com.tr', 
							'images.google.dk'
							),
						'Yahoo' => array(
							'search.yahoo.com',
							'uk.search.yahoo.com',
							'video.search.yahoo.com',
							'au.search.yahoo.com',
							'ca.search.yahoo.com',
							'de.search.yahoo.com',
							'es.search.yahoo.com',
							'fr.search.yahoo.com',
							'hk.search.yahoo.com',
							'search.yahoo.co.jp'
							),
						'Yahoo Images' => array(
							'images.search.yahoo.co.jp',
							'images.search.yahoo.com'
							),
						'Altavista' => array(
							'altavista.com',
							'de.altavista.com',
							'fr.altavista.com',
							'it.altavista.com',
							'se.altavista.com',
							'be.altavista.com',
							'br.altavista.com',
							'nl.altavista.com',
							'uk.altavista.com'
							),
						'MSN' => array(
							'search.msn.com',
							'search.msn.co.uk',
							'search.sympatico.msn.ca'
							),
						'Windows Media Search' => array(
							'search.windowsmedia.com'
							),
						'Ask Jeeves' => array(
							'ask.com',
							'uk.ask.com'
							),
						'Excite' => array(
							'msxml.excite.com',
							'excite.it'
							),
						'AOL Search' => array(
							'aolsearch.aol.com',
							'aolsearch.aol.co.uk',
							'search.aol.com',
							'sucheaol.aol.de'
							),
						'A9' => array(
							'a9.com'
							),
						'Dogpile' => array(
							'dogpile.com'
							),
						'Netscape' => array(
							'search.netscape.com',
							'search.hp.netscape.com'
							),
						'AllTheWeb' => array(
							'alltheweb.com'
							),
						'Metacrawler' => array(
							'metacrawler.com'
							),
						'MySearch' => array(
							'mysearch.myway.com'
							),
						'Overture' => array(
							'overture.com'
							),
						'Other' => array()
						);
	
	
	/**************************************************************************
	 isCompatible()
	 **************************************************************************/
	function isCompatible()
	{
		if ($this->Mint->version > 126)
			return array
			(
				'isCompatible'	=> true,
				'explanation'	=> '<p>This Pepper is not compatible with this version of mint, please upgrade</p>'
			);
			
		return array
		(
			'isCompatible'	=> true,
			'explanation'	=> '<p>This Pepper is compatible with this version of mint</p>'
		);
	}
	
	/**************************************************************************
	 onDisplayPreferences() Partial Credit: Shaun Inman
	 **************************************************************************/
 	function onDisplayPreferences() {
		$selected1 = ($this->prefs['referrerTimespan']==1)?' selected="selected"':'';
		$selected6 = ($this->prefs['referrerTimespan']==6)?' selected="selected"':'';
		$selected12 = ($this->prefs['referrerTimespan']==12)?' selected="selected"':'';
		$selected24 = ($this->prefs['referrerTimespan']==24)?' selected="selected"':'';
		$selected48 = ($this->prefs['referrerTimespan']==48)?' selected="selected"':'';
		$selected72	= ($this->prefs['referrerTimespan']==72)?' selected="selected"':'';
		$selected168	= ($this->prefs['referrerTimespan']==168)?' selected="selected"':'';
		$selected336	= ($this->prefs['referrerTimespan']==336)?' selected="selected"':'';
		$selected672	= ($this->prefs['referrerTimespan']==672)?' selected="selected"':'';
		$selectedAll= ($this->prefs['referrerTimespan']==0)?' selected="selected"':'';
		
		$referalchecked = (isset($this->prefs['hideMyDomain']) && $this->prefs['hideMyDomain'] == 1) ? ' checked="checked"':'';
		
		$moreSearch = (isset($this->prefs['moreSearchEngines'])) ? $this->prefs['moreSearchEngines'] : '';
		
		$reportchecked = (isset($this->prefs['report']) && $this->prefs['report'] == 1) ? ' checked="checked"':'';
		
		$cleanchecked = (isset($this->prefs['searchClean']) && $this->prefs['searchClean'] == 1) ? ' checked="checked"':'';
		
		$preferences['Referrals']	= "
		<table>
     		<tr>
     			<td><label><input type=\"checkbox\" name=\"hideMyDomainAgg\" value=\"1\" $referalchecked /> Hide referrals from {$this->Mint->cfg['siteDomains']}</label></td>
     		</tr>
     	</table>
		";
		$preferences['Timeframe'] = "
		<table>
			<tr>
				<td>Default Mini Tab </td>
				<td><span class=\"inline\"><select name=\"referrerAggregatorTimespan\">
					<option value=\"1\"{$selected1}>1 hour</option>
					<option value=\"6\"{$selected6}>6 hours</option>
					<option value=\"12\"{$selected12}>12 hours</option>
					<option value=\"24\"{$selected24}>24 hours</option>
					<option value=\"48\"{$selected48}>48 hours</option>
					<option value=\"72\"{$selected72}>72 hours</option>
					<option value=\"168\"{$selected168}>1 week</option>
					<option value=\"336\"{$selected336}>2 weeks</option>
					<option value=\"672\"{$selected672}>4 weeks</option>
					<option value=\"0\"{$selectedAll}>Show all</option>
				</select></span></td>
			</tr>
		</table>";
		$preferences['More Search Engines'] = "
		<table>
		<tr>
			<td>Other search engine domains which will be grouped into \"Other\".</td>
		</tr>
		<tr>
			<td><span><textarea id=\"moreSearchEngines\" name=\"moreSearchEngines\" rows=\"6\" cols=\"30\">{$moreSearch}</textarea></span></td>
		</tr>
		<tr>
 			<td><label><input type=\"checkbox\" name=\"searchClean\" value=\"1\" $cleanchecked /> clean listing to exclude those already in pepper</label></td>
 		</tr>
		</table>
		";

		$preferences['Report Added Search Engines']	= "
		<table>
     		<tr>
     			<td><label><input type=\"checkbox\" name=\"reportThrasher7\" value=\"1\" $reportchecked /> report added search engines to <a href=\"http://thrasher7.net/pepper/\" target=\"_blank\">http://thrasher7.net/pepper/</a> for release in next version</label></td>
     		</tr>
     	</table>
		";
		
		$preferences['Additional Information']	= "Any domains in the ignore list under \"Default\" will be ignored completely with this pepper";
		
		return $preferences;

 	}

 	/**************************************************************************
 	 onSavePreferences()
 	 **************************************************************************/
 	function onSavePreferences() {
		// clean up the engines before reporting (if applicable)
		if(isset($_POST['searchClean'])){
			$_POST['moreSearchEngines'] = $this->removeExistingEngines($_POST['moreSearchEngines']);
		}
	
		// check to see if search engines changed (report if applicable)
		if(isset($_POST['reportThrasher7']) && 
			$_POST['reportThrasher7'] == 1 && 
			isset($_POST['moreSearchEngines']) &&
			trim($_POST['moreSearchEngines']) != '' &&
			$_POST['moreSearchEngines'] != $this->prefs['moreSearchEngines']){
			
			// report it!
			$searchEngines = urlencode($_POST['moreSearchEngines']);
			$email = urlencode($this->Mint->cfg['email']);
			
			$this->_tracker('SearchEngines', "email={$email}&search={$searchEngines}");
		}
		
		$this->prefs['hideMyDomain']		= (isset($_POST['hideMyDomainAgg'])) ? $_POST['hideMyDomainAgg'] : 0;
 		$this->prefs['referrerTimespan']	= (isset($_POST['referrerAggregatorTimespan']))?$_POST['referrerAggregatorTimespan']:24;
 		$this->prefs['report']		= (isset($_POST['reportThrasher7'])) ? $_POST['reportThrasher7'] : 0;
		$this->prefs['searchClean']		= (isset($_POST['searchClean'])) ? $_POST['searchClean'] : 0;
		$this->prefs['moreSearchEngines']		= (isset($_POST['moreSearchEngines'])) ? $_POST['moreSearchEngines'] : 0;
	}

	/**************************************************************************
	 onCustom()
	 **************************************************************************/
	function onCustom() 
	{
		if (isset($_POST['action']) && $_POST['action']=='getref' && isset($_POST['mvrefdomain'])) {
			$domain	= $this->Mint->escapeSQL($_POST['mvrefdomain']);
			echo $this->getHTML_getReferrers($domain);
		}elseif(isset($_POST['action']) && $_POST['action']=='getsearch' && isset($_POST['mvrefdomain'])){
			$engine	= $this->Mint->escapeSQL($_POST['mvrefdomain']);
			echo $this->getHTML_getSearchDetail($engine);
		}
	}

	/**************************************************************************
	 onDisplay()
	 **************************************************************************/
	function onDisplay($pane, $tab, $column = '', $sort = '')
	{
		$html = '';
		switch($pane) {
		/* Referrer Aggregator *****************************************************/
			case 'Referrer Aggregator': 
				switch($tab) {
					case 'All':
						$html .= $this->getHTML_All_Referrers();
						break;
					case 'Websites':
						$html .= $this->getHTML_Website_Referrers();
						break;
					case 'Search Engines':
						$html .= $this->getHTML_SearchEngine_Referrers();
						break;
					default:
						// its a minitab
						$timespan = trim($tab, 'aws');
						$type = substr($tab,0,1);
						switch($type){
							case 'a':
								$html .= $this->getHTML_All_Referrers($timespan);
								break;
							case 'w':
								$html .= $this->getHTML_Website_Referrers($timespan);
								break;
							case 's':
								$html .= $this->getHTML_SearchEngine_Referrers($timespan);
								break;
						}
						break;
				}
				break;
			}
		return $html;
	}
	
	/**************************************************************************
	 makeDisplay($data) Partial Credit: Scott McMillin
	 **************************************************************************/
	function makeDisplay($data, $columns, $action){
		$html = '';
		$tabledata = array();
		$tableData['hasFolders'] = true;
		$tableData['table'] = array('id'=>'','class'=>'folder');
		$tableData['thead'] = $columns;
		$tableData['tbody'] = array();
		
		foreach($data as $key => $value){
			$tableData['tbody'][] = array(
				$value['domain'],
				$value['total'],
				'folderargs'=>array(
					'action'=>$action,
					'mvrefdomain'=>$key)
				);
		}
		
		$html = $this->Mint->generateTable($tableData);
		
		return $html;
	}
	/**************************************************************************
	 getData($type = 'All')
	 **************************************************************************/
	function getData($type = 'All', $timespan){
		$data = array();
		$where = " domain_checksum != '0' ";
		
		$this->addCustomSearchEngines();
		
		// Hide our domain
		if (isset($this->prefs['hideMyDomain']) && $this->prefs['hideMyDomain'] == '1') {
		    $where .= " AND referer_is_local = '0' ";
		}
		
		// Set timespan req
		if($timespan || (isset($this->prefs['referrerTimespan']) && $this->prefs['referrerTimespan'] != 0)){
			if (!$timespan) $timespan = $this->prefs['referrerTimespan'];
			$where .= ' AND `dt` > '.(time() - ($timespan*60*60)).' ';
		}
		
		// Add Grouping
		switch($type){
			case 'All':
				break;
			case 'Web':
				$chksums = array();
				foreach ($this->searchEngines as $key => $value){
					foreach ($value as $domain){
						$chksums[] = crc32(trim($domain));
					}
				}
				
				$where .= " AND domain_checksum NOT IN (".implode($chksums, ',').") ";
				break;
		}
		
		// Ignore List
		$ignore = $this->getIgnoreList();
		if (count($ignore) >0)
			$where .= " AND domain_checksum NOT IN (".implode($ignore, ',').") ";
		
		$query = "SELECT domain_checksum, count(domain_checksum) as total, referer  
						FROM {$this->Mint->db['tblPrefix']}visit  
						WHERE $where
		 				GROUP BY domain_checksum 
						ORDER BY total desc
						LIMIT 0,{$this->Mint->cfg['preferences']['rows']}";
			
		if ($result = mysql_query($query)) {
			while ($row = mysql_fetch_array($result)) {
				$data[$row['domain_checksum']]['total'] = $row['total'];
				$data[$row['domain_checksum']]['domain'] = $this->extractDomain($row['referer']);
			}
		}

		return $data;
	}
	/**************************************************************************
	 getSearchData()
	 **************************************************************************/
	function getSearchData($timespan){
		$data = array();
		$searchData = array();
		$searchSums = array();
		$returnData = array();
		$where = " domain_checksum != '0' ";
		
		$this->addCustomSearchEngines();
		
		// Hide our domain
		if (isset($this->prefs['hideMyDomain']) && $this->prefs['hideMyDomain'] == '1') {
		    $where .= " AND referer_is_local = '0' ";
		}
		
		// Set timespan req
		if($timespan || (isset($this->prefs['referrerTimespan']) && $this->prefs['referrerTimespan'] != 0)){
			if (!$timespan) $timespan = $this->prefs['referrerTimespan'];
			$where .= ' AND `dt` > '.(time() - ($timespan*60*60)).' ';
		}
		
		// Add Grouping
		$chksums = array();
		foreach ($this->searchEngines as $key => $value){
			foreach ($value as $domain){
				$chksums[] = crc32(trim($domain));
				$searchSums[$key][] = crc32(trim($domain));
			}
		}
		
		$where .= " AND domain_checksum IN (".implode($chksums, ',').") ";
		
		// Ignore List
		$ignore = $this->getIgnoreList();
		if (count($ignore) >0)
			$where .= " AND domain_checksum NOT IN (".implode($ignore, ',').") ";
		
		$query = "SELECT domain_checksum, count(domain_checksum) as total, referer  
						FROM {$this->Mint->db['tblPrefix']}visit  
						WHERE $where
		 				GROUP BY domain_checksum";
			
		if ($result = mysql_query($query)) {
			while ($row = mysql_fetch_array($result)) {
				$data[$row['domain_checksum']]['total'] = $row['total'];
				$data[$row['domain_checksum']]['domain'] = $this->extractDomain($row['referer']);
			}
		}
		
		// categorize the data
		foreach ($searchSums as $key => $value){
			foreach ($value as $domainSum){
				if(!isset($searchData[$key]))
					$searchData[$key] = 0;
				if(isset($data[$domainSum]))
					$searchData[$key] += $data[$domainSum]['total'];
			}
		}

		arsort($searchData);
		
		foreach($searchData as $key => $value){
			if ($value > 0 && count($returnData) < $this->Mint->cfg['preferences']['rows']){
				$returnData[$key] = array(
					'total' => $value,
					'domain' => $key
					);
			}
		}

		return $returnData;
	}
	/**************************************************************************
	 getHTML_All_Referrers()
	 **************************************************************************/
	function getHTML_All_Referrers($timespan = false){
		$data = $this->getData('All', $timespan);
		return $this->getMiniTabs('a', $timespan) . $this->makeDisplay($data, array(
			array('value'=>'Referrer','class'=>''),
			array('value'=>'Hits','class'=>'')
			), 'getref');
	}
	/**************************************************************************
	 getHTML_Website_Referrers()
	 **************************************************************************/
	function getHTML_Website_Referrers($timespan = false){
		$data = $this->getData('Web', $timespan);
		return $this->getMiniTabs('w', $timespan) . $this->makeDisplay($data, array(
			array('value'=>'Referrer','class'=>''),
			array('value'=>'Hits','class'=>'')
			), 'getref');
	}
	/**************************************************************************
	 getHTML_SearchEngine_Referrers()
	 **************************************************************************/
	function getHTML_SearchEngine_Referrers($timespan = false){
		$data = $this->getSearchData($timespan);
		return $this->getMiniTabs('s', $timespan) . $this->makeDisplay($data, array(
			array('value'=>'Search Engine','class'=>''),
			array('value'=>'Hits','class'=>'')
			), 'getsearch');
	}
	/**************************************************************************
     getHTML_getSearchDetail($engine) Partial Credit: Scott McMillin
	 **************************************************************************/
	function getHTML_getSearchDetail($engine){
		$html = '';
		$where = '';
		$chksums = array();
		
		$this->addCustomSearchEngines();
	
		// Add Grouping
		$chksums = array();
		$value = $this->searchEngines[$engine];
		foreach ($value as $domain){
			$chksums[] = crc32(trim($domain));
		}

		$where .= "domain_checksum IN (".implode($chksums, ',').") ";
		
		// Hide our domain
		if (isset($this->prefs['hideMyDomain']) && $this->prefs['hideMyDomain'] == '1') {
		    $where .= " AND referer_is_local = '0' ";
		}
		
		// Set timespan req
		if(isset($this->prefs['referrerTimespan']) && $this->prefs['referrerTimespan'] != 0){
			$where .= ' AND `dt` > '.(time() - ($this->prefs['referrerTimespan']*60*60)).' ';
		}
		
		// Ignore List
		$ignore = $this->getIgnoreList();
		if (count($ignore) >0)
			$where .= " AND domain_checksum NOT IN (".implode($ignore, ',').") ";
		
		$query = "SELECT domain_checksum, count(domain_checksum) as total, referer  
						FROM {$this->Mint->db['tblPrefix']}visit  
						WHERE $where
		 				GROUP BY domain_checksum
						ORDER BY total desc
						LIMIT 0,{$this->Mint->cfg['preferences']['rows']}";

		if ($result = mysql_query($query)) {
			while ($row = mysql_fetch_array($result)) {
				$tableData['tbody'][] = array(
					$this->createLink('http://'.$this->extractDomain($row['referer']),$this->extractDomain($row['referer'])),
					$row['total']
					);
			}
		}

		if(isset($tableData)) 
			$html = $this->Mint->generateTableRows($tableData);


		return $html;
	}
	/**************************************************************************
     getHTML_getReferrers($domain) Partial Credit: Scott McMillin
	 **************************************************************************/
	function getHTML_getReferrers($domain){
		$html = '';
		$where = '';
		
		if(isset($this->prefs['referrerTimespan']) && $this->prefs['referrerTimespan'] != 0){
			$where .= ' AND `dt` > '.(time() - ($this->prefs['referrerTimespan']*60*60)).' ';
		}

       	$query = "  SELECT 
                   		CONCAT('/',SUBSTRING_INDEX(TRIM(LEADING 'http://' FROM referer),'/',-1)) AS resource,
	                    COUNT(resource) AS total,
	                    referer 
			 		FROM {$this->Mint->db['tblPrefix']}visit
					WHERE domain_checksum = '$domain' $where
					GROUP BY resource 
					ORDER BY total desc
                   	LIMIT 0,{$this->Mint->cfg['preferences']['rows']}";

			if ($result = mysql_query($query)) {
				while ($row = mysql_fetch_array($result)) {
					$tableData['tbody'][] = array(
						$this->createLink($row['referer'],$row['resource']),
						$row['total']
						);
					}
				}


		$html = $this->Mint->generateTableRows($tableData);


		return $html;
	}
	/**************************************************************************
	 addCustomSearchEngines()
	 **************************************************************************/
	function addCustomSearchEngines(){
		$addDomains = array();
		$newEngines = (isset($this->prefs['moreSearchEngines'])) ? preg_split('/[\s,]+/', $this->prefs['moreSearchEngines']) : array();
		
		foreach ($newEngines as $domain)
			if (!empty($domain))
		            $addDomains[] = trim($domain);
		
		$this->searchEngines['Other'] = $addDomains;
		
	}
	/**************************************************************************
	 getIgnoreList()
	 **************************************************************************/
	function getIgnoreList(){
		$ignoreList = array();
		$ignoreText = (isset($this->Mint->cfg['preferences']['pepper']['0']['ignoreReferringDomains'])) ? preg_split('/[\s,]+/', $this->Mint->cfg['preferences']['pepper']['0']['ignoreReferringDomains']) : array();
		
		foreach ($ignoreText as $domain)
			if (!empty($domain))
		            $ignoreList[] = crc32(trim($domain));
		
		return $ignoreList;
		
	}
	/**************************************************************************
	 removeExistingEngines($text)
	 **************************************************************************/
	function removeExistingEngines($text = '') {
		$textEngines = preg_split('/[\s,]+/', $text) ;
		
		foreach($textEngines as $key => $otherEngine)
			foreach($this->searchEngines as $value)
				foreach($value as $engine)
					if ($engine == trim($otherEngine))
						unset($textEngines[$key]);
		
	    return implode("\n", $textEngines);
	}
	/**************************************************************************
	 extractDomain($referrer) Credit: Scott McMillin
	 **************************************************************************/
	function extractDomain($referer) {
	    $domain = explode("/",$referer);
	    return $domain[2];
	}
	/**************************************************************************
	 createLink($referer,$resource) Credit: Scott McMillin
	 **************************************************************************/
	function createLink($referer,$resource) {
		return "<a href=\"$referer\" target=\"_blank\">". $this->Mint->abbr($resource) ."</a>";
	}
	/**************************************************************************
	 getMiniTabs()
	 **************************************************************************/
	function getMiniTabs($type= '', $selected = false){
		if (!$selected) $selected = $this->prefs['referrerTimespan'];
		foreach($this->Mint->cfg['panes'] as $key => $value){
			if($value['pepperId'] == $this->pepperId){
				$paneId = $key;
			}
		}
		
		$selected1 = ($selected==1)?' background: gray; color: white; ':'';
		$selected6 = ($selected==6)?' background: gray; color: white;':'';
		$selected12 = ($selected==12)?' background: gray; color: white;':'';
		$selected24 = ($selected==24)?' background: gray; color: white;':'';
		$selected48 = ($selected==48)?' background: gray; color: white;':'';
		$selected72	= ($selected==72)?' background: gray; color: white;':'';
		$selected168	= ($selected==168)?' background: gray; color: white;':'';
		$selected336	= ($selected==336)?' background: gray; color: white;':'';
		$selected672	= ($selected==672)?' background: gray; color: white;':'';
		$selectedAll= ($selected==0)?' background: gray; color: white;':'';
		
		return 
<<<HERE
<span id="MV_RA_span" style="display: none;"></span>
<table style="width: 100%;">
	<tr>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected1}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}1'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">1 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected6}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}6'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">6 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected12}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}12'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">12 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected24}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}24'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">24 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected48}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}48'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">48 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected72}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}72'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">72 H</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected168}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}168'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">1 W</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected336}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}336'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">2 W</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selected672}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}672'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">4 W</a></td>
		<td style="width:10%; border: 1px solid gray; padding: 0.3em;text-align: center; {$selectedAll}"><a href="#" onClick="document.getElementById('MV_RA_span').innerHTML = '{$type}0'; SI.Mint.loadTab({$paneId},document.getElementById('MV_RA_span')); return false;">All</a></td>
	</tr>
</table>
HERE;
	}
	/**************************************************************************
	 _tracker($action, $post) Credit: Shaun Inman
	 **************************************************************************/
	function _tracker($action, $post = ''){
		$host	 	= 'thrasher7.net';
		$gateway	= '/pepper/tracker';
		$useCURL 	= in_array('curl', get_loaded_extensions());
		$mintPing 	= "X-mint-ping: $action";
		$response	= '';
		$method		= (empty($post))?'GET':'POST';
		
		// There's a bug in the OS X Server/cURL combination that results in 
		// memory allocation problems so don't use cURL even if it's available
		if (isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Darwin') !== false)
		{
			$useCURL = false;
		}
		
		if ($useCURL)
		{
			$handle		= curl_init("http://{$host}{$gateway}");
			curl_setopt($handle, CURLOPT_HTTPHEADER, array($mintPing));
			curl_setopt($handle,CURLOPT_CONNECTTIMEOUT,10);
			curl_setopt($handle,CURLOPT_RETURNTRANSFER,1);
		}
		else
		{
			$headers	 = "{$method} {$gateway} HTTP/1.0\r\n";
			$headers	.= "Host: $host\r\n";
			$headers	.= "{$mintPing}\r\n";
		}
		
		if (!empty($post)) // This is a POST request
		{
			if ($useCURL)
			{
				curl_setopt($handle,CURLOPT_POST,true);
				curl_setopt($handle,CURLOPT_POSTFIELDS,$post);
			}
			else
			{
				$headers	.= "Content-type: application/x-www-form-urlencoded\r\n";
				$headers	.= "Content-length: ".strlen($post)."\r\n";
			}
		}
		
		
		if ($useCURL)
		{
			$response = curl_exec($handle);
			if (curl_errno($handle))
			{
				$error = 'Could not connect to Gateway (using cURL): '.curl_error($handle);
				$this->logError($error);
			}
			curl_close($handle);
		}
		else
		{
			$headers	.= "\r\n";
			$socket		 = @fsockopen($host, 80, $errno, $errstr, 10);
			if ($socket)
			{
				fwrite($socket, $headers.$post);
				while (!feof($socket)) 
				{
					$response .= fgets ($socket, 1024);
				}
				$response = explode("\r\n\r\n", $response, 2);
				$response = trim($response[1]);
			}
			else
			{
				$error = 'Could not connect to Gateway (using fsockopen): '.$errstr.' ('.$errno.')';
				$this->logError($error);
				$response = 'FAILED';
			}
		}
		return $response;
	}
}

?>