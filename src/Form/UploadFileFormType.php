<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class UploadFileFormType extends AbstractType
{

    #[\Override]
    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder
            ->add('file', FileType::class, [
                'constraints' => [
                    new File([
                        'maxSize' => (4 * 1024 * 1024),
                    ]),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Upload',
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])
        ;
    }
}
