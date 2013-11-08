<?php

namespace Dragonbase\Book\Controller;

use Dragonbase\Book\Domain\Entity\BookDescription;
use Dragonbase\Book\Domain\Entity\Author;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $bookDescription = new BookDescription;
        $bookDescription->setId(1);
        $bookDescription->addAuthor(new Author('Павел Шумил'));
        $bookDescription->setTitle('Слово о Драконе');

        $viewModel = new ViewModel(array(
            'books' => array(
                $bookDescription
            )
        ));
        return $viewModel;
    }
}
