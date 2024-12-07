<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: PrestataireRepository::class)]
#[Broadcast]

// Notion d'héritage
class Prestataire extends User
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column]
    // private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siteInternet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numTel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numTVA = null;

    #[ORM\ManyToMany(targetEntity: CategorieServices::class, inversedBy: 'prestataires')]
    private Collection $categorieServices;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Promotion::class)]
    private Collection $promotion;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Image::class)]
    private Collection $logo;

    #[ORM\OneToMany(mappedBy: 'prestatairePhoto', targetEntity: Image::class)]
    private Collection $photo;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Stage::class)]
    private Collection $stage;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Commentaire::class)]
    private Collection $commentaire;

    // #[ORM\ManyToMany(targetEntity: Internaute::class, inversedBy: 'prestataires')]
    // private Collection $internaute;

    #[ORM\OneToOne(inversedBy: 'prestataire', cascade: ['persist', 'remove'])]
    private ?User $utilisateur = null;

    #[ORM\ManyToMany(targetEntity: Internaute::class, inversedBy: 'internautesFavoris')]
    private Collection $internautesFavoris;

    public function __construct()
    {
        $this->categorieServices = new ArrayCollection();
        $this->promotion = new ArrayCollection();
        $this->logo = new ArrayCollection();
        $this->photo = new ArrayCollection();
        $this->stage = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        // $this->internaute = new ArrayCollection();
        $this->internautesFavoris = new ArrayCollection();
    }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSiteInternet(): ?string
    {
        return $this->siteInternet;
    }

    public function setSiteInternet(?string $siteInternet): static
    {
        $this->siteInternet = $siteInternet;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(?string $numTel): static
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getNumTVA(): ?string
    {
        return $this->numTVA;
    }

    public function setNumTVA(?string $numTVA): static
    {
        $this->numTVA = $numTVA;

        return $this;
    }

    /**
     * @return Collection<int, CategorieServices>
     */
    public function getCategorieServices(): Collection
    {
        return $this->categorieServices;
    }

    public function addCategorieService(CategorieServices $categorieService): static
    {
        if (!$this->categorieServices->contains($categorieService)) {
            $this->categorieServices->add($categorieService);
        }

        return $this;
    }

    public function removeCategorieService(CategorieServices $categorieService): static
    {
        $this->categorieServices->removeElement($categorieService);

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): static
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion->add($promotion);
            $promotion->setPrestataire($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): static
    {
        if ($this->promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getPrestataire() === $this) {
                $promotion->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getLogo(): Collection
    {
        return $this->logo;
    }

    public function addLogo(Image $logo): static
    {
        if (!$this->logo->contains($logo)) {
            $this->logo->add($logo);
            $logo->setPrestataire($this);
        }

        return $this;
    }

    public function removeLogo(Image $logo): static
    {
        if ($this->logo->removeElement($logo)) {
            // set the owning side to null (unless already changed)
            if ($logo->getPrestataire() === $this) {
                $logo->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(Image $photo): static
    {
        if (!$this->photo->contains($photo)) {
            $this->photo->add($photo);
            $photo->setPrestatairePhoto($this);
        }

        return $this;
    }

    public function removePhoto(Image $photo): static
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getPrestatairePhoto() === $this) {
                $photo->setPrestatairePhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(Stage $stage): static
    {
        if (!$this->stage->contains($stage)) {
            $this->stage->add($stage);
            $stage->setPrestataire($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): static
    {
        if ($this->stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getPrestataire() === $this) {
                $stage->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire->add($commentaire);
            $commentaire->setPrestataire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPrestataire() === $this) {
                $commentaire->setPrestataire(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection<int, Internaute>
    //  */
    // public function getInternaute(): Collection
    // {
    //     return $this->internaute;
    // }

    // public function addInternaute(Internaute $internaute): static
    // {
    //     if (!$this->internaute->contains($internaute)) {
    //         $this->internaute->add($internaute);
    //     }

    //     return $this;
    // }

    // public function removeInternaute(Internaute $internaute): static
    // {
    //     $this->internaute->removeElement($internaute);

    //     return $this;
    // }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, Internaute>
     */
    public function getInternautesFavoris(): Collection
    {
        return $this->internautesFavoris;
    }

    public function addInternautesFavori(Internaute $internautesFavori): static
    {
        if (!$this->internautesFavoris->contains($internautesFavori)) {
            $this->internautesFavoris->add($internautesFavori);
        }

        return $this;
    }

    public function removeInternautesFavori(Internaute $internautesFavori): static
    {
        $this->internautesFavoris->removeElement($internautesFavori);

        return $this;
    }
}
