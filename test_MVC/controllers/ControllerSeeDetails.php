<?php

require_once('views/View.php');

class ControllerSeeDetails
{
    private $OfferManager;
    private $View;

    public function __construct($url)
    {
        if(isset($url) && count((is_countable($url)?$url:[])) > 2) 
        {
            throw new Exception('Page introuvable');
        }
        else
            $this->Offer($url);
    }
    private function Offer($url)
    {
        $this->OfferManager = new OfferManager();
        $Offer = $this->OfferManager->getOffer($url[1]);

        $this->View = new View('Detail');
        $this->View->generate(array('Offer'=>$Offer));
    }

}

?>