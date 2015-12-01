<?php

namespace Omnipay\Eupago\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Euoago checkStatusResponse
 */
class checkStatusResponse extends AbstractResponse
{
	
    public function isSuccessful()
    {
        return true;
    }
	
	public function getMessage()
    {
		$data = $this->getData();
        return $data->resposta;
    }
	
	public function getStatus()
    {
		$data = $this->getData();
        return $data->estado_referencia;
    }
	
}