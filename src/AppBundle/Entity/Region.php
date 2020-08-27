<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegionRepository")
 */
class Region
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Departement", mappedBy="region")
     */
    private $departement;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Region
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Region
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add departement
     *
     * @param \AppBundle\Entity\Departement $departement
     * @return Region
     */
    public function addDepartement(\AppBundle\Entity\Departement $departement)
    {
        $this->departement[] = $departement;

        return $this;
    }

    /**
     * Remove departement
     *
     * @param \AppBundle\Entity\Departement $departement
     */
    public function removeDepartement(\AppBundle\Entity\Departement $departement)
    {
        $this->departement->removeElement($departement);
    }

    /**
     * Get departement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
