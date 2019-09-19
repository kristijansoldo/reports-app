<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserOrganisationSettingsRepository")
 */
class UserOrganisationSettings
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $organisationId;

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contractNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $userType;

    /**
     * @return int
     */
    public function getOrganisationId(): int
    {
        return $this->organisationId;
    }

    /**
     * @param int $organisationId
     *
     * @return UserOrganisationSettings
     */
    public function setOrganisationId($organisationId): self
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return UserOrganisationSettings
     */
    public function setUserId($userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getContractNumber(): ?string
    {
        return $this->contractNumber;
    }

    /**
     * @param null|string $contractNumber
     *
     * @return UserOrganisationSettings
     */
    public function setContractNumber(?string $contractNumber): self
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function getUserType(): ?int
    {
        return $this->userType;
    }

    public function setUserType(int $userType): self
    {
        $this->userType = $userType;

        return $this;
    }

}
