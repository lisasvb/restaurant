<?php


class Reserveren
{
    private $data;

    public function __construct()
    {
        $this->data = new Data();
    }

    public function getAll(): array
    {
        return $this->data->getAllReservations();
    }

    public function getTimeById(int $id): string
    {
        $this->data->database()->insertUserValues('SELECT * FROM reservatie_tijden WHERE T_ID = :id');
        $this->data->database()->bind(':id', $id);
        $tijd = $this->data->database()->SingleRow();
        if($tijd) {
            return $tijd['Tijden'];
        }
        return "Tijd met id " . $id . " niet gevonden";
    }

    public function getReservationById(string $id): array
    {
        $this->data->database()->insertUserValues('SELECT * FROM reservatie_gegevens where id = :id');
        $this->data->database()->bind(':id', $id);
        return $this->data->database()->SingleRow();
    }

    public function getAvailableTimesByDate(string $date): array
    {
        $this->data->database()->insertUserValues('SELECT * FROM reservatie_tafels WHERE date = :date');
        $this->data->database()->bind(':date', date($date));
        $this->data->database()->run();
        $tafels = $this->data->database()->SingleRow();
        if($tafels) {
            if($tafels['tables_left'] < 1) {
                return array();
            }
        }

        $this->data->database()->insertUserValues('SELECT * FROM reservatie_tijden');
        return $this->data->database()->All();
    }

    private function validateReservation(array $information): bool
    {
        // check of date een datum is
        // check of tijd een timestamp is

        return true;
    }

    public function createReservation(array $information): bool
    {
        if ($this->validateReservation($information)) {
            $this->data->database()->insertUserValues('SELECT * FROM reservatie_tafels WHERE date = :date');
            $this->data->database()->bind(':date', date($information['date']));
            $this->data->database()->run();
            $tafels = $this->data->database()->SingleRow();
            if($tafels){
                $t = $tafels['tables_left'];
                $t -= 1;
                if($t < 0) {
                    return false;
                }
                $this->data->database()->insertUserValues('UPDATE reservatie_tafels SET tables_left = :t WHERE date = :date');
                $this->data->database()->bind(':t', $t);
                $this->data->database()->bind(':date', date($information['date']));
                $this->data->database()->run();
            } else{
                $t = 20 - 1;
                $this->data->database()->insertUserValues('INSERT INTO reservatie_tafels (date, tables_left) VALUES (:date, :t)');
                $this->data->database()->bind(':t', $t);
                $this->data->database()->bind(':date', date($information['date']));
                $this->data->database()->run();
            }

            $this->data->database()->insertUserValues('INSERT INTO reservatie_gegevens (persons, date, T_ID, firstname, lastname, email) VALUES (:persons, :date, :t_id, :firstname, :lastname, :email)');
            $this->data->database()->bind(':persons', $information['persons']);
            $this->data->database()->bind(':date', date($information['date']));
            $this->data->database()->bind(':t_id', $information['time']);
            $this->data->database()->bind(':firstname', $information['firstname']);
            $this->data->database()->bind(':lastname', $information['lastname']);
            $this->data->database()->bind(':email', $information['email']);
            $this->data->database()->run();

            return true;
        }

        return false;
    }

    public function cancelReservation(int $id): bool
    {
        $this->data->database()->insertUserValues('DELETE FROM reservatie_gegevens WHERE id = :id');
        $this->data->database()->bind(':id', $id);
        $this->data->database()->run();

        return true;
    }

}