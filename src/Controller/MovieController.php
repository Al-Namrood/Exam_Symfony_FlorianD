<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findAll();


        return $this->render('base.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/movie/getAll", name="get_movies")
     */
    public function getMovies(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findAll();


        return $this->render('movie/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/movie/get/{id}", name="get_movie")
     */
    public function getMovie(Movie $movie): Response
    {

        return $this->render('movie/details.html.twig', [
            'movie' => $movie,
        ]);
    }


    /**
     * @Route("/movie/create", name="create_movie")
     */
    public function create(Movie $movie = null, Request $request, EntityManagerInterface $manager)
    {

        $movie = new Movie();
        $response = new Response();
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($movie);
            $manager->flush();

            $response->setStatusCode(Response::HTTP_CREATED);

            return $this->redirectToRoute('get_movie', ['id' => $movie->getId()]);
        }


        return $this->render('movie/create.html.twig', [
            'formMovie' => $form->createView()
        ]);
    }


}
