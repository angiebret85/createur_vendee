<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class CreateurSearch {

    /**
     * @var string|null
     */
    private $codePostalSearch;

    /**
     * @var string|null
     */
    private $villeSearch;

    public function __construct()
    {
        $this->options=new ArrayCollection();
    }


    /**
     * @return string|null
     */
    public function getcodePostalSearch(): ?string
    {
        return $this->codePostalSearch;
    }

    /**
     * @param string|null $codePostalSearch
     */
    public function setcodePostalSearch(string $codePostalSearch): void
    {
        $this->codePostalSearch = $codePostalSearch;
    }

    /**
     * @return string|null
     */
    public function getvilleSearch(): ?string
    {
        return $this->villeSearch;
    }

    /**
     * @param string|null $villeSearch
     */
    public function setvilleSearch(string $villeSearch): void
    {
        $this->villeSearch = $villeSearch;
    }
}