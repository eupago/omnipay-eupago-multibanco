<?php

namespace Omnipay\Eupago\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Manual Response
 */
class Response extends AbstractResponse
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
	
	public function getTransactionReference()
    {
        $data = $this->getData();
        return $data->referencia;
    }
	
	public function getTransactionId()
    {
        return $this->getRequest()->getTransactionId();
    }
}
