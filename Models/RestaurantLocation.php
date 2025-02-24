<?php
namespace Models;

use Models\Interfaces\FileConvertible;

class RestaurantLocation implements FileConvertible {
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;

    public function __construct(
        string $name,
        string $address,
        string $city,
        string $state,
        string $zipCode,
        array $employees = [],
        bool $isOpen = true
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
    }

    public function getEmployees(): array {
        return $this->employees;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getState(): string {
        return $this->state;
    }

    public function getZipCode(): string {
        return $this->zipCode;
    }

    public function __toString(): string {
        return "{$this->name} - {$this->address}, {$this->city}, {$this->state} {$this->zipCode}, " . 
               ($this->isOpen ? "Open" : "Closed");
    }

    public function toHTML(): string {
        return "<div class='restaurant-location'>
                    <h2>{$this->name}</h2>
                    <p><strong>Address:</strong> {$this->address}, {$this->city}, {$this->state} {$this->zipCode}</p>
                    <p><strong>Status:</strong> " . ($this->isOpen ? "Open" : "Closed") . "</p>
                    <p><strong>Employees:</strong> " . count($this->employees) . "</p>
                </div>";
    }

    public function toMarkdown(): string {
        return "## {$this->name}\n\n" .
               "- **Address:** {$this->address}, {$this->city}, {$this->state} {$this->zipCode}\n" .
               "- **Status:** " . ($this->isOpen ? "Open" : "Closed") . "\n" .
               "- **Employees:** " . count($this->employees) . "\n";
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'employees' => $this->employees,
            'isOpen' => $this->isOpen,
        ];
    }
}
