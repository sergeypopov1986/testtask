<?php
class TestSoapGeoIP{
	private $soapUrl = 'http://ws.cdyne.com/ip2geo/ip2geo.asmx?WSDL';
	private $soapClient;

	public function __construct(){
		$this->soapClient = new SoapClient($this->soapUrl , array('soap_version'   => SOAP_1_2));
	}

	public function GetGeoDataByIP($ip = "85.173.130.30"){
		try{
			$result = $this->soapClient->ResolveIP(array("ipAddress" => $ip, "licenseKey" => "0"));
			//print_r($result->ResolveIPResult->City);
			echo "Страна: ".$result->ResolveIPResult->Country . "\n"
			."Город: " . $result->ResolveIPResult->City ."\n"
			."Координаты: ( " . $result->ResolveIPResult->Latitude . " , " . $result->ResolveIPResult->Longitude . " )" . "\n";

		}catch(SoapFault $e){
			echo $e->getMessage();
		}
	}
}

$geo = new TestSoapGeoIP;
$geo->GetGeoDataByIP();

?>