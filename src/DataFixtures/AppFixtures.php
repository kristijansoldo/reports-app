<?php

namespace App\DataFixtures;

use App\Entity\Organisation;
use App\Entity\User;
use App\Enum\UserTypeEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class        AppFixtures
 *
 * @since       1.0.0
 * @package     App\DataFixtures
 * @author      Kristijan Soldo <soldokristijan@yahoo.com>
 */
class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Creates owner.
     *
     * @param ObjectManager $manager
     *
     * @return User
     */
    private function createOwner(ObjectManager $manager)
    {
        // Initializes user
        $user = new User();

        // Fills with data
        $user->setUsername('owner');
        $user->setFirstName('Owner');
        $user->setLastName('User');
        $user->setEmail('owner@soldo.dev');
        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                'owner'
            )
        );

        // Saves
        $manager->persist($user);
        $manager->flush();

        // Returns object
        return $user;
    }

    /**
     * Creates user.
     *
     * @param ObjectManager $manager
     *
     * @return User
     */
    private function createUser(ObjectManager $manager)
    {
        // Initializes user
        $user = new User();

        // Fills with data
        $user->setUsername('demo');
        $user->setFirstName('Demo');
        $user->setLastName('User');
        $user->setEmail('demo@soldo.dev');
        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                'demo'
            )
        );

        // Saves
        $manager->persist($user);
        $manager->flush();

        // Returns object
        return $user;
    }

    /**
     * Creates organisation.
     *
     * @param ObjectManager $manager
     * @param User $user
     * @param User $owner
     *
     * @return Organisation
     */
    private function createOrganisation(ObjectManager $manager, User $user, User $owner)
    {
        // Initialize organisation
        $organisation = new Organisation();

        // FIlls with data
        $organisation->setName('Test organisation');
        $organisation->addUser($user);
        $organisation->setOwner($owner);

        // Saves
        $manager->persist($organisation);
        $manager->flush();

        // Returns created organisation
        return $organisation;
    }

    /**
     * Loads fixtures.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Creates user
        $user = $this->createUser($manager);

        // Creates owner
        $owner = $this->createOwner($manager);

        // Creates organisation
        $this->createOrganisation($manager, $user, $owner);
    }
}
