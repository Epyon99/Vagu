<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="usuarios")
 * @ORM\Entity
 */
class Usuarios
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
     * @ORM\Column(name="Clave", type="string", length=255, nullable=false)
     */
    private $clave;

    /**
     * @var string
     *
     * @ORM\Column(name="Secreto", type="string", length=255, nullable=false)
     */
    private $secreto;

    /**
     * @var string
     *
     * @ORM\Column(name="Extra", type="string", length=255, nullable=false)
     */
    private $extra;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdUsuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idusuario;



    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Usuarios
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
     * Set clave
     *
     * @param string $clave
     *
     * @return Usuarios
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set secreto
     *
     * @param string $secreto
     *
     * @return Usuarios
     */
    public function setSecreto($secreto)
    {
        $this->secreto = $secreto;

        return $this;
    }

    /**
     * Get secreto
     *
     * @return string
     */
    public function getSecreto()
    {
        return $this->secreto;
    }

    /**
     * Set extra
     *
     * @param string $extra
     *
     * @return Usuarios
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Get idusuario
     *
     * @return integer
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
