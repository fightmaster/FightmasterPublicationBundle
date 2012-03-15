<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\TemplateReference;
use Symfony\Component\Form\FormInterface;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\RouteRedirectView;
use Fightmaster\PublicationBundle\Model\PublicationInterface;


/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class PublicationController extends PublicationAbstractController
{
    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return mixed|string
     */
    protected function newPublicationView(FormInterface $form)
    {
        return $this->renderView(
            new TemplateReference('FightmasterPublicationBundle', 'Publication', 'new'),
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * {@inheritDoc}
     *
     * @param PublicationInterface $publication
     * @return mixed|string
     */
    protected function getPublicationView(PublicationInterface $publication)
    {
        return $this->renderView(
            new TemplateReference('FightmasterPublicationBundle', 'Publication', 'view'),
            array(
                'publication' => $publication,
            )
        );
    }

    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return mixed
     */
    protected function onCreatePublicationSuccess(FormInterface $form)
    {
        return $this->forward('FightmasterPublicationBundle:Publication:getPublication', array(
            'id' => $form->getData()->getThread()->getId()
        ));
    }

    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return mixed|string
     */
    protected function onCreatePublicationError(FormInterface $form)
    {
        return $this->renderView(
            new TemplateReference('FightmasterPublicationBundle', 'Publication', 'new'),
            array(
                'form' => $form->createView(),
            )
        );
    }
}
