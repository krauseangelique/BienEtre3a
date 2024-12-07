<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;



#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["user" => "User", "internaute" => "Internaute", "prestataire" => "Prestataire"])]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\InheritanceType('JOINED')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseNum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseRue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $inscription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeUtilisateur = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbEssaisInfructueux = null;

    #[ORM\Column(nullable: true)]
    private ?bool $banni = null;

    #[ORM\Column(nullable: true)]
    private ?bool $inscriptConfirmee = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?CodePostal $adresseCP = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Province $adresseProvince = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Commune $commune = null;

    // En raison de l'HERITAGE Mére User Fille Internaute, je supprime la RELATION
    // #[ORM\OneToOne(mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    // private ?Internaute $internaute = null;
    // En raison de l'HERITAGE Mére User Fille Prestataire, je supprime la RELATION
    // #[ORM\OneToOne(mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    // private ?Prestataire $prestataire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAdresseNum(): ?string
    {
        return $this->adresseNum;
    }

    public function setAdresseNum(?string $adresseNum): static
    {
        $this->adresseNum = $adresseNum;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): static
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(?\DateTimeInterface $inscription): static
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): static
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getNbEssaisInfructueux(): ?int
    {
        return $this->nbEssaisInfructueux;
    }

    public function setNbEssaisInfructueux(?int $nbEssaisInfructueux): static
    {
        $this->nbEssaisInfructueux = $nbEssaisInfructueux;

        return $this;
    }

    public function isBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(?bool $banni): static
    {
        $this->banni = $banni;

        return $this;
    }

    public function isInscriptConfirmee(): ?bool
    {
        return $this->inscriptConfirmee;
    }

    public function setInscriptConfirmee(?bool $inscriptConfirmee): static
    {
        $this->inscriptConfirmee = $inscriptConfirmee;

        return $this;
    }

    public function getAdresseCP(): ?CodePostal
    {
        return $this->adresseCP;
    }

    public function setAdresseCP(?CodePostal $adresseCP): static
    {
        $this->adresseCP = $adresseCP;

        return $this;
    }

    public function getAdresseProvince(): ?Province
    {
        return $this->adresseProvince;
    }

    public function setAdresseProvince(?Province $adresseProvince): static
    {
        $this->adresseProvince = $adresseProvince;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): static
    {
        $this->commune = $commune;

        return $this;
    }
    // En supprimant la relation, j'ai du supprimé les assesseurs et les mutateurs (getter et setter correspondants)
    // public function getInternaute(): ?Internaute
    // {
    //     return $this->internaute;
    // }

    // public function setInternaute(?Internaute $internaute): static
    // {
    //     // unset the owning side of the relation if necessary
    //     if ($internaute === null && $this->internaute !== null) {
    //         $this->internaute->setUtilisateur(null);
    //     }

    //     // set the owning side of the relation if necessary
    //     if ($internaute !== null && $internaute->getUtilisateur() !== $this) {
    //         $internaute->setUtilisateur($this);
    //     }

    //     $this->internaute = $internaute;

    //     return $this;
    // }

    // public function getPrestataire(): ?Prestataire
    // {
    //     return $this->prestataire;
    // }

    // public function setPrestataire(?Prestataire $prestataire): static
    // {
    //     // unset the owning side of the relation if necessary
    //     if ($prestataire === null && $this->prestataire !== null) {
    //         $this->prestataire->setUtilisateur(null);
    //     }

    //     // set the owning side of the relation if necessary
    //     if ($prestataire !== null && $prestataire->getUtilisateur() !== $this) {
    //         $prestataire->setUtilisateur($this);
    //     }

    //     $this->prestataire = $prestataire;

    //     return $this;
    // }
}
