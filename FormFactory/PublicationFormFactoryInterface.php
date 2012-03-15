<?php

/**
 * This file is part of the FightmasterPublicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Fightmaster\PublicationBundle\FormFactory;

use Symfony\Component\Form\FormInterface;

/**
 * Publication form creator
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface PublicationFormFactoryInterface
{
    /**
     * Creates a publication form
     *
     * @return FormInterface
     */
    public function createForm();
}
