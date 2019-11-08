<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntityTemplateRepository")
 */
class EntityTemplate extends Auditable
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $field;

    /**
     * @return string|null
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param string|null $field
     * @return $this
     */
    public function setField(?string $field): self
    {
        $this->field = $field;

        return $this;
    }
}
