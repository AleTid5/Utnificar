<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'  => 'Nombre',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingrese un valor válido.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El nombre debe tener al menos {{ limit }} caracteres',
                        'max' => 50,
                    ]),
                ],
                'attr'   => [
                    'class'   => 'form-control'
                ]
            ])
            ->add('lastName', TextType::class, [
                'label'  => 'Apellido',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingrese un valor válido.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El apellido debe tener al menos {{ limit }} caracteres',
                        'max' => 50,
                    ]),
                ],
                'attr'   => [
                    'class'   => 'form-control'
                ]
            ])
            ->add('bornDate', BirthdayType::class, [
                'label'  => 'Fecha de nacimiento',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingrese una fecha válida.',
                    ])
                ],
                'attr'   => [
                    'class'   => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'  => 'E-Mail',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingrese un E-Mail.',
                    ]),
                ],
                'attr'   => [
                    'class'   => 'form-control'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label'  => 'Contraseña',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor, ingrese una contraseña.',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'La contraseña debe tener al menos {{ limit }} caracteres',
                        'max' => 4096,
                    ]),
                ],
                'attr'   => [
                    'class'   => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
