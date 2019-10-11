<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
     * @IsGranted("ROLE_ADMIN")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setName('TestCategory');

        $product = new Product();
        $product->setName('TestProduct');
        $product->setPrice(2000);
        $product->setDate(new \DateTime());
        $product->setCategory($category);

        $errors = $validator->validate($product);
        if (count($errors) > 0)
            return new Response((string) $errors, 400);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$product->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    /**
	 * @Route("/product/edit/{id}")
	 */
	public function update($id)
	{
	    $entityManager = $this->getDoctrine()->getManager();
	    $product = $entityManager->getRepository(Product::class)->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException(
	            'No product found for id '.$id
	        );
	    }

	    $product->setName('New product name!');
	    $entityManager->flush();

	    return $this->redirectToRoute('product_show', [
	        'id' => $product->getId()
	    ]);
	}

    /**
	 * @Route("/product/{id}", name="product_show")
	 */
	public function show($id)
	{
	    $product = $this->getDoctrine()
	        ->getRepository(Product::class)
	        ->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException(
	            'No product found for id '.$id
	        );
	    }

	    return new Response('Check out this great product: '.$product->getName());

	    // or render a template
	    // in the template, print things with {{ product.name }}
	    // return $this->render('product/show.html.twig', ['product' => $product]);
	}
}
