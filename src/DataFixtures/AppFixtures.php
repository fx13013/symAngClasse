<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use App\Entity\Controle;
use App\Entity\Matiere;
use App\Entity\Student;
use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Validator\Constraints\Callback;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $photoMen = "https://randomuser.me/api/portraits/men/";
        $photoWomen = "https://randomuser.me/api/portraits/women/";

        $matieres = [];

        // Classes
        $classes = [];
        for($c = 0; $c < count(Classroom::LEVELS); $c++){
            $class = new Classroom;
            $class->setName(Classroom::LEVELS[$c]);
            $classes[] = $class;

            $manager->persist($class);
        }

        // Teachers
        for($t = 0; $t < 5; $t++){
            $teacher = new Teacher;
            $teacher->setLastName($faker->lastName)
                ->setFirstName($faker->firstName)
                ->setEmail("prof$t@gmail.com")
                ->setToken(uniqid())
                ->setClasse($classes[$t]);
            
            $manager->persist($teacher);
        }

        // Matières
        for($m = 0; $m < 4; $m++){
            $matiere = new Matiere;
            $matiere->setName($faker->word());

            $matieres[] = $matiere;

            $manager->persist($matiere);
        }
        
        // Eleves
        for($s = 0; $s < 24; $s++){
            $student = new Student;
            if($faker->boolean(50)){
                $student->setGenre(Student::GENRES[0]);
                $student->setNom($faker->lastName)
                    ->setPrenom($faker->firstNameMale)
                    ->setPhoto($photoMen . random_int(0, 99) . '.jpg');
            } else {
                $student->setGenre(Student::GENRES[1]);
                $student->setNom($faker->lastName)
                    ->setPrenom($faker->firstNameFemale)
                    ->setPhoto($photoWomen . random_int(0, 99) . '.jpg');
            }
            $student->setClassroom($classes[2])
                ->setDateNaissance($faker->dateTimeBetween('- 10 years', '- 9 years'))
                ->setAdresse($faker->streetAddress)
                ->setCodePostal($faker->postcode)
                ->setVille($faker->city)
                ->setEmail("user$s@gmail.com")
                ->setToken(uniqid())
                ->setSecuriteSociale($faker->ean13);
            if($faker->boolean(30)){
                $student->setNombreFreres(random_int(1, 3));
            }
            if($faker->boolean(30)){
                $student->setNombreSoeurs(random_int(1, 3));
            }
            if($faker->boolean(75)){
                $student->setProfessionPere($faker->word());
            }
            if($faker->boolean(30)){
                $student->setProfessionMere($faker->word());
            }
            if($faker->boolean(50)){
                $student->setTelephoneDomicile($faker->phoneNumber)
                    ->setTelephonePere($faker->phoneNumber)
                    ->setTelephoneMere($faker->phoneNumber);
            }
            if($faker->boolean(30)){
                $student->setObservations($faker->words(3, true));
            }
            if($faker->boolean(80)){
                $student->setNomMedecinTraitant($faker->name())
                    ->setTelephoneMedecin($faker->phoneNumber);
            }

            
            foreach($matieres as $matiere){
                for($c = 0; $c < 4; $c++){
                    $controle = new Controle;
                    $controle->setStudent($student)
                        ->setNote(mt_rand(0, 20))
                        ->setCreatedAt($faker->dateTimeBetween("- 9 months"))
                        ->setMatiere($matiere);
                    $manager->persist($controle);
                }
                $student->addMatiere($matiere);
            }
            
            $manager->persist($student);
        }

        $manager->flush();
    }
}
