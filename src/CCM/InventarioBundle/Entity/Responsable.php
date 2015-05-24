<?php

namespace CCM\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responsable
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Responsable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;


    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="puesto", type="string", length=255)
     */
    private $puesto;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="Bien")
     * @ORM\JoinTable(name="responsables_bienes",
     *      joinColumns={@ORM\JoinColumn(name="responsable_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="bien_id", referencedColumnName="id", unique=true)}
     *      )
     **/

    private $bienes;

    public function __construct()
    {
        $this->bienes = new \Doctrine\Common\Collections\ArrayCollection();
    }



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
     * Set nombre
     *
     * @param string $nombre
     * @return Responsable
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Responsable
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }


    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Responsable
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     * @return Responsable
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Responsable
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }


    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();

    }

    /**
     * Add bienes
     *
     * @param \CCM\InventarioBundle\Entity\Bien $bienes
     * @return Responsable
     */
    public function addBiene(\CCM\InventarioBundle\Entity\Bien $bienes)
    {
        $this->bienes[] = $bienes;

        return $this;
    }

    /**
     * Remove bienes
     *
     * @param \CCM\InventarioBundle\Entity\Bien $bienes
     */
    public function removeBiene(\CCM\InventarioBundle\Entity\Bien $bienes)
    {
        $this->bienes->removeElement($bienes);
    }

    /**
     * Get bienes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBienes()
    {
        return $this->bienes;
    }
}
