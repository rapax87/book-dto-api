<?php
// api/src/Entity/Book.php
namespace App\Entity;
//use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


use ApiPlatform\Core\Annotation\ApiResource;
use App\Dto\BookInput;
use App\Dto\BookOutput;


/**
 * A book.
 * @ApiResource(
 *   input=BookInput::class,
 *   output=BookOutput::class
 * )
 * @ORM\Entity
 */
final class Book
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;
    /**
     * @var string|null The ISBN of this book (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     */
    public $isbn;
    /**
     * @var string The title of this book.
     *
     * @ORM\Column
     */
    public $name;
}