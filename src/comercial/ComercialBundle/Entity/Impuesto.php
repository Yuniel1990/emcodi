<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Impuesto
 *
 * @ORM\Table(name="impuesto")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\ImpuestoRepository")
 */
class Impuesto
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
     * @ORM\Column(name="osde", type="decimal", precision=10, scale=2)
     */
    private $osde;

    /**
     * @var string
     *
     * @ORM\Column(name="otrosGastos", type="decimal", precision=10, scale=2)
     */
    private $otrosGastos;

    /**
     * @var string
     *
     * @ORM\Column(name="ingresos", type="decimal", precision=10, scale=2)
     */
    private $ingresos;

    /**
     * @var string
     *
     * @ORM\Column(name="impuestoTotal", type="decimal", precision=10, scale=2)
     */
    private $impuestoTotal;


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
     * Set osde
     *
     * @param string $osde
     * @return Impuesto
     */
    public function setOsde($osde)
    {
        $this->osde = $osde;

        return $this;
    }

    /**
     * Get osde
     *
     * @return string 
     */
    public function getOsde()
    {
        return $this->osde;
    }

    /**
     * Set otrosGastos
     *
     * @param string $otrosGastos
     * @return Impuesto
     */
    public function setOtrosGastos($otrosGastos)
    {
        $this->otrosGastos = $otrosGastos;

        return $this;
    }

    /**
     * Get otrosGastos
     *
     * @return string 
     */
    public function getOtrosGastos()
    {
        return $this->otrosGastos;
    }

    /**
     * Set ingresos
     *
     * @param string $ingresos
     * @return Impuesto
     */
    public function setIngresos($ingresos)
    {
        $this->ingresos = $ingresos;

        return $this;
    }

    /**
     * Get ingresos
     *
     * @return string 
     */
    public function getIngresos()
    {
        return $this->ingresos;
    }

    /**
     * Set impuestoTotal
     *
     * @param string $impuestoTotal
     * @return Impuesto
     */
    public function setImpuestoTotal($impuestoTotal)
    {
        $this->impuestoTotal = $impuestoTotal;

        return $this;
    }

    /**
     * Get impuestoTotal
     *
     * @return string 
     */
    public function getImpuestoTotal()
    {
        return $this->impuestoTotal;
    }
}
