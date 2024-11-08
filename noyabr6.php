<?php

class WorkDay {
    private $userHours;
    private $requiredHours;

    public function __construct($requiredHours) {
        $this->requiredHours = $requiredHours;
        $this->userHours = [];
    }

    public function addUser($userId, $hoursWorked) {
        $this->userHours[$userId] = $hoursWorked;
    }

    public function calculateDebt($userId) {
        if (!isset($this->userHours[$userId])) {
            return "User topilmadi.";
        }

        $workedHours = $this->userHours[$userId];
        $debtHours = $this->requiredHours - $workedHours;

        return $debtHours > 0 ? $debtHours : 0;
    }

    public function calculateAllDebts() {
        $debts = [];
        foreach ($this->userHours as $userId => $workedHours) {
            $debtHours = $this->requiredHours - $workedHours;
            $debts[$userId] = $debtHours > 0 ? $debtHours : 0;
        }
        return $debts;
    }
}

$workDay = new WorkDay(40);
$workDay->addUser(1, 35);
$workDay->addUser(2, 45);
$workDay->addUser(3, 30);

echo "User 1 qarzdorligi: " . $workDay->calculateDebt(1) . " soat\n";

$allDebts = $workDay->calculateAllDebts();
foreach ($allDebts as $userId => $debt) {
    echo "User $userId qarzdorligi: $debt soat\n";
}
