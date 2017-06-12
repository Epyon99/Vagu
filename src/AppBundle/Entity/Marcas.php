<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marcas
 *
 * @ORM\Table(name="marcas")
 * @ORM\Entity
 */
class Marcas
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="Codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdMarca", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idmarca;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Marcas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Marcas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Marcas
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Get idmarca
     *
     * @return integer
     */
    public function getIdmarca()
    {
        return $this->idmarca;
    }
}
