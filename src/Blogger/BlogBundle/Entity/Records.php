<?php
namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="records")
 */
class Records
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="float")
     */
    protected $summ;
    /**
     * @ORM\Column(type="float")
     */
    protected $percents;

    /**
     * @ORM\Column(type="integer")
     */
    protected $period;

    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $firstPay;

    /**
     * @ORM\Column(type="integer")
     */
    protected $created;

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
     * Set summ
     *
     * @param float $summ
     *
     * @return Records
     */
    public function setSumm($summ)
    {
        $this->summ = $summ;

        return $this;
    }

    /**
     * Get summ
     *
     * @return float
     */
    public function getSumm()
    {
        return $this->summ;
    }

    /**
     * Set period
     *
     * @param integer $period
     *
     * @return Records
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set firstPay
     *
     * @param string $firstPay
     *
     * @return Records
     */
    public function setFirstPay($firstPay)
    {
        $this->firstPay = $firstPay;

        return $this;
    }

    /**
     * Get firstPay
     *
     * @return string
     */
    public function getFirstPay()
    {
        return $this->firstPay;
    }

    /**
     * Set created
     *
     * @param integer $created
     *
     * @return Records
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return integer
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set percents
     *
     * @param float $percents
     *
     * @return Records
     */
    public function setPercents($percents)
    {
        $this->percents = $percents;

        return $this;
    }

    /**
     * Get percents
     *
     * @return float
     */
    public function getPercents()
    {
        return $this->percents;
    }
}
