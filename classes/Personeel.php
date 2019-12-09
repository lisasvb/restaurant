<?php


class Personeel
{
    private $fields;

    private $data;

    /**
     * Init personeels credentials van een specifiek gebruiker
     * @param null int $id
     */
    public function __construct(int $id = null)
    {
        $this->data = new Data();

        if (!is_null($id) && $array = $this->data->getPersoneelId($id)) {
            foreach ($array as $key => $value) {
                $this->fields[$key] = $value;
            }
        }
    }

    /**
     * Haalt alle credentials op
     * @return array
     */
    public function getPersoneelId(): array
    {
        return $this->data->getPersoneel();
    }

    /**
     * Haalt alle persoonlijke gegevens op van een gebruiker op basis van de input
     * @param string $information
     * @return array|string
     */
    public function getField(string $information)
    {
        if (strcmp($information, 'wachtwoord')) {
            if (!strcmp($information, 'gegevens_id')) {
                return $this->data->getPersoneelGegevensId($this->fields[$information]);
            } else if (!strcmp($information, 'functie_id')) {
                return $this->data->getPersoneelFunctieId($this->fields[$information]);
            }

            return $this->fields[$information];
        }
    }

    /**
     * Haalt alle persoonlijke gegevens op van een gebruiker
     * @param int $id
     * @return array
     */
    public function getPersoneelGegevensId(int $id): array
    {
        return $this->data->getPersoneelGegevensId($id);
    }

    /**
     * Checkt of een specifiek gebruiker bestaat
     * @param int $id
     * @return bool
     */
    public function existPersonal(int $id): bool
    {
        if ($this->data->getPersoneelId($id)) {
            return true;
        }

        return false;
    }

    /**
     * Haalt alle aangemaakte functies op
     * @return array
     */
    public function getPersoneelFunctie(): array
    {
        return $this->data->getPersoneelFunctie();
    }

    /**
     * Valideert de opgehaalde data uit createPersonal
     * @param array $information
     * @return bool
     */
    public function validateCreatePersonal(array $information)
    {
        foreach ($information as $data) {
            if (!empty($data) && filter_var($information['email'], FILTER_VALIDATE_EMAIL) && isset($information['functie'])) {
                if (preg_match("/^[a-zA-Z ]*$/", $information['volledige_naam']) && !strcmp($information['wachtwoord'], $information['bevestiging'])) {
                    if (!$this->data->getPersoneelEmail($information['email'], TRUE)) {
                        return true;
                    }
                }
            }
        }

    }

    /**
     * Maakt een gebruiker aan in het systeem
     * @param array $information
     * @return bool
     */
    public function createPersonal(array $information): bool
    {
        if ($this->validateCreatePersonal($information)) {

            $this->data->database()->insertUserValues('INSERT INTO personeel_gegevens (volledige_naam, adres, woonplaats) VALUES (:volledige_naam, :adres, :woonplaats)');
            $this->data->database()->bind(':volledige_naam', $information['volledige_naam']);
            $this->data->database()->bind(':adres', $information['adres']);
            $this->data->database()->bind(':woonplaats', $information['woonplaats']);

            $this->data->database()->run();

            $lastId = $this->data->database()->lastId();

            $this->data->database()->insertUserValues('INSERT INTO personeel (email, wachtwoord, gegevens_id, functie_id, datum) VALUES (:email, :wachtwoord, :gegevens_id, :functie_id, :datum)');
            $this->data->database()->bind(':email', $information['email']);
            $this->data->database()->bind(':wachtwoord', password_hash($information['wachtwoord'], PASSWORD_BCRYPT));
            $this->data->database()->bind(':gegevens_id', $lastId);
            $this->data->database()->bind(':functie_id', $information['functie']);
            $this->data->database()->bind(':datum', date('Y-m-d'));

            $this->data->database()->run();

            return true;
        }

        return false;
    }

    /**
     * Verwijder gebruiker
     * @param int $id
     * @return bool
     */
    public function deletePersonal(int $id): bool
    {
        if ($this->data->getPersoneelId($id)) {
            $this->data->database()->insertUserValues('DELETE FROM personeel_gegevens WHERE id = :id');
            $this->data->database()->bind(':id', $this->data->getPersoneelId($id)['gegevens_id']);
            $this->data->database()->run();

            $this->data->database()->insertUserValues('DELETE FROM personeel WHERE id = :id');
            $this->data->database()->bind(':id', $id);
            $this->data->database()->run();

            return true;
        }

        return false;
    }

    /**
     * Bewerk gebruiker
     * @param array $information
     * @return bool
     */
    public function edit(array $information): bool
    {
        $gegevensid = $this->data->getPersoneelId($information['personeel'])['gegevens_id'];

        $email = (!empty($information['email']) ? $information['email'] : $this->data->getPersoneelId($information['personeel'])['email']);
        $functie_id = (!empty($information['functie_id']) ? $information['functie_id'] : $this->data->getPersoneelId($information['personeel'])['functie_id']);
        $volledige_naam = (!empty($information['volledige_naam']) ? $information['volledige_naam'] : $this->data->getPersoneelGegevensId($gegevensid)['volledige_naam']);
        $adres = (!empty($information['adres']) ? $information['adres'] : $this->data->getPersoneelGegevensId($gegevensid)['adres']);
        $woonplaats = (!empty($information['woonplaats']) ? $information['woonplaats'] : $this->data->getPersoneelGegevensId($gegevensid)['woonplaats']);

        $this->data->database()->insertUserValues('UPDATE personeel SET email = :email, functie_id = :functie_id WHERE id = :id');
        $this->data->database()->bind(':email', $email);
        $this->data->database()->bind(':functie_id', $functie_id);
        $this->data->database()->bind(':id', $information['personeel']);
        $this->data->database()->run();

        $this->data->database()->insertUserValues('UPDATE personeel_gegevens SET volledige_naam = :volledige_naam, adres = :adres, woonplaats = :woonplaats WHERE id = :id');
        $this->data->database()->bind(':volledige_naam', $volledige_naam);
        $this->data->database()->bind(':adres', $adres);
        $this->data->database()->bind(':woonplaats', $woonplaats);
        $this->data->database()->bind(':id', $gegevensid);
        $this->data->database()->run();

        return true;
    }

}