<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* @Route("/user", name="users")
*/
class UserController extends AbstractController implements UserInterface
{
	private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
	 * @Route("/all", name="users_all", methods={"GET"})
	 */
	public function all()
	{
		$query = $this->getDoctrine()->getRepository(User::class)->createQueryBuilder('u')->select("u.id, u.email, u.roles")->getQuery();
		$users = $query->getResult(Query::HYDRATE_ARRAY);
	    //$users = $this->getDoctrine()->getRepository(User::class)->findAll(\Doctrine\ORM\Query::HYDRATE_ARRAY);
	    return new JsonResponse($users);
	}

    /**
     * @Route("/delete", name="users_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request)
    {
        $id = $request->request->get("id");
        $query = $this->getDoctrine()->getRepository(User::class)->createQueryBuilder('u')->delete()
                ->where('u.id = :id')
                ->setParameter(':id', $id);
        $num = $query->getQuery()->execute();
        return new JsonResponse($num);
    }

	/**
	 * @Route("/register", name="user_register", methods={"POST"})
	 */
	public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator)
	{
		$email = $request->request->get("username");
		$password = $request->request->get("password");
        
	    $user = new User();
	    $user->setEmail($email);
	    $user->setPassword($passwordEncoder->encodePassword($user, $password));
        $user->setRoles(["ROLE_USER"]);
	    

        $errors = $validator->validate($user);
        if (count($errors) > 0)
            return new Response((string) $errors, 400);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

	    return new JsonResponse($user);
	}


    public function getRoles()
    {

    }

    public function getPassword()
    {
    	
    }

    public function getUsername()
    {
    	
    }

    public function getSalt()
    {
    	
    }

    public function eraseCredentials()
    {
    	
    }
}
