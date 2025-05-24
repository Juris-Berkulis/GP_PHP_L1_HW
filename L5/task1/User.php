<?php
class User
{

    private string $name;
    private string $birthYear;
    private string $gender;

    public function __construct($name, $birthYear, $gender)
    {
        $this->name = $name;
        $this->birthYear = $birthYear;
        $this->gender = $gender;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBirthYear(): string
    {
        return $this->birthYear;
    }

    public function setBirthYear(string $birthYear): void
    {
        $this->birthYear = $birthYear;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

}
