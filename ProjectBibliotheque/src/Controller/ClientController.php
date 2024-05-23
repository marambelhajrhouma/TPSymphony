<?php
namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Form\CommandType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ClientController extends AbstractController
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    #[Route('/', name: 'client')]
    public function index(): Response
    {
    
        return $this->render('base.html.twig');

        
    }

    #[Route('/register-client', name: 'register_client', methods: ['GET', 'POST'])]
    public function registerClient(Request $request): Response
    {
        // Créer un nouvel objet Client
        $client = new Client();
        
        // Créer le formulaire
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer le client dans la base de données
            $this->entityManager->persist($client);
            $this->entityManager->flush();

            // Envoi de la notification à l'administrateur
            $this->sendAdminNotificationEmail($client);

            // Redirection ou autre logique après l'inscription du client
            return $this->redirectToRoute('security/login.html.twig');
        }

        

        // Rendu du formulaire
        return $this->render('client/register_client.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    private function sendAdminNotificationEmail(Client $client)
    {
        $adminEmail = 'belhajrhoumayoussef@gmail.com'; // Remplacez cela par l'adresse e-mail de l'administrateur

        $email = (new Email())
            ->from('marambhr48@gmail.com')
            ->to($adminEmail)
            ->subject('New Client Registration')
            ->html($this->renderView(
                'emails/admin_notification.html.twig',
                ['client' => $client]
            ));

        $this->mailer->send($email);
    }

    #[Route('/client-registered', name: 'client_registered')]
    public function clientRegistered(): Response
    {
        return $this->render('client/client_registered.html.twig');
    }

    #[Route('/submit-command', name: 'submit_command', methods: ['GET', 'POST'])]
    public function submitCommand(Request $request): Response
    {
        // Create a new instance of Client for the command form
        $client = new Client();

        // Create the command form
        $form = $this->createForm(CommandType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle the submitted command
            $this->handleCommand($client);

            // Redirect or render response after handling the command
            // For example, you can redirect back to the homepage
            return $this->redirectToRoute('home');
        }

        // Render the command submission form
        return $this->render('client/submit_command.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function handleCommand(Client $client)
    {
        // Logic to handle the submitted command
        // For example, you can process the command and perform any necessary actions
    }

}
