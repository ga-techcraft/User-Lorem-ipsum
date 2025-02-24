<?php
namespace Models\Companies;
use Models\Interfaces\FileConvertible;

class Company implements FileConvertible {
    protected string $name;
    protected int $foundingYear;
    protected string $description;
    protected string $website;
    protected string $phone;
    protected string $industry;
    protected string $ceo;
    protected bool $isPubliclyTraded;
    protected string $country;
    protected string $founder;
    protected int $totalEmployees;

    public function __construct(string $name, int $foundingYear, string $description, string $website, string $phone, string $industry, string $ceo, bool $isPubliclyTraded, string $country, string $founder, int $totalEmployees) {
      $this->name = $name;
      $this->foundingYear = $foundingYear;
      $this->description = $description;
      $this->website = $website;
      $this->phone = $phone;
      $this->industry = $industry;
      $this->ceo = $ceo;
      $this->isPubliclyTraded = $isPubliclyTraded;
      $this->country = $country;
      $this->founder = $founder;
      $this->totalEmployees = $totalEmployees;
    }

    public function __toString(): string {
      return "{$this->name} ({$this->foundingYear}), CEO: {$this->ceo}, Industry: {$this->industry}, Country: {$this->country}";
    }

    public function toHTML(): string {
      return "<h2>{$this->name}</h2>
      <p><strong>Industry:</strong> {$this->industry}</p>
      <p><strong>CEO:</strong> {$this->ceo}</p>
      <p><strong>Founded:</strong> {$this->foundingYear}</p>
      <p><strong>Country:</strong> {$this->country}</p>
      <p><strong>Website:</strong> <a href='{$this->website}'>{$this->website}</a></p>";
    }
  
    public function toMarkdown(): string {
      return "## {$this->name}\n\n" .
      "**Industry:** {$this->industry}\n\n" .
      "**CEO:** {$this->ceo}\n\n" .
      "**Founded:** {$this->foundingYear}\n\n" .
      "**Country:** {$this->country}\n\n" .
      "**Website:** [{$this->website}]({$this->website})\n";
    }
  
    public function toArray(): array {
      return [
        "name" => $this->name,
        "foundingYear" => $this->foundingYear,
        "description" => $this->description,
        "website" => $this->website,
        "phone" => $this->phone,
        "industry" => $this->industry,
        "ceo" => $this->ceo,
        "isPubliclyTraded" => $this->isPubliclyTraded,
        "country" => $this->country,
        "founder" => $this->founder,
        "totalEmployees" => $this->totalEmployees,
    ];
    }
}

