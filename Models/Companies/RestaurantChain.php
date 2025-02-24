<?php
namespace Models\Companies;
use Models\Interfaces\FileConvertible;

class RestaurantChain extends Company implements FileConvertible {
  private int $chainId;
  private array $restaurantLocations;
  private string $cuisine;
  private int $numberOfLocations;
  private bool $hasDriveThru;
  private int $yearFounded;
  private string $parentCompany;

  public function __construct(
    string $name,
    int $foundingYear,
    string $description,
    string $website,
    string $phone,
    string $industry,
    string $ceo,
    bool $isPubliclyTraded,
    string $country,
    string $founder,
    int $totalEmployees,
    int $chainId, 
    array $restaurantLocations, 
    string $cuisine, 
    int $numberOfLocations, 
    bool $hasDriveThru, 
    int $yearFounded, 
    string $parentCompany
    ) {
    parent::__construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees);
    $this->chainId = $chainId;
    $this->restaurantLocations = $restaurantLocations;
    $this->cuisine = $cuisine;
    $this->numberOfLocations = $numberOfLocations;
    $this->hasDriveThru = $hasDriveThru;
    $this->yearFounded = $yearFounded;
    $this->parentCompany = $parentCompany;
  }

  public function getRestaurantLocations(): array {
    return $this->restaurantLocations;
  }

  public function getName(): string {
    return $this->name;
  }

  public function __toString(): string {
    return "{$this->name} ({$this->yearFounded}), Cuisine: {$this->cuisine}, CEO: {$this->ceo}, Locations: {$this->numberOfLocations}";
  }

  public function toHTML(): string {
    return "<h2>{$this->name}</h2>
            <p><strong>Cuisine:</strong> {$this->cuisine}</p>
            <p><strong>CEO:</strong> {$this->ceo}</p>
            <p><strong>Founded:</strong> {$this->yearFounded}</p>
            <p><strong>Country:</strong> {$this->country}</p>
            <p><strong>Number of Locations:</strong> {$this->numberOfLocations}</p>
            <p><strong>Website:</strong> <a href='{$this->website}'>{$this->website}</a></p>";
    }

  public function toMarkdown(): string {
    return "## {$this->name}\n\n" .
               "**Cuisine:** {$this->cuisine}\n\n" .
               "**CEO:** {$this->ceo}\n\n" .
               "**Founded:** {$this->yearFounded}\n\n" .
               "**Country:** {$this->country}\n\n" .
               "**Number of Locations:** {$this->numberOfLocations}\n\n" .
               "**Website:** [{$this->website}]({$this->website})\n";
    }

  public function toArray(): array {
    return array_merge(parent::toArray(), [
      "chainId" => $this->chainId,
      "restaurantLocations" => $this->restaurantLocations,
      "cuisine" => $this->cuisine,
      "numberOfLocations" => $this->numberOfLocations,
      "hasDriveThru" => $this->hasDriveThru,
      "yearFounded" => $this->yearFounded,
      "parentCompany" => $this->parentCompany,
  ]);
  }
}

