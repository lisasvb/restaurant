<?php


class Factuur
{
    private $data;

    public function __construct()
    {
        $this->data = new Data();
    }

    public function getItemsByCategory(int $categorie_id, int $typeid = null): array
    {
        if (!is_null($typeid)) {
            $this->data->database()->insertUserValues('SELECT * FROM gerechten WHERE categorie_id = :categorie_id AND type_id = :type_id');
            $this->data->database()->bind(':categorie_id', $categorie_id);
            $this->data->database()->bind(':type_id', $typeid);
            $this->data->database()->run();
        } else {
            $this->data->database()->insertUserValues('SELECT * FROM gerechten WHERE categorie_id = :categorie_id');
            $this->data->database()->bind(':categorie_id', $categorie_id);
            $this->data->database()->run();
        }
        return $this->data->database()->All();
    }

    public function loadFactuurQuanity(int $reservatie_id, int $gerecht_id)
    {
        $this->data->database()->insertUserValues('SELECT aantal FROM reservatie_factuur WHERE gerecht_id = :gerecht_id AND reservatie_id = :r_id');
        $this->data->database()->bind(':gerecht_id', $gerecht_id);
        $this->data->database()->bind(':r_id', $reservatie_id);
        $this->data->database()->run();
        $results = $this->data->database()->All();
        if (empty($results)) {
            return 0;
        }

        return $results[0]['aantal'];
    }

    public function storeFactuur(int $reservatie_id, array $items): bool
    {
        foreach($items as $g_id => $aantal) {
            $this->data->database()->insertUserValues('SELECT aantal FROM reservatie_factuur WHERE gerecht_id = :g_id AND reservatie_id = :r_id');
            $this->data->database()->bind(':r_id', $reservatie_id);
            $this->data->database()->bind(':g_id', $g_id);
            $this->data->database()->run();
            if(count($this->data->database()->All()) > 0) {
                $this->data->database()->insertUserValues('UPDATE reservatie_factuur SET aantal = :aantal WHERE gerecht_id = :g_id AND reservatie_id = :r_id');
                $this->data->database()->bind(':r_id', $reservatie_id);
                $this->data->database()->bind(':g_id', $g_id);
                $this->data->database()->bind(':aantal', $aantal);
                $this->data->database()->run();
            } else {
                if ($aantal > 0) {
                    $dish = $this->getDishes($g_id);
                    $this->data->database()->insertUserValues('INSERT INTO reservatie_factuur (reservatie_id, gerecht_id, naam, prijs, aantal) VALUES (:r_id, :g_id, :naam, :prijs, :aantal)');
                    $this->data->database()->bind(':r_id', $reservatie_id);
                    $this->data->database()->bind(':g_id', $g_id);
                    $this->data->database()->bind(':naam', $dish["naam"]);
                    $this->data->database()->bind(':prijs', $dish["ex_btw"]);
                    $this->data->database()->bind(':aantal', $aantal);
                    $this->data->database()->run();
                }
            }
        }
        return true;
    }

    public function getDishes(int $gerecht_id): array
    {
        $this->data->database()->insertUserValues('SELECT *from gerechten WHERE id = :id');
        $this->data->database()->bind(':id', $gerecht_id);

        return $this->data->database()->SingleRow();
    }


    public function getFactuur(int $reservatie_id): array
    {
        $this->data->database()->insertUserValues('SELECT * FROM reservatie_factuur WHERE reservatie_id = :id');

        $this->data->database()->bind(':id', $reservatie_id);
        $this->data->database()->run();

        return $this->data->database()->All();
    }

    public function getFactuurTotal(int $reservatie_id): array
    {
        $this->data->database()->insertUserValues('SELECT SUM(prijs * aantal) as totaal FROM reservatie_factuur WHERE reservatie_id = :id');

        $this->data->database()->bind(':id', $reservatie_id);
        $this->data->database()->run();

        return $this->data->database()->All();
    }
}