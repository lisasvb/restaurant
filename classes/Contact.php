<?php


class Contact
{
    private $data;
    private $fields;

    public function __construct(int $id = null)
    {
        $this->data = new Data();

        if (!is_null($id)) {
            foreach ($this->getAll() as $object => $data) {
                if ($data['id'] == $id) {
                    foreach ($data as $key => $value) {
                        $this->fields[$key] = $value;
                    }
                }
            }
        }
    }

    public function getField()
    {
        return $this->fields;
    }

    public function getAll(): array
    {
        return $this->data->getContact();
    }

    public function getDepartment(int $id): string
    {
        foreach (self::getAllDepartments() as $department) {
            if ($department['id'] == $id) {
                return $department['naam'];
            }
        }
    }

    public static function getAllDepartments(): array
    {
        return (new Contact)->data->getContactAfdeling();
    }

    public static function validateContact(array $information)
    {
        foreach ($information as $data) {
            if (!empty($data) && filter_var($information['email'], FILTER_VALIDATE_EMAIL)) {
                if (preg_match("/^[a-zA-Z ]*$/", $information['voornaam'])) {
                    return true;
                }
            }
        }
    }

    public static function createContact(array $information): bool
    {
        if (self::validateContact($information)) {
            $data = (new Contact)->data->database();

            $data->insertUserValues('INSERT INTO contact (voornaam, email, onderwerp, bericht, afdeling_id) VALUES (:voornaam, :email, :onderwerp, :bericht, :afdeling_id)');
            $data->bind(':voornaam', $information['voornaam']);
            $data->bind(':email', $information['email']);
            $data->bind(':onderwerp', $information['onderwerp']);
            $data->bind(':bericht', $information['bericht']);
            $data->bind(':afdeling_id', $information['afdeling']);

            $data->run();

            return true;
        }

        return false;
    }

    public function deleteContact(int $id): bool
    {
        if ($this->data->getContact()) {
            $this->data->database()->insertUserValues('DELETE FROM contact WHERE id = :id');
            $this->data->database()->bind(':id', $id);

            $this->data->database()->run();

            return true;
        }

        return false;
    }
}