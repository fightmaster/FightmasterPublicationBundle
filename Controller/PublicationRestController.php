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
class PublicationRestController extends PublicationAbstractController
{
    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return View
     */
    protected function newPublicationView(FormInterface $form)
    {
        $view = View::create()
            ->setData(array('form' => $form->createView()))
            ->setTemplate(new TemplateReference('FightmasterPublicationBundle', 'Publication', 'new'));

        return $view;
    }

    /**
     * {@inheritDoc}
     *
     * @param PublicationInterface $publication
     * @return View
     */
    protected function getPublicationView(PublicationInterface $publication)
    {
        $view = View::create()
            ->setData(array('publication' => $publication));

        return $view;
    }

    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return mixed
     */
    protected function onCreatePublicationSuccess(FormInterface $form)
    {
        return RouteRedirectView::create('fightmaster_publication_get_publication', array($form->getData()->getId()));
    }

    /**
     * {@inheritDoc}
     *
     * @param FormInterface $form
     * @return View
     */
    protected function onCreatePublicationError(FormInterface $form)
    {
        $view = View::create()
            ->setStatusCode(Codes::HTTP_BAD_REQUEST)
            ->setData(array(
            'form' => $form,
        ))
            ->setTemplate(new TemplateReference('FightmasterPublicationBundle', 'Publication', 'new'));

        return $view;
    }
}
