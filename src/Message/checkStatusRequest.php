<?php

namespace Omnipay\Eupago\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Eupago - Multibanco checkStatusRequest
 */
class checkStatusRequest extends AbstractRequest
{
	public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }
	
	public function getTransactionReference()
    {
        return $this->getParameter('transactionReference');
    }

    public function getData()
    {
        return $this->getParameters();
    }
	
	
	public function getUrl(){
		$explode = explode ('-' , $this->getApiKey());
		if($explode[0] = "demo"){
			$url = 'http://replica.eupago.pt/replica.eupagov1.wsdl';
		}else{
			$url = 'http://eupago.pt/eupagov1.wsdl';
		}
		return $url;
	}
	
    public function sendData($data)
    {	
		$arraydados = array("chave" => $this->getApiKey(), "referencia" => $this->getTransactionReference());
		$url = $this->getUrl();
		   try {
				$client = new \SoapClient($url, array('cache_wsdl' => WSDL_CACHE_NONE));
				$result = $client->informacaoReferencia($arraydados); 
			} catch (SoapFault $sf) {
				throw new \Exception($sf->getMessage(), $sf->getCode());
			}			
			
		 return $this->response = new checkStatusResponse($this, $result); 
    }
	
}

?>