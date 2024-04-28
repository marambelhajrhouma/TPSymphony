<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; // Importez TextType pour définir les champs texte
use Symfony\Component\Validator\Constraints\NotBlank; // Importez NotBlank pour la validation du champ non vide

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'article',
                'required' => true, // Définir le champ comme requis
                'constraints' => [
                    new NotBlank([ // Ajouter une contrainte de validation pour s'assurer que le champ n'est pas vide
                        'message' => 'Veuillez entrer le nom de l\'article',
                    ]),
                ],
            ])
            ->add('prix', TextType::class, [
                'label' => 'Prix de l\'article',
                'required' => true,
                'constraints' => [
                    new NotBlank([ // Ajouter une contrainte de validation pour s'assurer que le champ n'est pas vide
                        'message' => 'Veuillez entrer le nom de l\'article',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
