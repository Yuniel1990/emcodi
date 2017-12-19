<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilidad
 *
 * @ORM\Table(name="utilidad")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\UtilidadRepository")
 */
class Utilidad
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
    private $mes;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=10, scale=2)
     */
    private $valor;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="ventas", type="object")
     */
    private $ventas;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="gastos", type="object")
     */
    private $gastos;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="impuestos", type="object")
     */
    private $impuestos;


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
     * Set valor
     *
     * @param string $valor
     * @return Utilidad
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set ventas
     *
     * @param \stdClass $ventas
     * @return Utilidad
     */
    public function setVentas($ventas)
    {
        $this->ventas = $ventas;

        return $this;
    }

    /**
     * Get ventas
     *
     * @return \stdClass 
     */
    public function getVentas()
    {
        return $this->ventas;
    }

    /**
     * Set gastos
     *
     * @param \stdClass $gastos
     * @return Utilidad
     */
    public function setGastos($gastos)
    {
        $this->gastos = $gastos;

        return $this;
    }

    /**
     * Get gastos
     *
     * @return \stdClass 
     */
    public function getGastos()
    {
        return $this->gastos;
    }

    /**
     * Set impuestos
     *
     * @param \stdClass $impuestos
     * @return Utilidad
     */
    public function setImpuestos($impuestos)
    {
        $this->impuestos = $impuestos;

        return $this;
    }

    /**
     * Get impuestos
     *
     * @return \stdClass 
     */
    public function getImpuestos()
    {
        return $this->impuestos;
    }

    /**
     * Set mes
     *
     * @param \DateTime $mes
     * @return Utilidad
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return \DateTime 
     */
    public function getMes()
    {
        return $this->mes;
    }
}
