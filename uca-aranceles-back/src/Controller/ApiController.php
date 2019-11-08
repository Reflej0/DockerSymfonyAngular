<?php
declare(strict_types=1);


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TestController
 * @package App\Controller
 * @Route("/api/", name="test_")
 */
abstract class ApiController extends AbstractController
{
    /**
     * @Route("{id}", methods={"GET","HEAD"}, name="show", requirements={"id"="\d+"})
     * @param   Request $request
     * @param   int $id
     * @return  Response
     */
    abstract public function showAction(Request $request, int $id);

    /**
     * @Route("new", methods={"PUT"}, name="new")
     * @param   Request $request
     * @return  Response
     */
    abstract public function newAction(Request $request);

    /**
     * @Route("edit/{id}", methods={"PUT"}, name="edit", requirements={"id"="\d+"})
     * @param   Request $request
     * @param   int     $id
     * @return  Response
     */
    abstract public function editAction(Request $request, int $id);
}
