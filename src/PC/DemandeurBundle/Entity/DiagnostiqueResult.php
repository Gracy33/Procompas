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
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="titreconseil", type="string", length=255)
     */
    private $titreconseil;

    /**
     * @var string
     *
     * @ORM\Column(name="expliconseil", type="text")
     */
    private $expliconseil;

    /**
     * @var string
     *
     * @ORM\Column(name="titresavoir", type="string", length=255)
     */
    private $titresavoir;

    /**
     * @var string
     *
     * @ORM\Column(name="explisavoir", type="text")
     */
    private $explisavoir;

    /**
     * @var string
     *
     * @ORM\Column(name="titreastuce", type="string", length=255)
     */
    private $titreastuce;

    /**
     * @var string
     *
     * @ORM\Column(name="expliastuce", type="text")
     */
    private $expliastuce;


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
     * Set resume
     *
     * @param string $resume
     *
     * @return DiagnostiqueResult
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set titreconseil
     *
     * @param string $titreconseil
     *
     * @return DiagnostiqueResult
     */
    public function setTitreconseil($titreconseil)
    {
        $this->titreconseil = $titreconseil;

        return $this;
    }

    /**
     * Get titreconseil
     *
     * @return string
     */
    public function getTitreconseil()
    {
        return $this->titreconseil;
    }

    /**
     * Set expliconseil
     *
     * @param string $expliconseil
     *
     * @return DiagnostiqueResult
     */
    public function setExpliconseil($expliconseil)
    {
        $this->expliconseil = $expliconseil;

        return $this;
    }

    /**
     * Get expliconseil
     *
     * @return string
     */
    public function getExpliconseil()
    {
        return $this->expliconseil;
    }

    /**
     * Set titresavoir
     *
     * @param string $titresavoir
     *
     * @return DiagnostiqueResult
     */
    public function setTitresavoir($titresavoir)
    {
        $this->titresavoir = $titresavoir;

        return $this;
    }

    /**
     * Get titresavoir
     *
     * @return string
     */
    public function getTitresavoir()
    {
        return $this->titresavoir;
    }

    /**
     * Set explisavoir
     *
     * @param string $explisavoir
     *
     * @return DiagnostiqueResult
     */
    public function setExplisavoir($explisavoir)
    {
        $this->explisavoir = $explisavoir;

        return $this;
    }

    /**
     * Get explisavoir
     *
     * @return string
     */
    public function getExplisavoir()
    {
        return $this->explisavoir;
    }

    /**
     * Set titreastuce
     *
     * @param string $titreastuce
     *
     * @return DiagnostiqueResult
     */
    public function setTitreastuce($titreastuce)
    {
        $this->titreastuce = $titreastuce;

        return $this;
    }

    /**
     * Get titreastuce
     *
     * @return string
     */
    public function getTitreastuce()
    {
        return $this->titreastuce;
    }

    /**
     * Set expliastuce
     *
     * @param string $expliastuce
     *
     * @return DiagnostiqueResult
     */
    public function setExpliastuce($expliastuce)
    {
        $this->expliastuce = $expliastuce;

        return $this;
    }

    /**
     * Get expliastuce
     *
     * @return string
     */
    public function getExpliastuce()
    {
        return $this->expliastuce;
    }
}

