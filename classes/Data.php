<?php


class Data
{
    private $db;

    /**
     * Init database
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return Database
     */
    public function database()
    {
        return $this->db;
    }

    /**
     * Valideer of het emailadres bestaat en haalt alle gegevens op
     * @param string $email
     * @param bool $return
     * @return bool|array
     */
    public function getPersoneelEmail(string $email, bool $return)
    {
        $this->db->insertUserValues('SELECT * FROM personeel WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->SingleRow()) {
            if ($return) {
                return true;
            }

            return $this->db->SingleRow();
        }

        return false;
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public function getPersoneelId(int $id)
    {
        $this->db->insertUserValues('SELECT * FROM personeel WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->SingleRow()) {
            return $this->db->SingleRow();
        }

        return false;
    }

    /**
     * @return array
     */

    public function getPersoneel(): array
    {
        $this->db->insertUserValues('SELECT * FROM personeel');

        return $this->db->All();
    }

    /**
     * Haalt alle gegevens op van tabel personeel gegevens
     * @param int $id
     * @return array
     */
    public function getPersoneelGegevensId(int $id): array
    {
        $this->db->insertUserValues('SELECT * FROM personeel_gegevens WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->SingleRow();
    }

    /**
     * Haalt alle gegevens op van tabel personeel functie
     * @return array
     */
    public function getPersoneelFunctie(): array
    {
        $this->db->insertUserValues('SELECT * FROM personeel_functie');

        return $this->db->All();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getPersoneelFunctieId(int $id): array
    {
        $this->db->insertUserValues('SELECT * FROM personeel_functie WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->SingleRow();
    }

    /**
     * Haalt alle gegevens op van tabel vacature
     * @return array
     */
    public function getVacature(): array
    {
        $this->db->insertUserValues('SELECT * FROM vacature');

        return $this->db->All();
    }

    /**
     * @param int $id
     * @return bool|mixed
     */
    public function getVacatureId(int $id)
    {
        $this->db->insertUserValues('SELECT * FROM vacature WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->SingleRow()) {
            return $this->db->SingleRow();
        }

        return false;
    }

    /**
     * Haalt alle gegevens op van tabel vacature functie
     * @return array
     */
    public function getVacatureFunctie(): array
    {
        $this->db->insertUserValues('SELECT * FROM vacature_functie');
        return $this->db->All();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getVacatureFunctieId(int $id): array
    {
        $this->db->insertUserValues('SELECT * FROM vacature_functie WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->SingleRow();
    }

    /**
     * Haalt alle gegevens op van tabel vacature status
     * @return array
     */
    public function getVacatureStatus(): array
    {
        $this->db->insertUserValues('SELECT * FROM vacature_status');

        return $this->db->All();
    }

    public function getAllReservations(): array
    {
        $this->db->insertUserValues('SELECT reservatie_gegevens.*, reservatie_tijden.* FROM reservatie_gegevens JOIN reservatie_tijden where reservatie_gegevens.T_ID = reservatie_tijden.T_ID');
        // $this->db->insertUserValues('SELECT * FROM reservatie_gegevens');

        return $this->db->All();
    }

    /**
     * Haalt alle gegevens op van tabel contact
     * @return array
     */
    public function getContact(): array
    {
        $this->db->insertUserValues('SELECT * FROM contact');

        return $this->db->All();
    }

    /**
     * Haalt alle gegevens op van tabel contact afdeling
     * @return array
     */
    public function getContactAfdeling(): array
    {
        $this->db->insertUserValues('SELECT * FROM contact_afdeling');

        return $this->db->All();
    }

}