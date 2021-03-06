<?php

require_once('views/View.php');

class ControllerSearchOffers
{
    private $OfferManager;
    private $View;

    public function __construct($url)
    {
        if(isset($url) && count((is_countable($url)?$url:[])) > 1) 
        {
            throw new Exception('Page introuvable');
        }
        else
            $this->Offers();
    }
    private function Offers()
    {
        $this->OfferManager = new OfferManager();
        $Offers = $this->OfferManager->getOffers();
        $this->View = new View('SearchOffers');
        $this->View->generate(array('Offers'=>$Offers));
    }
}

?>