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

    /**
     * @var ArrayCollection
     */
    private $categories;

    /**
     * @var integer|null
     */
    private $distance;

    /**
     * @var float|null
     */
    private $lat;

    /**
     * @var float|null
     */
    private $lng;

    public function __construct()
    {
        $this->categories=new ArrayCollection();
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

    /**
     * @return ArrayCollection
     */
    public function getCategories(): ArrayCollection
    {
        return $this->categories;
    }

    /**
     * @param ArrayCollection $categories
     */
    public function setCategories(ArrayCollection $categories): void{
        $this->categories = $categories;
    }


    /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @var string|null
     */
    private $address;

    /**
     * @param int|null $distance
     * @return CreateurSearch
     */
    public function setDistance(?int $distance): CreateurSearch
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @param float|null $lat
     * @return CreateurSearch
     */
    public function setLat(?float $lat): CreateurSearch
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @param float|null $lng
     * @return CreateurSearch
     */
    public function setLng(?float $lng): CreateurSearch
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return CreateurSearch
     */
    public function setAddress(?string $address): CreateurSearch
    {
        $this->address = $address;
        return $this;
    }
}