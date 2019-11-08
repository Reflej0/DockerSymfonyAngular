<?php
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Auditable
 * @package App\Entity
 */
abstract class Auditable extends Persistable
{
    /**
     * @ORM\Column(type="datetime_immutable")
     */
    protected $createDate;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    protected $updateDate;

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreateDate(): ?DateTimeImmutable
    {
        return $this->createDate;
    }

    /**
     * @param DateTimeImmutable $createDate
     * @return $this
     */
    public function setCreateDate(DateTimeImmutable $createDate): self
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdateDate(): ?DateTimeImmutable
    {
        return $this->updateDate;
    }

    /**
     * @param DateTimeImmutable $updateDate
     * @return $this
     */
    public function setUpdateDate(DateTimeImmutable $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }
}
