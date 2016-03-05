<?php

namespace PC\DemandeurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiagnostiqueResult
 *
 * @ORM\Table(name="diagnostique_result")
 * @ORM\Entity(repositoryClass="PC\DemandeurBundle\Repository\DiagnostiqueResultRepository")
 */
class DiagnostiqueResult
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="explication", type="text")
     */
    private $explication;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return DiagnostiqueResult
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set explication
     *
     * @param string $explication
     *
     * @return DiagnostiqueResult
     */
    public function setExplication($explication)
    {
        $this->explication = $explication;

        return $this;
    }

    /**
     * Get explication
     *
     * @return string
     */
    public function getExplication()
    {
        return $this->explication;
    }
}

