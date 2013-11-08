<?php

namespace Dragonbase\Book\Domain\Entity;

interface BookDescriptionInterface
{
    public function getAuthor();

    public function getDescription();

    public function getTitle();

}
