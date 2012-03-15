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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormInterface;
use Fightmaster\PublicationBundle\Service\PublicationService;
use Fightmaster\PublicationBundle\Model\PublicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
abstract class PublicationAbstractController extends Controller
{
    /**
     * Presents the form to use to create a new Publication.
     *
     * @return mixed
     */
    public function newPublicationAction()
    {
        $form = $this->getPublicationForm();

        return $this->newPublicationView($form);
    }

    /**
     * Gets the publication for a given id.
     *
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function getPublicationAction($id)
    {
        $service = $this->getPublicationService();
        $publication = $service->findPublicationById($id);

        if ($publication === null) {
            throw new NotFoundHttpException(sprintf("Publication with id '%s' could not be found.", $id));
        }

        return $this->getPublicationView($publication);
    }

    /**
     * Creates a new Publication from the submitted data.
     *
     * @param Request $request The current request
     *
     * @return mixed
     */
    public function postPublicationAction()
    {
        $publicationService = $this->getPublicationService();
        $comment = $publicationService->create();

        $form = $this->getPublicationForm();
        $form->setData($comment);
        $form->bindRequest($this->container->get('request'));

        if ($form->isValid()) {
            $publicationService->save($comment);

            return $this->onCreatePublicationSuccess($form);
        }

        return $this->onCreatePublicationError($form);
    }

    /**
     * @return PublicationService
     */
    protected function getPublicationService()
    {
        return $this->container->get('fightmaster_publication.service.publication');
    }

    /**
     * @return FormInterface
     */
    protected function getPublicationForm()
    {
        return $this->container->get('fightmaster_publication.form_factory.publication')->createForm();
    }

    /**
     * @abstract
     * @param FormInterface $form
     * @return mixed
     */
    abstract protected function newPublicationView(FormInterface $form);

    /**
     * Publication view implementation
     *
     * @abstract
     * @param PublicationInterface $publication
     * @return mixed
     */
    abstract protected function getPublicationView(PublicationInterface $publication);

    /**
     * Forwards the action to the publication view on a successful form submission.
     *
     * @abstract
     * @param FormInterface $form
     * @return mixed
     */
    abstract protected function onCreatePublicationSuccess(FormInterface $form);

    /**
     * Returns a HTTP_BAD_REQUEST response when the form submission fails.
     *
     * @abstract
     * @param FormInterface $form
     * @return mixed
     */
    abstract protected function onCreatePublicationError(FormInterface $form);
}
