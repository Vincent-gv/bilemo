<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 *
 * @Hateoas\Relation(
 *     "self",
 *     href=@Hateoas\Route(
 *          "product_show",
 *          parameters={"id"= "expr(object.getId())"}
 *     )
 * )
 * @Hateoas\Relation(
 *     "product",
 *     embedded = @Hateoas\Embedded         (
 *         {"id"="12","name"="Mobile 12","price"="850","description"="A new generation of mobile.","_links":{"self":{"href": "/product/12"}}}
 *     )
 * )
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     * @Groups({"product_list", "product_show"})
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Groups({"product_list", "product_show"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     *
     * @Groups({"product_list", "product_show"})
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     *
     * @Groups({"product_show"})
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
