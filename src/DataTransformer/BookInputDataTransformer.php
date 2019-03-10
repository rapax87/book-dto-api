<?php
// src/DataTransformer/BookInputDataTransformer.php

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\BookInput;
use App\Entity\Book;

final class BookInputDataTransformer implements DataTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($data, string $to, array $context = [])
    {
        $book = new Book();
        $book->isbn = $data->isbn;
        $book->name = $data->name;
//        file_put_contents("aaa.txt", "fffffff");

        return $book;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return true;
        // in the case of an input, the value given here is an array (the JSON decoded).
        // if it's a book we transformed the data already
        if ($data instanceof Book) {
            return false;
        }

        return Book::class === $to && null !== ($context['input']['class'] ?? null);

//        return Book::class === $to && $data instanceof BookInput;
    }
}