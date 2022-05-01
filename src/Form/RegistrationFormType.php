<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username' ,TextType::class , [
                 'label'=>false,
            ])
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label'=>false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe dois contenir {{ limit }} caractères au minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                        'maxMessage' => 'Votre mot de passe dois contenir {{ limit }} caractères au maximum'
                    ]),
                ],
            ])
            ->add('avatar', FileType::class, [
                'required' => false,
                'data_class' => null,
                "constraints" => [
                        new Image([
                            "maxSize" => '1024k'
                        ]),
                        new NotBlank([
                            'message' => 'Entrer une category'
                        ]),
                        new Length([
                            'min' => 2,
                            'minMessage' => 'Le titre de la category doit contenir au moins {{ limit }} caractéres.',
                            'max' => 75,
                            'maxMessage' => 'Le titre de la category doit contenir au maximum {{ limit }} caractéres.'
                        ])
                ]])
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
     