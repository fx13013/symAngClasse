<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @ApiResource
 */
class Student
{
    const GENRES = ['Masculin', 'Féminin'];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $securiteSociale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroCaf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $assuranceScolaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreFreres;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombreSoeurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionPere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneDomicile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephonePere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneMere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomMedecinTraitant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneMedecin;

    /**
     * @ORM\ManyToMany(targetEntity=Matiere::class, mappedBy="students")
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=Controle::class, mappedBy="student")
     */
    private $controles;

    /**
     * @ORM\ManyToOne(targetEntity=Classroom::class, inversedBy="students", cascade={"persist"})
     */
    private $classroom;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
        $this->controles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSecuriteSociale(): ?string
    {
        return $this->securiteSociale;
    }

    public function setSecuriteSociale(?string $securiteSociale): self
    {
        $this->securiteSociale = $securiteSociale;

        return $this;
    }

    public function getNumeroCaf(): ?string
    {
        return $this->numeroCaf;
    }

    public function setNumeroCaf(?string $numeroCaf): self
    {
        $this->numeroCaf = $numeroCaf;

        return $this;
    }

    public function getAssuranceScolaire(): ?string
    {
        return $this->assuranceScolaire;
    }

    public function setAssuranceScolaire(?string $assuranceScolaire): self
    {
        $this->assuranceScolaire = $assuranceScolaire;

        return $this;
    }

    public function getNombreFreres(): ?int
    {
        return $this->nombreFreres;
    }

    public function setNombreFreres(?int $nombreFreres): self
    {
        $this->nombreFreres = $nombreFreres;

        return $this;
    }

    public function getNombreSoeurs(): ?int
    {
        return $this->nombreSoeurs;
    }

    public function setNombreSoeurs(?int $nombreSoeurs): self
    {
        $this->nombreSoeurs = $nombreSoeurs;

        return $this;
    }

    public function getProfessionPere(): ?string
    {
        return $this->professionPere;
    }

    public function setProfessionPere(?string $professionPere): self
    {
        $this->professionPere = $professionPere;

        return $this;
    }

    public function getProfessionMere(): ?string
    {
        return $this->professionMere;
    }

    public function setProfessionMere(?string $professionMere): self
    {
        $this->professionMere = $professionMere;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephoneDomicile;
    }

    public function setTelephoneDomicile(?string $telephoneDomicile): self
    {
        $this->telephoneDomicile = $telephoneDomicile;

        return $this;
    }

    public function getTelephonePere(): ?string
    {
        return $this->telephonePere;
    }

    public function setTelephonePere(?string $telephonePere): self
    {
        $this->telephonePere = $telephonePere;

        return $this;
    }

    public function getTelephoneMere(): ?string
    {
        return $this->telephoneMere;
    }

    public function setTelephoneMere(?string $telephoneMere): self
    {
        $this->telephoneMere = $telephoneMere;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }

    public function getNomMedecinTraitant(): ?string
    {
        return $this->nomMedecinTraitant;
    }

    public function setNomMedecinTraitant(?string $nomMedecinTraitant): self
    {
        $this->nomMedecinTraitant = $nomMedecinTraitant;

        return $this;
    }

    public function getTelephoneMedecin(): ?string
    {
        return $this->telephoneMedecin;
    }

    public function setTelephoneMedecin(?string $telephoneMedecin): self
    {
        $this->telephoneMedecin = $telephoneMedecin;

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->addStudent($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->contains($matiere)) {
            $this->matieres->removeElement($matiere);
            $matiere->removeStudent($this);
        }

        return $this;
    }

    /**
     * @return Collection|Controle[]
     */
    public function getControles(): Collection
    {
        return $this->controles;
    }

    public function addControle(Controle $controle): self
    {
        if (!$this->controles->contains($controle)) {
            $this->controles[] = $controle;
            $controle->setStudent($this);
        }

        return $this;
    }

    public function removeControle(Controle $controle): self
    {
        if ($this->controles->contains($controle)) {
            $this->controles->removeElement($controle);
            // set the owning side to null (unless already changed)
            if ($controle->getStudent() === $this) {
                $controle->setStudent(null);
            }
        }

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }
}
