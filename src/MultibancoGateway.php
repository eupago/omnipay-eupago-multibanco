<?php

namespace Omnipay\Eupago;

use Omnipay\Common\AbstractGateway;

/**
 * Eupago Pagamento por multibanco
 **/


class MultibancoGateway extends AbstractGateway
{

    public function getName()
    {
        return 'Eupago-Multibanco';
    }

    public function getDefaultParameters()
    {
        return array(
            'apiKey' => '',
        );
    }

    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }
	
	public function setTransactionId($value)
    {
        return $this->setParameter('transactionId', $value);
    }
	
	public function setTransactionReference($value)
    {
        return $this->setParameter('transactionReference', $value);
    }
	
	public function setNotifyUrl($value)
    {
        return $this->setParameter('notifyUrl', $value);
    }
	
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Eupago\Message\Request', $parameters);
    }
	
	public function checkStatus(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Eupago\Message\checkStatusRequest', $parameters);
    }
	
	// public function completePurchase(array $parameters = array())
    // {
        // return $this->createRequest('\Omnipay\Eupago\Message\CompletePurchaseRequest', $parameters);
    // }
	
	public function acceptNotification(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Common\Message\NotificationInterface', $parameters);
    }
	
}
