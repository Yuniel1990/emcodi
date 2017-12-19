<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gasto
 *
 * @ORM\Table(name="gasto")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\GastoRepository")
 */
class Gasto
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroGasto", type="string", length=20, unique=true)
     */
    private $numeroGasto;

    /**
     * @var string
     *
     * @ORM\Column(name="gastoMN", type="decimal", precision=10, scale=2)
     */
    private $gastoMN;

    /**
     * @var string
     *
     * @ORM\Column(name="gastoCUC", type="decimal", precision=10, scale=2)
     */
    private $gastoCUC;

    /**
     * @var string
     *
     * @ORM\Column(name="gastoTotal", type="decimal", precision=10, scale=2)
     */
    private $gastoTotal;


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
     * Set numeroGasto
     *
     * @param string $numeroGasto
     * @return Gasto
     */
    public function setNumeroGasto($numeroGasto)
    {
        $this->numeroGasto = $numeroGasto;

        return $this;
    }

    /**
     * Get numeroGasto
     *
     * @return string 
     */
    public function getNumeroGasto()
    {
        return $this->numeroGasto;
    }

    /**
     * Set gastoMN
     *
     * @param string $gastoMN
     * @return Gasto
     */
    public function setGastoMN($gastoMN)
    {
        $this->gastoMN = $gastoMN;

        return $this;
    }

    /**
     * Get gastoMN
     *
     * @return string 
     */
    public function getGastoMN()
    {
        return $this->gastoMN;
    }

    /**
     * Set gastoCUC
     *
     * @param string $gastoCUC
     * @return Gasto
     */
    public function setGastoCUC($gastoCUC)
    {
        $this->gastoCUC = $gastoCUC;

        return $this;
    }

    /**
     * Get gastoCUC
     *
     * @return string 
     */
    public function getGastoCUC()
    {
        return $this->gastoCUC;
    }

    /**
     * Set gastoTotal
     *
     * @param string $gastoTotal
     * @return Gasto
     */
    public function setGastoTotal($gastoTotal)
    {
        $this->gastoTotal = $gastoTotal;

        return $this;
    }

    /**
     * Get gastoTotal
     *
     * @return string 
     */
    public function getGastoTotal()
    {
        return $this->gastoTotal;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Gasto
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
