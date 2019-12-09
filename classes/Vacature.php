<?php


class Vacature
{
    private $data;

    private $fields;

    public function __construct(int $id = null)
    {
        $this->data = new Data();

        if (!is_null($id) && $array = $this->data->getVacatureId($id)) {
            foreach ($array as $key => $value) {
                $this->fields[$key] = $value;
            }
        }
    }

    public function getField(string $information)
    {
        if (!strcmp($information, 'functie_id')) {
            return $this->data->getVacatureFunctieId($this->fields[$information]);
        }

        return $this->fields[$information];
    }

    /**
     * Haalt alle vacatures op
     * @return array
     */
    public function getAll()
    {
        return $this->data->getVacature();
    }

    public function getRoles(bool $type, int $id = null): array
    {
        if ($type && is_null($id)) {
            return $this->data->getVacatureFunctie();
        }

        return $this->data->getVacatureFunctieId($id);
    }

    public function getStatus(): array
    {
        return $this->data->getVacatureStatus();
    }

    /**
     * Checkt of een vacature bestaat
     * @param int $id
     * @return bool
     */
    public function existApplication(int $id): bool
    {
        if ($this->data->getVacatureId($id)) {
            return true;
        }

        return false;
    }

    /**
     * Verwijder een vacature
     * @param int $id
     * @return bool
     */
    public function deleteApplication(int $id): bool
    {
        if ($this->existApplication($id)) {

            $this->data->database()->insertUserValues('DELETE FROM vacature WHERE id = :id');
            $this->data->database()->bind(':id', $id);

            $this->data->database()->run();

            return true;
        }

        return false;
    }


    /**
     * Valideert of de functies uitgevoerd zijn
     * @param array $information
     * @return bool
     */
    public function createApplication(array $information): void
    {
        if ($this->validateApplication($information)) {
            $this->insertApplication($information);
        }
    }

    /**
     * Valideer of de ingevoerde vacature klopt
     * @param array $information
     * @return bool
     */
    public function validateApplication(array $information): bool
    {
        foreach ($information as $data) {
            if (!empty($data) && filter_var($information['email'], FILTER_VALIDATE_EMAIL) && isset($information['functie_id'])) {
                if (preg_match("/^[a-zA-Z ]*$/", $information['volledige_naam'])) {
                    return true;
                }
            }
        }
    }

    /**
     * Voeg de vacature toe
     * @param array $information
     */
    public function insertApplication(array $information): void
    {
        $this->data->database()->insertUserValues('INSERT INTO vacature (volledige_naam, mobiel, email, motivatie, functie_id) VALUES (:volledige_naam, :mobiel, :email, :motivatie, :functie_id)');
        $this->data->database()->bind(':volledige_naam', $information['volledige_naam']);
        $this->data->database()->bind(':mobiel', $information['mobiel']);
        $this->data->database()->bind(':email', $information['email']);
        $this->data->database()->bind(':motivatie', $information['motivatie']);
        $this->data->database()->bind(':functie_id', $information['functie_id']);

        $this->data->database()->run();
    }
}