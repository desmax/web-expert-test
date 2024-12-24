<?php

declare(strict_types=1);

namespace App\Domain\Entity\News;

use App\Domain\Entity\Category\Category;
use App\Domain\Entity\User\User;
use App\Domain\Model\NewsId;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class News
{
    private DateTimeImmutable $createdAt;
    private ?DateTimeImmutable $updatedAt = null;

    /** @var Collection<int, Category> */
    private Collection $categories;

    private ?string $picture = null;

    public function __construct(
        private readonly NewsId $id,
        private User $author,
        private string $title,
        private string $shortDescription,
        private string $content,
    ) {
        $this->createdAt  = new DateTimeImmutable();
        $this->categories = new ArrayCollection();
    }

    public function getId(): NewsId
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /** @return Collection<int, Category> */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (! $this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function onPreUpdate(): void
    {
        $this->updatedAt = new DateTimeImmutable();
    }
}