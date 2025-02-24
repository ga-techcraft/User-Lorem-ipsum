<?php

namespace Models\Users;

use Models\Interfaces\FileConvertible;
use DateTime;

class Employee extends User implements FileConvertible {
    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $phoneNumber,
        string $address,
        DateTime $birthDate,
        DateTime $membershipExpirationDate,
        string $role,
        string $jobTitle,
        float $salary,
        DateTime $startDate,
        array $awards = []
    ) {
        // `User` のコンストラクタを呼び出す
        parent::__construct($id, $firstName, $lastName, $email, $password, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);

        // `Employee` の追加プロパティをセット
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function getJobTitle(): string {
        return $this->jobTitle;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    public function __toString(): string {
        return parent::__toString() . "\nJob Title: {$this->jobTitle}\nSalary: {$this->salary}\nStart Date: " . $this->startDate->format('Y-m-d');
    }

    public function toHTML(): string {
        return parent::toHTML() . sprintf("
            <p><strong>Job Title:</strong> %s</p>
            <p><strong>Salary:</strong> %.2f</p>
            <p><strong>Start Date:</strong> %s</p>
            <p><strong>Awards:</strong> %s</p>",
            $this->jobTitle,
            $this->salary,
            $this->startDate->format('Y-m-d'),
            implode(', ', $this->awards)
        );
    }

    public function toMarkdown(): string {
        return parent::toMarkdown() . "\n\n**Job Title:** {$this->jobTitle}\n\n**Salary:** {$this->salary}\n\n**Start Date:** " . $this->startDate->format('Y-m-d') . "\n\n**Awards:** " . implode(', ', $this->awards);
    }

    public function toArray(): array {
        return array_merge(parent::toArray(), [
            'jobTitle' => $this->jobTitle,
            'salary' => $this->salary,
            'startDate' => $this->startDate->format('Y-m-d'),
            'awards' => $this->awards,
        ]);
    }
}
