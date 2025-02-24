<?php
namespace Models\Interfaces;

interface FileConvertible {
  public function __toString(): string;

  public function toHTML(): string;

  public function toMarkdown(): string;

  public function toArray(): array;
}