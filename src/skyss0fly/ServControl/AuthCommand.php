<?php

namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class AuthCommand extends PluginBase {

    private $dataFile = 'plugins/AuthPlugin/resources/users.json';
    private $loggedInPlayers = [];

    // Register command handler
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        // Check if sender is a player
        if ($sender instanceof Player) {
            if (count($args) == 0) {
                $sender->sendMessage("Usage: /auth <register|login> <username> <password>");
                return false;
            }

            // Register or login based on the command
            if ($args[0] === "register" && isset($args[1]) && isset($args[2])) {
                $response = $this->register($args[1], $args[2]);
                $sender->sendMessage($response);
                return true;
            }

            if ($args[0] === "login" && isset($args[1]) && isset($args[2])) {
                $response = $this->login($args[1], $args[2]);
                $sender->sendMessage($response);
                return true;
            }
        }
        return false;
    }

    // Register a new user
    private function register($username, $password) {
        $users = $this->loadUsers();

        if (isset($users[$username])) {
            return "Username already exists.";
        }

        // Hash the password and save
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $users[$username] = $hashedPassword;
        $this->saveUsers($users);

        return "Account registered successfully!";
    }

    // Login a user
    private function login($username, $password) {
        $users = $this->loadUsers();

        if (!isset($users[$username])) {
            return "Username not found.";
        }

        if (password_verify($password, $users[$username])) {
            // Mark player as logged in
            $this->loggedInPlayers[] = $username;
            return "Login successful!";
        } else {
            return "Incorrect password.";
        }
    }

    // Load users from the JSON file
    private function loadUsers() {
        if (!file_exists($this->dataFile)) {
            return [];
        }

        $jsonData = file_get_contents($this->dataFile);
        return json_decode($jsonData, true);
    }

    // Save users to the JSON file
    private function saveUsers($users) {
        file_put_contents($this->dataFile, json_encode($users, JSON_PRETTY_PRINT));
    }
}
