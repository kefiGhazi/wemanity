<?php

declare(strict_types=1);

namespace App\Application\Actions\Wemanity;

use App\Application\Actions\Wemanity\WemanityAction;
use Psr\Http\Message\ResponseInterface as Response;

final class NumberFormatAction extends WemanityAction
{
    /**
     * {@inheritdoc}
     */
    public function action(): Response
    {
        array_map([$this, 'divisible'], $this->wemanityRepository->getAllNumbers());
        array_map([$this, 'replaceWithKey'], $this->result, array_keys($this->result));
        $this->logger->info("Number list was viewed.");
        return $this->respondWithData($this->result);
    }

    /**
     * divisible
     * @param string $number
     */
    private function divisible(string $number): void
    {
        if (!is_numeric($number)) {
            $this->result[$number] = $number . " n'est pas numérique";
            return;
        }
        $result = '';
        array_walk($this->remplacements, function ($value, $key) use ($number, &$result) {
            if ($key != 0 && $number % $key == 0) {
                $result .= $value;
            }
        });
        $this->result[$number] = ($result !== '') ? $result . $number : $number;
    }

    /**
     * replaceWithKey
     * @param string $number
     * @param string $index
    */
    private function replaceWithKey(string $number, string $index): void
    {
        if (strpos((string)$number, "n'est pas numérique") == '') {
            $this->result[$index] = str_replace(array_keys($this->remplacements), $this->remplacements, $number);
        }
    }
}
