<?php
namespace ApiV\Test\Controller\Index;
 
class Index extends \Magento\Framework\App\Action\Action
{
 
    protected $_curl;
    protected $urlPrefix = 'https://';

    protected $apiUrl ='api.agify.io/?name=meelad';

     public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\HTTP\Client\Curl $curl
     ) {
        $this->_curl = $curl;
        parent::__construct($context);
     }

     public function getApiUrl()
    {
        return $this->urlPrefix . $this->apiUrl;
    }
 
     public function execute()
     {
        print_r("Enter ");

        $apiUrl = $this->getApiUrl();

        $this->_curl->get($apiUrl);

        $response = json_decode($this->_curl->getBody(), true);
      //   print_r($response);

        foreach($response as $values)
        {
         echo nl2br($values."\n");
      }

        print_r(" Hello");
      //   return $response;
     }
}
?>