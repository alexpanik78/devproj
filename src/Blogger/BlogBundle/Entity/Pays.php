<?php
namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pays")
 */
class Pays
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $date;

    /**
     * @ORM\Column(type="integer")
     */
    protected $m;

    /**
     * @ORM\Column(type="float")
     */
    protected $pay;

    /**
     * @ORM\Column(type="float")
     */
    protected $perc;

    /**
     * @ORM\Column(type="float")
     */
    protected $osn;


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
     * Set date
     *
     * @param string $date
     *
     * @return Pays
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set m
     *
     * @param integer $m
     *
     * @return Pays
     */
    public function setM($m)
    {
        $this->m = $m;

        return $this;
    }

    /**
     * Get m
     *
     * @return integer
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * Set pay
     *
     * @param float $pay
     *
     * @return Pays
     */
    public function setPay($pay)
    {
        $this->pay = $pay;

        return $this;
    }

    /**
     * Get pay
     *
     * @return float
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * Set perc
     *
     * @param float $perc
     *
     * @return Pays
     */
    public function setPerc($perc)
    {
        $this->perc = $perc;

        return $this;
    }

    /**
     * Get perc
     *
     * @return float
     */
    public function getPerc()
    {
        return $this->perc;
    }

    /**
     * Set osn
     *
     * @param float $osn
     *
     * @return Pays
     */
    public function setOsn($osn)
    {
        $this->osn = $osn;

        return $this;
    }

    /**
     * Get osn
     *
     * @return float
     */
    public function getOsn()
    {
        return $this->osn;
    }
}
