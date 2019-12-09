<?php


class Login
{
    private $email;
    private $password;

    private $data;

    /**
     * Doorgevoerde credentials opslaan en ophalen van benodigde data
     * @param string $email
     * @param string $password
     */

    public function __construct(string $email, string $password)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
            $this->password = $password;

            $this->data = new Data();
        }
    }

    /**
     * Checkt of de credentials overeenkomen om vervolgens een User object te starten
     * @return bool|User
     */
    public function validateUser()
    {
        if ($this->data->getPersoneelEmail($this->email, TRUE)) {
            if (password_verify($this->password, $this->data->getPersoneelEmail($this->email, FALSE)['wachtwoord'])) {
                return new User($this->data->getPersoneelEmail($this->email, FALSE)['id']);
            }
        }

        return false;
    }

    /**
     * Sessie id neerzetten voor validatie en data
     */
    public function startSession()
    {
        if (!isset($_SESSION['id'])) {
            $_SESSION['id'] = $this->data->getPersoneelEmail($this->email, FALSE)['id'];
            header('Location: overzicht.php');
        }
    }

    /**
     * Sessie id sluiten
     */
    public static function closeSession()
    {
        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
            session_destroy();
        }
    }

    /**
     * Valideer de sessie id
     * @return bool
     */
    public static function checkSession()
    {
        return isset($_SESSION['id']);
    }
}