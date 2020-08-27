<?php

namespace AppBundle\Form;

use AppBundle\Entity\Departement;
use AppBundle\Entity\Region;
use AppBundle\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('region', EntityType::class, array(
                'class' => 'AppBundle\Entity\Region',
                'required' => false,
                'mapped'=> false,
                'placeholder' => 'Selectionner votre region'
            ));
        $builder->get('region')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event){
                $form = $event->getForm();
                $this->addDepartementField($form->getParent(), $form->getData());
            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event){
                $data = $event->getData();
                /* @var $ville Ville */
                $ville =  $data->getVille();
                $form = $event->getForm();
                if ($ville){
                    $departement = $ville->getDepartement();
                    $region = $departement->getRegion();
                    $this->addDepartementField($form,$region);
                    $this->addVilleField($form, $departement);
                    $form->get('region')->setData($region);
                    $form->get('departement')->setData($departement);
                }else{
                    $this->addDepartementField($form,null);
                    $this->addVilleField($form, null);
                }
            }
        );
    }

    public function addDepartementField(FormInterface $form, Region $region = null){
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'departement',
            EntityType::class,
            null,
            array(
                'class' => 'AppBundle\Entity\Departement',
                'mapped' => false,
                'placeholder' => $region ? 'Selectionner votre departement' : 'Selectionnez votre region',
                'required' => false,
                'auto_initialize'=>false,
                'choices' => $region ? $region->getDepartement() : array()
            ));
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event){
                $form = $event->getForm();
//                dump($form->getData()-);
                $this->addVilleField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    private function addVilleField(FormInterface $form, Departement $departement = null ){
//        dump($departement);
        $form->add('ville', EntityType::class, array(
            'class' => 'AppBundle\Entity\Ville',
            'placeholder' => $departement ? 'Selectionnez votre ville' : 'Selectionnez votre departement',
            'choices' => $departement ? $departement->getVilles() : array()
        ));
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Medecin',
            'space' => null,
        ));
    }
}
